<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tarekah_a_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function getTarekahA(){
        $this->db->select('*, SUM(nominal_bagi_hasil) as bagi_hasil');
		$this->db->group_by('tarekah_a.id');
		$this->db->from('tarekah_a');
		$this->db->join('bagi_hasil_tarekah_a','tarekah_a.id = bagi_hasil_tarekah_a.id_tarekah_a');
		$this->db->order_by('tarekah_a.date','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	public function getTarekahAId($id){
		$this->db->where('id', $id);
		$query = $this->db->get('tarekah_a');
		return $query->result();
	}
	public function getTarekahAById($id_rekening){
		$this->db->where('id_rekening', $id_rekening);
		$this->db->select('*');
		//SUM(nominal_bagi_hasil) as bagi_hasil
		$this->db->group_by('tarekah_a.id');
		$this->db->from('tarekah_a');
		//$this->db->join('bagi_hasil_tarekah_a','tarekah_a.id = bagi_hasil_tarekah_a.id_tarekah_a');
		$this->db->order_by('tarekah_a.created_at','DESC');
		$query = $this->db->get();
		return $query->result();
	}

	/*public function getTarekahAById($id_rekening){
		$this->db->where('id_rekening', $id_rekening);
		$query = $this->db->get('tarekah_a');
		return $query->result();
	}*/
    public function getTarekahA_no(){
        $this->db->select('*');
        $this->db->from('tarekah_a');
        $this->db->join('no_rekening','tarekah_a.id_rekening = no_rekening.id');
        $this->db->join('anggota','no_rekening.id_anggota = anggota.id');
				$this->db->order_by('tarekah_a.date','DESC');
        $query = $this->db->get();
        return $query->result();
    }
}

?>
