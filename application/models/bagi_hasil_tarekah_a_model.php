<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bagi_hasil_tarekah_a_model extends CI_Model {	
	function __construct(){
		parent::__construct();
	}

	public function getTarekahA(){

	}

	public function getBagiHasilTarekahAById($id_tarekah_a){
		$this->db->where('id_tarekah_a', $id_tarekah_a);
		$query = $this->db->get('bagi_hasil_tarekah_a');	
		return $query->result();
	}
	public function getBagiHasilId($id){
		$this->db->where('id', $id);
		$query = $this->db->get('bagi_hasil_tarekah_a');	
		return $query->result();	
	}
}

?>