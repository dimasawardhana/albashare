<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pokok_wajib_model extends CI_Model {
	function __construct(){
		parent::__construct();
	}

	public function getPokokWajib(){
        $query = $this->db->get('pokok_wajib');
        return $query->result();
	}

	public function getPokokWajibById($id_rekening){
		$this->db->where('id_rekening', $id_rekening);
		$this->db->order_by('date','DESC');
		$query = $this->db->get('pokok_wajib');
		return $query->result();
	}
    public function getPokokWajib_no(){
        $this->db->select('*');
        $this->db->from('pokok_wajib');
        $this->db->join('no_rekening','pokok_wajib.id_rekening = no_rekening.id');
        $this->db->join('anggota','no_rekening.id_anggota = anggota.id');
				$this->db->order_by('pokok_wajib.date','DESC');
        $query = $this->db->get();
        return $query->result();
    }
}

?>
