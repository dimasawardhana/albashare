<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends CI_Controller {

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
		$data['title'] = 'Setting';
		$no_admin = $this->session->userdata('no_admin');
		$data['log'] = $this->admin_model->getLastLogin($no_admin);
		$data['administrator'] = $this->admin_model->getAdmin($no_admin);
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('setting/main', $data);
		$this->load->view('footer');
	}
    public function setJam(){
        date_default_timezone_set("Asia/Jakarta");
    }

	public function check_isvalidated()
	{
	    if(!$this->session->userdata('isLoggedIn'))
	    {
	        redirect('Login');
    	}
	}
	public function updatesetting(){
		$data['name'] = $this->input->post('name');
		$data['initial'] = $this->input->post('initial');
		$data['password'] = md5($this->input->post('password'));
		$id = $this->input->post('id');
		$this->anggota_model->updatedata('admin',$id,$data);
		$data['account_updated'] = "admin has been updated";
		redirect('dashboard/home',$data);
	}
}
