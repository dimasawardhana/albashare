<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct(){
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		//$this->load->view('welcome_message');
		$this->login();
	}

	public function login()
	{
		$data['title'] = 'Login';
		$this->load->view('index', $data);
	}


	public function validate_credentials()
	{
		$this->load->library('session');
		$query = $this->admin_model->validate();

		if($query)
		{
			$data['admin'] = $this->admin_model->getAdminByUsernamePost();
			foreach ($data['admin'] as $object)
			{
				$no_admin = $object->id;
				$username = $object->username;
				$role = $object->role;
				$branch = $object->branch;
			}
			$session_data = array (
				'username' => $username,
				'no_admin' => $no_admin,
				'role' => $role,
				'branch' => $branch,
				'isLoggedIn' => true,
				);
			$this->session->set_userdata($session_data);
			$this->admin_model->insertToLog($no_admin);
			// echo "Berhasil";
			redirect('Dashboard');
		}
		else
		{
			$data['title'] = 'Login';
			$data['message'] = 'Maaf, username atau password tidak sesuai atau akun anda tidak aktif';
			$this->load->view('index', $data);
			$this->admin_model->insertToFailedAttempt();
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('Login');
	}
}
