<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Anggota extends CI_Controller {

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
        $this->load->model('pokok_wajib_model');
        $this->load->model('tabarok_a_model');
        $this->load->model('tarekah_a_model');
        $this->load->model('tarekah_b_model');
        $this->load->model('bagi_hasil_tarekah_a_model');
				$this->load->library('Excel');
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
		$data['admin'] = $this->admin_model->getAdmin($no_admin);
		$data['log'] = $this->admin_model->getLastLogin($no_admin);
		$data['anggota'] = $this->anggota_model->getAnggota_no_rekening();
        $data['anggota2'] = $this->anggota_model->getAnggota();

		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('anggota/main', $data);
		$this->load->view('footer');
	}

	public function detail_anggota($id_anggota)
	{
		$data['title'] = 'Detail Anggota';
		$no_admin = $this->session->userdata('no_admin');
		$data['admin'] = $this->admin_model->getAdmin($no_admin);
		$data['log'] = $this->admin_model->getLastLogin($no_admin);
		$data['anggota'] = $this->anggota_model->getAnggota();
		$data['no_rekening'] = $this->anggota_model->getNoRekening($id_anggota);
		$data['id_anggota'] = $id_anggota;
		$data['error_msg'] = $this->session->flashdata('error');

		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('anggota/detail_anggota', $data);
		$this->load->view('footer');
	}

	public function detail_rekening($id_rekening)
	{	// ambil data dari database di model
		$data['title'] = 'Detail rekening';
		$no_admin = $this->session->userdata('no_admin');
		$data['no_rekening'] = $this->anggota_model->getRekening($id_rekening);
		$data['saldo_tarekah_b'] = $this->tarekah_b_model->getTarekahBById($id_rekening);
		$data['admin'] = $this->admin_model->getAdmin($no_admin);
		$data['log'] = $this->admin_model->getLastLogin($no_admin);
		$data['anggota'] = $this->anggota_model->getAnggota();
		$data['pokok_wajib'] = $this->pokok_wajib_model->getPokokWajibById($id_rekening);
		$data['tabarok_a'] = $this->tabarok_a_model->getTabarokAById($id_rekening);
		$data['tarekah_a'] = $this->tarekah_a_model->getTarekahAById($id_rekening);
		$data['tarekah_b'] = $this->tarekah_b_model->getTarekahBById($id_rekening);
		$data['id_rekening'] = $id_rekening;
		$data['error_msg'] = $this->session->flashdata('gagal');
		// tampilkan daa di view
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('anggota/detail_rekening', $data);
		$this->load->view('footer');
	}

	public function check_isvalidated()
	{
	    if(!$this->session->userdata('isLoggedIn'))
	    {
	        redirect('Login');
    	}
	}
	public function create(){
		$data['title'] = 'Detail Anggota';
		$no_admin = $this->session->userdata('no_admin');
		$data['log'] = $this->admin_model->getLastLogin($no_admin);
		$this->load->view('header',$data);
		$this->load->view('sidebar');
		$this->load->view('anggota/create_anggota');
		$this->load->view('footer');
	}
	public function add_anggota(){
		$title = 'anggota baru';
		$no_admin = $this->session->userdata('no_admin');
		$log = $this->admin_model->getLastLogin($no_admin);
		//dibuat perdatabase
		//database anggota dengan table anggota
		$nama = $this->input->post('name');
		$city = $this->input->post('City');//CIty
		$TTL = date("Y-m-d",strtotime($this->input->post('TTL')));//TTL
		$alamat = $this->input->post('alamat');//alamat
		$ZIP = $this->input->post('ZIP');//ZIP
		$ibu = $this->input->post('ibu');//ibu
		$HP = $this->input->post('HP');//HP
		$TP = $this->input->post('TP');//TP
		$email = $this->input->post('email');//email
		$job = $this->input->post('job');//job
		$identity = $this->input->post('identity');//identity
		$spouse = $this->input->post('spouse');//spouse
		$cabang = $this->input->post('cabang');
        $jenis_kelamin = $this->input->post('JK');
		$data = array('nama'=>$nama,
						'City'=>$city,
						'TTL'=>$TTL,
						'alamat'=>$alamat,
						'ZIP'=>$ZIP,
						'ibu'=>$ibu,
						'HP'=>$HP,
						'TP'=>$TP,
						'email'=>$email,
						'job'=>$job,
						'identity'=>$identity,
						'spouse'=>$spouse,
                      'jenis_kelamin'=>$jenis_kelamin,
					  'cabang'=>$cabang);
		$this->anggota_model->createdata('anggota',$data);
		redirect('Anggota/home');
	}
	public function load_LastRek($id_anggota){
		$title = 'buat rekening';
		$no_admin = $this->session->userdata('no_admin');
		$log = $this->admin_model->getLastLogin($no_admin);
		$data['title'] = $title;
		$data['log'] = $log;
		$data['id_anggota'] = $id_anggota;
		$data['lastRek'] = $this->anggota_model->getLastRek();
		// buat id rekening ke terakhir
		$this->load->view('header',$data);
		$this->load->view('sidebar');
		$this->load->view('anggota/add_rekening',$data);
		$this->load->view('footer');
	}
	public function create_rekening($id_anggota){
		$noRek = $this->input->post('no_rekening');
		$cabang = $this->input->post('cabang');
		$data = array('no_rekening'=>$noRek,
					  'cabang'=>$cabang,
					  'id_anggota'=>$id_anggota);
		$pokok_wajib = array('pokok_wajib'=> 0,
													'nominal'=> 0,
													'date'=> date("Y-m-d"));
		$tabarok_a = array('debit_kredit'=> 0 ,
												'nominal'=> 0,
												'date'=> date("Y-m-d"));
		$tarekah_a = array('debit_kredit'=> 0,
												'nominal'=>0,
												'date'=> date("Y-m-d"));
		$tarekah_b = array('date'=> date("Y-m-d"));
		$nominal_tarekah_b = array('debit_kredit'=> 0,
															'nominal'=> 0);


		// validation in DB

		if($this->anggota_model->isExistInDB('no_rekening',$noRek,'no_rekening')){
			// kasih message error dan redirect
			$this->session->set_flashdata('error','No rekening dengan nomor yang sama sudah ada');
		}
		else{
			// kasih message berhasil
			$this->session->set_flashdata('error','Rekening berhasil dibuat');
			$this->anggota_model->createdata('no_rekening',$data);//
			// set default seluruh saldo jadi 0, aktifkan!!
			$id_rekening = $this->db->insert_id();
			/*$pokok_wajib['id_rekening'] = $id_rekening;
			$this->anggota_model->createdata('pokok_wajib',$pokok_wajib);
			$tabarok_a['id_rekening'] = $id_rekening;
			$this->anggota_model->createdata('tabarok_a',$tabarok_a);//
			$tarekah_a['id_rekening'] = $id_rekening;
			$this->anggota_model->createdata('tarekah_a',$tarekah_a);//
			$tarekah_b['id_rekening'] = $id_rekening;
			$this->anggota_model->createdata('tarekah_b',$tarekah_b);//
			$nominal_tarekah_b['id_tarekah_b'] = $this->db->insert_id();
			$this->anggota_model->createdata('nominal_tarekah_b',$nominal_tarekah_b);//*/
		}
		redirect('anggota/detail_anggota/'.$id_anggota);

	}
	public function add_trans($id_rekening){
		$title = 'tambah transaksi';
		$no_admin = $this->session->userdata('no_admin');
		$data['admin'] = $this->admin_model->getAdmin($no_admin);
		$log = $this->admin_model->getLastLogin($no_admin);
		$data['title'] = $title;
		$data['log'] = $log;
		$data['id_rekening'] = $id_rekening;
		$this->load->view('header',$data);
		$this->load->view('sidebar');
		$this->load->view('anggota/add_transaction',$data);
		$this->load->view('footer');
	}
	public function process_addtrans($id_rekening){
		$title = 'proses tambah transaksi';
		$no_admin = $this->session->userdata('no_admin');
		$admin = $this->admin_model->getAdmin($no_admin);
		$log = $this->admin_model->getLastLogin($no_admin);
		$pilihan = $this->input->post('pilihan');
		$rekening = $this->anggota_model->getRekening($id_rekening);
		$data['id_rekening'] = $id_rekening;
		date_default_timezone_set("Asia/Jakarta");
		$data['date'] = date("Y-m-d");
		$data['created_at'] = date("Y-m-d h:i:s");
		switch($pilihan){
			case '1' :{ $data['nominal'] = $this->input->post('nominal');
						$data['pokok_wajib'] = $this->input->post('tipe_select');
						// masukin ke database table pokok_wajib
						$this->anggota_model->createdata('pokok_wajib',$data);
						// update data rekening

						$data2['saldo_pokok_wajib'] = $rekening[0]->saldo_pokok_wajib + $this->input->post('nominal');
						$data2['id'] = $id_rekening;
						$data2['saldo_tabarok_a'] = $rekening[0]->saldo_tabarok_a - $this->input->post('nominal');
						$this->anggota_model->updatedata('no_rekening',$data2);
						break;}
			case '2' :{
					
						if($rekening[0]->saldo_tabarok_a<$this->input->post('nominal')
							&& ($this->input->post('kode')!='1'
							&& $this->input->post('kode')!='41'
							&& $this->input->post('kode')!='42'
							&& $this->input->post('kode')!='43'
							&& $this->input->post('kode')!='6'
							&& $this->input->post('kode')!='10'
							&& $this->input->post('kode')!='14'
							&& $this->input->post('kode')!='15')
							){
							$this->session->set_flashdata('gagal','Saldo anda tidak mencukupi untuk melakukan transaksi');
						}else{
						$this->session->set_flashdata('gagal','Transaksi berhasil dilakukan');
						$data['nominal'] = $this->input->post('nominal');
						$data['kode'] = $this->input->post('kode');
						switch($this->input->post('kode')){
							case '1':{$data['debit_kredit'] ='1';break; }
							case '2':{$data['debit_kredit'] ='0';break;}
							case '3':{$data['debit_kredit'] ='0';break;}
								case '41':{$data['debit_kredit'] ='1';break;}
								case '4':{$data['debit_kredit'] ='0';break;}
								case '42':{$data['debit_kredit'] ='1';break;}
								case '43':{$data['debit_kredit'] ='1';break;}
							case '6':{$data['debit_kredit'] ='1';break;}
							case '5':{$data['debit_kredit'] ='0';break;}
							case '7':{$data['debit_kredit'] ='0';break;}
							case '8':{$data['debit_kredit'] ='0';break;}
							case '9':{$data['debit_kredit'] ='0';break;}
							case '10':{$data['debit_kredit'] ='1';break;}
							case '11':{$data['debit_kredit'] ='0';
												 $data2['nominal'] = $this->input->post('nominal');
												 $data2['pokok_wajib'] = '1';
												 $this->anggota_model->createdata('pokok_wajib',$data2);
													break;}// pokok
							case '12':{$data['debit_kredit'] ='0';
													$data2['nominal'] = $this->input->post('nominal');
							 						$data2['pokok_wajib'] = '0';
							 						$this->anggota_model->createdata('pokok_wajib',$data2);
													break;}// Wajib
							case '13':{$data['debit_kredit'] ='0';break;}
							case '14':{$data['debit_kredit'] ='1';break;}
							case '15':{$data['debit_kredit'] ='1';break;}
						}
						$data['keterangan'] = $this->input->post('ktr');
						$jumlah = $this->db->query('select count(*) as jumlah from tabarok_a where MONTH(date) ='.date('m'))->result();
						$data['no_transaksi'] =  "TB".$admin[0]->id_cabang.$this->bulanind(date("m")).$this->jumlahnya($jumlah);
						$data['petugas'] = $admin[0]->initial;
						$this->anggota_model->createdata('tabarok_a',$data);
						if($data['debit_kredit']=='1'){
						$data2['saldo_tabarok_a'] = $rekening[0]->saldo_tabarok_a + $this->input->post('nominal');	
					}else
					{
						$data2['saldo_tabarok_a'] = $rekening[0]->saldo_tabarok_a - $this->input->post('nominal');
					}
						
						$data2['id'] = $id_rekening;

						$this->anggota_model->updatedata('no_rekening',$id_rekening,$data2);
						}
						break;}
			case '3' :{	
						$this->session->set_flashdata('gagal','Transaksi berhasil dilakukan');
						$data['nominal'] = $this->input->post('nominal');
						$data['debit_kredit'] = $this->input->post('debit_kredit');
						$data['waktu'] = $this->input->post('lama_bagihasil');
						$data['keterangan'] = $this->input->post('ktr');
						$jumlah = $this->db->query('select count(*) as jumlah from tabarok_a where MONTH(date) ='.date('m'))->result();
						$data['no_transaksi'] =  "TB0".$admin[0]->id_cabang.$this->bulanind(date("m")).$this->jumlahnya($jumlah);
						$data['petugas'] = $admin[0]->initial;
						$this->anggota_model->createdata('tarekah_a',$data);
						// memasukkan data ke bagi_hasil_tarekah_a
						//$data2['id_tarekah_a'] = $this->db->insert_id();
						//$data2['nominal_bagi_hasil'] = 0;
						//$data2['date'] = date("Y-m-d");
						//$this->anggota_model->createdata('bagi_hasil_tarekah_a',$data2);
						
						break;}//well fixed
			case '4' :{ $saldo_tarekah_b = $this->tarekah_b_model->getTarekahBById($id_rekening);
						
						$this->session->set_flashdata('gagal','Transaksi berhasil dilakukan');
						$data['waktu'] = $this->input->post('lama_bagihasil');
						$data['keterangan'] = $this->input->post('ktr');
						$jumlah = $this->db->query('select count(*) as jumlah from tabarok_a where MONTH(date) ='.date('m'))->result();
						$data['no_transaksi'] =  "TB0".$admin[0]->id_cabang.$this->bulanind(date("m")).$this->jumlahnya($jumlah);
						$data['petugas'] = $admin[0]->initial;
						$this->anggota_model->createdata('tarekah_b',$data);
						// Memasukkan data ke nominal_tarekah_b
						$data2['id_tarekah_b'] = $this->db->insert_id();
						$data2['date'] = date("Y-m-d");
						$data2['nominal'] = $this->input->post('nominal');
						$data2['debit_kredit'] = $this->input->post('debit_kredit');
						$this->anggota_model->createdata('nominal_tarekah_b',$data2);
						
						break;}
		}
		redirect('anggota/detail_rekening/'.$id_rekening);
	}
	public function bulanind($data){
		switch($data){
			case '1':{return '01';break;}
			case '2':{return '02';break;}
			case '3':{return '03';break;}
			case '4':{return '04';break;}
			case '5':{return '05';break;}
			case '6':{return '06';break;}
			case '7':{return '07';break;}
			case '8':{return '08';break;}
			case '9':{return '09';break;}
			case '10':{return '10';break;}
			case '11':{return '11';break;}
			case '12':{return '12';break;}

		}
	}
	public function jumlahnya($data){
		switch(strlen($data[0]->jumlah)){
			case 1 : {return "00".($data[0]->jumlah +1) ;break;}
			case 2 : {return "0".($data[0]->jumlah+ 1); break;}
			case 3 : {return ($data[0]->jumlah +1); break;}

		}
	}
	public function edit($id_anggota){
		$data['title'] = 'Edit Anggota';
		$no_admin = $this->session->userdata('no_admin');
		$data['log'] = $this->admin_model->getLastLogin($no_admin);
		$data['anggota'] = $this->anggota_model->getAnggotaById($id_anggota);
		$this->load->view('header',$data);
		$this->load->view('sidebar');
		$this->load->view('anggota/edit_anggota',$data);
		$this->load->view('footer');
	}
	public function edit_anggota($id){
		$title = 'anggota baru';
		$no_admin = $this->session->userdata('no_admin');
		$log = $this->admin_model->getLastLogin($no_admin);
		//dibuat perdatabase
		//database anggota dengan table anggota
		$nama = $this->input->post('name');
		$city = $this->input->post('City');//CIty
		$TTL = date("Y-m-d",strtotime($this->input->post('TTL')));//TTL
		$alamat = $this->input->post('alamat');//alamat
		$ZIP = $this->input->post('ZIP');//ZIP
		$ibu = $this->input->post('ibu');//ibu
		$HP = $this->input->post('HP');//HP
		$TP = $this->input->post('TP');//TP
		$email = $this->input->post('email');//email
		$job = $this->input->post('job');//job
		$identity = $this->input->post('identity');//identity
		$spouse = $this->input->post('spouse');//spouse
		$cabang = $this->input->post('cabang');
        $jenis_kelamin = $this->input->post('JK');
		$data = array('nama'=>$nama,
						'City'=>$city,
						'TTL'=>$TTL,
						'alamat'=>$alamat,
						'ZIP'=>$ZIP,
						'ibu'=>$ibu,
						'HP'=>$HP,
						'TP'=>$TP,
						'email'=>$email,
						'job'=>$job,
						'identity'=>$identity,
						'spouse'=>$spouse,
                      'jenis_kelamin'=>$jenis_kelamin,
					  'cabang'=>$cabang);
		$this->anggota_model->updatedata('anggota',$id,$data);
		redirect('Anggota/home');
	}
	public function rinci_tarekah($id){
		$title = 'Rincian Tarekah';
		$no_admin = $this->session->userdata('no_admin');
		$log = $this->admin_model->getLastLogin($no_admin);
		$data['title'] = $title;
		$data['log'] = $log;
		$data['tarekah_a'] = $this->tarekah_a_model->getTarekahAId($id);
		$data['bagihasil'] = $this->bagi_hasil_tarekah_a_model->getBagiHasilTarekahAById($id);
		$this->load->view('header',$data);
		$this->load->view('sidebar');
		$this->load->view('anggota/detail_tarekah',$data);
		$this->load->view('footer');
	}
	public function estimasi_bagihasil($id){
		$no_admin = $this->session->userdata('no_admin');
		$log = $this->admin_model->getLastLogin($no_admin);
		$pertahun = (int)$this->input->post('pertahun');
		$awal = (int)$this->input->post('awal');
		$data['bagihasil'] = $pertahun;
		$data['awal'] = $awal;
		$this->anggota_model->updatedata('tarekah_a',$id,$data);
		$waktu = (int) $this->input->post('waktu');
		$nominal = (float) $this->input->post('nominal');
		$no =0;
		$data2['id_tarekah_a'] = $id;
		$data2['nominal_bagi_hasil'] = $nominal/12 *$awal/100;
		$data2['keterangan'] = "bagi hasil";

		switch($waktu){
				case 3:{
						$data2['nominal_ke_anggota'] = $nominal/12*$awal/100 *40/100;
						$data2['nominal_ke_albashare'] = $nominal/12*$awal/100 *60/100;
						$data2['status'] = 0;//belum dipindah tabarok
						$data2['date'] = date("Y-m-d");
						break;
				}
				case 6:{
						$data2['nominal_ke_anggota'] = $nominal/12*$awal/100 *50/100;
						$data2['nominal_ke_albashare'] = $nominal/12 *$awal/100*50/100;
						$data2['status'] = 0;//belum dipindah tabarok
						$data2['date'] = date("Y-m-d");
						break;
				}
				case 12:{
						$data2['nominal_ke_anggota'] = $nominal/12 *$awal/100*60/100;
						$data2['nominal_ke_albashare'] = $nominal/12 *$awal/100*40/100;
						$data2['status'] = 0;//belum dipindah tabarok
						$data2['date'] = date("Y-m-d");
						break;
				}

			}
		for($i = 1;$i<=$waktu;$i++){
			$data2['date'] = date("Y-m-d",strtotime( "+".$i." month"));
			$this->anggota_model->createdata('bagi_hasil_tarekah_a',$data2);

		}
		//ambil sisa nisbah
		$data2['nominal_bagi_hasil'] = $nominal *($pertahun-$awal)/100*($waktu/12);

		switch($waktu) {

			case 3:{
				$data2['nominal_ke_anggota'] = $nominal *($pertahun-$awal)/100*($waktu/12) *40/100;
				$data2['nominal_ke_albashare'] =$nominal *($pertahun-$awal)/100*($waktu/12) *60/100;
				break;
			}
				# code...
			case 6:{
				$data2['nominal_ke_anggota'] = $nominal *($pertahun-$awal)/100*($waktu/12) *50/100;
				$data2['nominal_ke_albashare'] = $nominal *($pertahun-$awal)/100*($waktu/12) *50/100;
				break;
			}
			case 12:{
				$data2['nominal_ke_anggota'] = $nominal *($pertahun-$awal)/100*($waktu/12) *60/100;
				$data2['nominal_ke_albashare'] = $nominal *($pertahun-$awal)/100*($waktu/12) *40/100;
				break;
			}	
			
		}
		$data2['keterangan'] = "sisa nisbah";
		$this->anggota_model->createdata('bagi_hasil_tarekah_a',$data2);
		redirect('Anggota/rinci_tarekah/'.$id);
	}
	public function pindah_ke_tabarok($id,$id_bagihasil){
		$no_admin = $this->session->userdata('no_admin');
		$admin = $this->admin_model->getAdmin($no_admin);
		$log = $this->admin_model->getLastLogin($no_admin);
		$data['status'] = 1;
		$this->anggota_model->updatedata('bagi_hasil_tarekah_a',$id_bagihasil,$data);
		$bagihasil = $this->bagi_hasil_tarekah_a_model->getBagiHasilId($id_bagihasil);
		$jumlah = $this->db->query('select count(*) as jumlah from tabarok_a where MONTH(date) ='.date('m'))->result();
		$data = $this->tarekah_a_model->getTarekahAId($id);
		
		$data2['id_rekening'] = $data[0]->id_rekening;
		$data2['debit_kredit'] = 1;
		$data2['nominal'] = (float)$bagihasil[0]->nominal_ke_anggota;
		$data2['petugas'] = $admin[0]->initial;
		$data2['date'] = date("Y-m-d");
		$data2['created_at'] = date("Y-m-d H:i:s");
		$data2['keterangan'] = "Pindah dari tarekah dengan id : ".$id;
		$data2['kode'] = 6;
		$data2['no_transaksi'] =  "TB".$admin[0]->id_cabang.$this->bulanind(date("m")).$this->jumlahnya($jumlah);
		$rekening = $this->anggota_model->getRekeningId($data[0]->id_rekening);
		$this->anggota_model->createdata('tabarok_a',$data2);
		$data3['saldo_tabarok_a'] = $rekening[0]->saldo_tabarok_a + (float)$bagihasil[0]->nominal_ke_anggota;	
		$this->anggota_model->updatedata('no_rekening',$data[0]->id_rekening,$data3);
		redirect('Anggota/rinci_tarekah/'.$id);	
	}
	public function ambil_tarekah($id){
		$no_admin = $this->session->userdata('no_admin');
		$admin = $this->admin_model->getAdmin($no_admin);
		$log = $this->admin_model->getLastLogin($no_admin);
		$data['status'] = 1;
		$this->anggota_model->updatedata('tarekah_a',$id,$data);
		$data = $this->tarekah_a_model->getTarekahAId($id);
		$jumlah = $this->db->query('select count(*) as jumlah from tabarok_a where MONTH(date) ='.date('m'))->result();

		// pindah ke tabarok
		$data2['id_rekening'] = $data[0]->id_rekening;
		$data2['debit_kredit'] = 1;
		$data2['nominal'] = (float)$data[0]->nominal;
		$data2['petugas'] = $admin[0]->initial;
		$data2['date'] = date("Y-m-d");
		$data2['created_at'] = date("Y-m-d H:i:s");
		$data2['keterangan'] = "tarekah dengan id : ".$id."berakhir, dan dipindah ketabarok";
		$data2['kode'] = 6;
		$data2['no_transaksi'] =  "TB".$admin[0]->id_cabang.$this->bulanind(date("m")).$this->jumlahnya($jumlah);
		$rekening = $this->anggota_model->getRekeningId($data[0]->id_rekening);
		$data3['saldo_tabarok_a'] = $rekening[0]->saldo_tabarok_a +(float) $data[0]->nominal;	
		$this->anggota_model->createdata('tabarok_a',$data2);
		redirect('Anggota/detail_rekening'.$data[0]->id_rekening);	
	}
}
