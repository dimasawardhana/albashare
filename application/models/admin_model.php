<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	function __construct(){
		parent::__construct();

	}

	public function validate()
	{
		$this->db->where('username', $this->input->post('username'));
		$this->db->where('password', md5($this->input->post('password')));
		$this->db->where('status',1);
		$result = $this->db->get('admin');
		if ($result->num_rows() == 1)
		{
			return TRUE;
		}
	}

	public function insertToLog($no_admin)
	{
		date_default_timezone_set("Asia/Jakarta");
		$log_array = array (
			'no_admin' => $no_admin,
			'time_stamp' => date('Y-m-d H:i:s'),
			//
			);
		$this->db->insert('log', $log_array);
	}

	public function insertToFailedAttempt()
	{
		$failed = array (
			'username' => $this->input->post('username'),
			'password' => $this->input->post('password'),
			'time_stamp' => date('Y-m-d H:i:s'),
			);
		$this->db->insert('failed_attempt', $failed);
	}

	public function getAdminByUsernamePost()
	{
		$this->db->where('username', $this->input->post('username'));
		$query = $this->db->get('admin');
		return $query->result();
	}

	public function getAdmin($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->get('admin');
		return $query->result();
	}
	public function getAllAdmin(){
		$query = $this->db->get('admin');
		return $query->result();
	}
	public function getLastLogin($no_admin)
	{
		$this->db->where('no_admin', $no_admin);
		$this->db->order_by('no', 'DESC');
		$this->db->limit('2');
		$query = $this->db->get('log');
		return $query->result();
	}
	public function delete_data($id,$tables){
		$this->db->where('id',$id);
		$this->db->delete($tables);
	}
}
