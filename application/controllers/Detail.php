<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail extends CI_Controller {

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
		$data['title'] = 'Daftar Anggota';
		$no_admin = $this->session->userdata('no_admin');
		$data['log'] = $this->admin_model->getLastLogin($no_admin);
		$data['anggota'] = $this->anggota_model->getAnggota();

		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('anggota/detail', $data);
		$this->load->view('footer');
	}

	public function check_isvalidated()
	{
	    if(!$this->session->userdata('isLoggedIn'))
	    {
	        redirect('Login');
    	}
	}
}
