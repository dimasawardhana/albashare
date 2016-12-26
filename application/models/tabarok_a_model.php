<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tabarok_a_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function getTabarokA(){
        $query = $this->db->get('tabarok_a');
		return $query->result();
	}

	public function getTabarokAById($id_rekening){
		$this->db->where('id_rekening', $id_rekening);
		$this->db->order_by('date','DESC');
		$query = $this->db->get('tabarok_a');

		return $query->result();
	}
    public function getTabarokA_no(){
        $this->db->select('*');
        $this->db->from('tabarok_a');
        $this->db->join('no_rekening','tabarok_a.id_rekening = no_rekening.id');
        $this->db->join('anggota','no_rekening.id_anggota = anggota.id');
				$this->db->order_by('tabarok_a.created_at','DESC');
        $query = $this->db->get();
        return $query->result();
    }
}

?>
