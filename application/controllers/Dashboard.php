 <?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

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
        $this->load->model('pokok_wajib_model');
        $this->load->model('tabarok_a_model');
        $this->load->model('tarekah_a_model');
        $this->load->model('tarekah_b_model');
				$this->load->model('Anggota_model');
				$this->load->library('excel');
    }

	public function index()
	{
		//$this->load->view('welcome_message');
		$this->home();
	}

	public function home()
	{
		$data['title'] = 'Dashboard';
		$data['header'] = 'Dashboard Albashar-e';
		$no_admin = $this->session->userdata('no_admin');
        $data['admin'] = $this->admin_model->getAdmin($no_admin);
		$data['log'] = $this->admin_model->getLastLogin($no_admin);
        $data['transaksi1'] = $this->pokok_wajib_model->getPokokWajib_no();
        $data['transaksi2'] = $this->tabarok_a_model->getTabarokA_no();
        $data['transaksi3'] = $this->tarekah_a_model->getTarekahA_no();
        $data['transaksi4'] = $this->tarekah_b_model->getTarekahB_no();
		$data['alltrans'] = $this->Anggota_model->alltrans();
		$data['laporan'] = $this->Anggota_model->laporanperbulan();
		$this->load->view('header', $data);
		$this->load->view('sidebar');
		$this->load->view('dashboard/log_transaksi',$data);
		$this->load->view('footer');
	}

	public function check_isvalidated()
	{
	    if(!$this->session->userdata('isLoggedIn'))
	    {
	        redirect('Login');
    	}
	}
	public function export($jenis_transaksi){
		$no_admin = $this->session->userdata('no_admin');
		$data['admin'] = $this->admin_model->getAdmin($no_admin);


		if($jenis_transaksi=='alltrans'){
				$exportdata = $this->tabarok_a_model->getTabarokA_no();

				$this->excel->setActiveSheetIndex(0);
				// ambil data
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0,2, "rekening");
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(1,2, "tanggal");
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(2,2, "kode");
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(3,2, "tarik");
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(4,2, "setor");
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(5,2, "saldo");
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(6,2, "petugas");
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(7,2, "no_transaksi");
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(8,2, "keterangan");
        $this->excel->getActiveSheet()->setCellValueByColumnAndRow(9,2, "pengecekan");
				$row =3;
				foreach ($exportdata as $field) {
						# code...//rekening tanggal kode tarik setor saldo petugas no_transaksi keterangan
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(0, $row, $field->no_rekening );
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(1, $row, $field->date );
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(2, $row, "0".$field->kode );
            if($field->debit_kredit==1){
              $this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, $row, $field->nominal );
              $this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, $row, "" );
            }else{
              $this->excel->getActiveSheet()->setCellValueByColumnAndRow(3, $row, "" );
              $this->excel->getActiveSheet()->setCellValueByColumnAndRow(4, $row, $field->nominal );
            }
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(5, $row, "" );//saldo
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(6, $row, $data['admin'][0]->initial );//petugas
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(7, $row, $field->no_transaksi );//no transaksi
            $this->excel->getActiveSheet()->setCellValueByColumnAndRow(8, $row, $field->keterangan );
					# code...
          $row++;
				}

				// buat looping
				// cek bulan, masukkin ke index sheet bulan yang sama dengan date bulan yang ada di data
				// looping data dengan foreach

		}elseif ($jenis_transaksi=='tabarok_a') {
			# code...
			$exportdata = $this->tabarok_a_model->getTabarokA();
		}elseif ($jenis_transaksi=='tarekah_a') {
			$exportdata = $this->tarekah_a_model->getTarekahA();
			# code...
		}elseif ($jenis_transaksi=='tarekah_b') {
			# code...
			$exportdata = $this->tarekah_b_model->getTarekahB();
		}
    $filename = "data_tabarok_keseluruhan.xlsx";
    //header('Content-Type: application/vnd.ms-excel');// mime type 2003
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachmeny; filename="'.$filename.'"');
    header('Cache-Control: max-age=0');//no cache
    $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
    //$objWriter = new PHPExcel_Writer_Excel2007($this->excel);
    ob_end_clean();
    $objWriter->save("php://output");

    exit();

	}
  public function import(){

  }
	public function automatic_transaction(){
		//pengurangan tiap bulan tanggal 5 untuk saldo tabarok a terkait pokok/wajib

		//penambahan bagi hasil terkait tarekah setiap tangal yang ditentukan
	}
}
