<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarekah_b_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function getTarekahB(){
        $this->db->select('*, SUM(nominal) as nominal, SUM(bagi_hasil) as bagi_hasil');
		$this->db->group_by('tarekah_b.id');
		$this->db->from('tarekah_b');
		$this->db->join('nominal_tarekah_b','tarekah_b.id = nominal_tarekah_b.id_tarekah_b');
		$this->db->order_by('tarekah_b.date','DESC');
		$query = $this->db->get();
		return $query->result();
	}


	public function getTarekahBById($id_rekening){
		$this->db->where('id_rekening', $id_rekening);
		$this->db->select('*, SUM(nominal) as nominal, SUM(bagi_hasil) as bagi_hasil');
		$this->db->group_by('tarekah_b.id');
		$this->db->from('tarekah_b');
		$this->db->join('nominal_tarekah_b','tarekah_b.id = nominal_tarekah_b.id_tarekah_b');
		$this->db->order_by('tarekah_b.created_at','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	/*public function getTarekahAById($id_rekening){
		$this->db->where('id_rekening', $id_rekening);
		$query = $this->db->get('tarekah_a');
		return $query->result();
	}*/
    public function getTarekahB_no(){
        $this->db->select('*');

		$this->db->from('tarekah_b');
		$this->db->join('nominal_tarekah_b','tarekah_b.id = nominal_tarekah_b.id_tarekah_b');
        $this->db->join('no_rekening','tarekah_b.id_rekening = no_rekening.id');
        $this->db->join('anggota','no_rekening.id_anggota = anggota.id');
				$this->db->order_by('tarekah_b.date','DESC');
		$query = $this->db->get();
		return $query->result();
    }
}

?>
