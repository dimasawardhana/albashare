<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Administrator extends CI_Controller {

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
        $this->check_isvalidated();
        $this->load->model('admin_model');
				$this->load->model('anggota_model');
    }

	public function index()
	{
		//$this->load->view('welcome_message');
		$this->home();
	}

	public function home()
	{
		$data['title'] = 'Administrator';
		$no_admin = $this->session->userdata('no_admin');
		$data['log'] = $this->admin_model->getLastLogin($no_admin);
		$data['AllAdmin'] = $this->admin_model->getAllAdmin();

		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('admin/main',$data);
		$this->load->view('footer');
	}
	public function add_admin(){
		$data['title'] = 'Add Administrator';
		$no_admin = $this->session->userdata('no_admin');
		$data['log'] = $this->admin_model->getLastLogin($no_admin);
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('admin/add_admin',$data);
		$this->load->view('footer');
	}

	public function check_isvalidated()
	{
	    if(!$this->session->userdata('isLoggedIn'))
	    {
	        redirect('Login');
    	}
	}
	public function Hapus($id){
		$this->admin_model->delete_data($id,'admin');
		$data['title'] = 'Administrator';
		$no_admin = $this->session->userdata('no_admin');
		$data['log'] = $this->admin_model->getLastLogin($no_admin);
		$data['AllAdmin'] = $this->admin_model->getAllAdmin();
		redirect('Administrator/home',$data);
	}
	public function createAdmin(){

		$data['name'] = $this->input->post('name');
		$data['initial'] = toupper($this->input->post('initial'));
		$data['username'] =	$this->input->post('username');
		$data['password'] = md5($this->input->post('password'));
		$data['role'] = $this->input->post('TipeAdmin');
		$data['id_cabang'] = $this->input->post('cabang');
		$data['status']  = 1;// active
		date_default_timezone_set('Asia/Jakarta');
		$data['created_at'] = date('Y-m-d');
		$data['updated_at'] = date('Y-m-d');
		$this->anggota_model->createdata('admin',$data);
		redirect('Administrator/home');
	}
	public function inactivate($id){
		// $data['status'] = 0;``
		$this->anggota_model->updatedata('admin',$id,$data);
		redirect('administrator/home');
	}
	public function activate($id){
		$data['status']=1;
		$this->anggota_model->updatedata('admin',$id,$data);
		redirect('administrator/home');
	}
	public function edit($id_admin){
		$data['title'] = "Edit Admin";
		$no_admin = $this->session->userdata('no_admin');
		$data['log'] = $this->admin_model->getLastLogin($no_admin);
		$data['administrator'] = $this->admin_model->getAdmin($id_admin);
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('setting/main', $data);
		$this->load->view('footer');
	}
}
