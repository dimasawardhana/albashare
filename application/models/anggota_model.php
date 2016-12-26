         <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota_model extends CI_Model {

	function __construct(){
		parent::__construct();

	}

	public function getAnggota()
	{
		$query = $this->db->get('anggota');
		return $query->result();
	}
  public function getAnggotaById($id){
    $this->db->where('id',$id);
    $this->db->from('anggota');
    $query = $this->db->get();
    return $query->result();
  }
    public function getAnggota_no_rekening(){
        $this->db->select('*, no_rekening.id AS id_rekening');
        $this->db->from('anggota');
        $this->db->join('no_rekening','anggota.id = no_rekening.id_anggota');

        $query = $this->db->get();
        return $query->result();
    }
	public function getNoRekening($id_anggota)
	{
		$this->db->where('id_anggota', $id_anggota);// ke database ke indeks $id anggota di column id anggota
		$query = $this->db->get('no_rekening');	// ambil seluruh isinya di table no rkening
		return $query->result();
	}
	public function createdata($table,$data){

		$this->db->insert($table,$data);
	}
  public function updatedata($table,$id,$data){
    $this->db->where('id',$id);
    $this->db->update($table,$data);
  }
	public function getRekening($id_rekening){
		$this->db->select('saldo_pokok_wajib, saldo_tabarok_a,SUM(IF(debit_kredit= 1,nominal,0))-SUM(IF(debit_kredit= 0,nominal,0)) as saldo_tarekah_a');// belum ditambah saldo tarekah a dan tarekah

		$this->db->from('no_rekening');
		$this->db->join('tarekah_a' , 'no_rekening.id = tarekah_a.id_rekening');
		$this->db->where('id_rekening',$id_rekening);
		$query = $this->db->get();
		return $query->result();
	}
  public function getRekeningId($id){
    $this->db->where('id',$id);
    $query = $this->db->get('no_rekening');
    return $query->result();
  }
    public function getLastRek(){
        $this->db->select('*');
        $this->db->from('no_rekening');
        $this->db->order_by('id','DESC');
        $this->db->limit('1');
        $query = $this->db->get();
        return $query->result();
    }
	public function isExistInDB($table,$data,$field){// validation
		$this->db->where($field,$data);
		$query = $this->db->get($table);

		if($query->num_rows() > 0){
			return true;
		}
		else{
			return false;
		}
	}
  public function alltrans(){
  $isiquery = " SELECT no_rekening.no_rekening,anggota.nama, no_rekening.cabang, tabarok_a.nominal, tabarok_a.debit_kredit, tabarok_a.date, kode, no_transaksi,petugas,keterangan,created_at
                FROM no_rekening RIGHT JOIN tabarok_a on no_rekening.id = tabarok_a.id_rekening RIGHT join anggota on no_rekening.id_anggota = anggota.id
                UNION
                SELECT no_rekening.no_rekening,anggota.nama, no_rekening.cabang, tarekah_a.nominal, tarekah_a.debit_kredit, tarekah_a.date, kode, no_transaksi,petugas,keterangan,created_at
                FROM no_rekening RIGHT JOIN tarekah_a ON no_rekening.id = tarekah_a.id_rekening RIGHT join anggota on no_rekening.id_anggota = anggota.id
                UNION
                SELECT no_rekening.no_rekening,anggota.nama, no_rekening.cabang , nominal_tarekah_b.nominal, nominal_tarekah_b.debit_kredit, tarekah_b.date,kode, no_transaksi,petugas,keterangan,created_at
                FROM no_rekening RIGHT JOIN tarekah_b ON no_rekening.id = tarekah_b.id_rekening RIGHT JOIN nominal_tarekah_b ON nominal_tarekah_b.id_tarekah_b= tarekah_b.id
                RIGHT join anggota on no_rekening.id_anggota = anggota.id
                ORDER BY created_at DESC";
  $query  = $this->db->query($isiquery);


  return $query->result();

  }
  public function laporanperbulan(){
    $isiquery = "SELECT a.nama,b.no_rekening,
                (select sum(c.nominal) where c.debit_kredit = '1') as 'pemasukkan', 
                (select sum(c.nominal) where c.debit_kredit = '0') as 'pengeluaran',
                mid(c.date,1,7) as 'perbulan',
                a.cabang
                FROM anggota a 
                right join no_rekening b on a.id = b.id_anggota
                RIGHT JOIN tabarok_a c on b.id = c.id_rekening
                GROUP BY a.nama, b.no_rekening ,month(c.date),year(c.date)";
    $query = $this->db->query($isiquery);
    return $query->result();
  }
}
