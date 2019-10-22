<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_Debit extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		$this->load->model("M_Laporan_Debit");
		$this->load->library('form_validation');
		$this->load->helper('url');
		if($this->session->userdata('status') != 'login'){
				redirect(base_url(""));
		}
	}
	public function index(){
		$this->load->view("laporan_debit/laporan.php");
	}

	public function hariQ(){
		$this->load->view("laporan_debit/cetak/cetak_debit_hariini.php");
	}

	public function getAll(){
		$data=$this->M_Laporan_Debit->ambil_data();
		echo json_encode($data);
	}
	public function getharian(){
		$data=$this->M_Laporan_Debit->ambil_dataharian();
		echo json_encode($data);
	}
	public function getmingguan(){
		$data=$this->M_Laporan_Debit->ambil_datamingguan();
		echo json_encode($data);
	}
	public function getbulanan(){
		$data=$this->M_Laporan_Debit->ambil_databulanan();
		echo json_encode($data);
	}
	
	public function gettahunan(){
		$data=$this->M_Laporan_Debit->ambil_datatahunan();
		echo json_encode($data);
	}
	public function cetakHarian(){
		$data["laporan_debit"] = $this->M_Laporan_Debit->ambil_dataharian();
		$data["sum_dharian"] = $this->M_Laporan_Debit->ambil_sumharian();

		ob_start();    
	    $this->load->view('laporan_debit/cetak/cetak_debit_harian', $data);    
	    $html = ob_get_contents();        

	    ob_end_clean();                
	    require_once('./assets/html2pdf/html2pdf.class.php');    
	    $pdf = new HTML2PDF('P','A4','en');
	    $pdf->WriteHTML($html);    
	    $pdf->Output('Laporan Harian.pdf', 'D'); 
	}
	public function cetakMingguan(){
		$data["laporan_debit"] = $this->M_Laporan_Debit->ambil_datamingguan();
		$data["sum_dmingguan"] = $this->M_Laporan_Debit->ambil_summingguan();

		ob_start();    
	    $this->load->view('laporan_debit/cetak/cetak_debit_mingguan', $data);    
	    $html = ob_get_contents();        

	    ob_end_clean();                
	    require_once('./assets/html2pdf/html2pdf.class.php');    
	    $pdf = new HTML2PDF('P','A4','en');
	    $pdf->WriteHTML($html);    
	    $pdf->Output('Laporan Mingguan.pdf', 'D'); 
	}
	public function cetakBulanan(){
		$data["laporan_debit"] = $this->M_Laporan_Debit->ambil_databulanan();
		$data["sum_dbulanan"] = $this->M_Laporan_Debit->ambil_sumbulanan();

		  

		$this->load->view('laporan_debit/cetak/cetak_debit_bulanan', $data);      
		// ob_start();
		
	    // $html = ob_get_contents();        

	    // ob_end_clean();                
	    // require_once('./assets/html2pdf/html2pdf.class.php');    
	    // $pdf = new HTML2PDF('P','A4','en');
	    // $pdf->WriteHTML($html);    
	    // $pdf->Output('Laporan Mingguan.pdf', 'D'); 
	}
	public function cetakTahunan(){
		$data["laporan_debit"] = $this->M_Laporan_Debit->ambil_datatahunan();
		$data["sum_dtahunan"] = $this->M_Laporan_Debit->ambil_sumtahunan();

		$this->load->view('laporan_debit/cetak/cetak_debit_tahunan', $data);    
		// ob_start();    
	    
	    // $html = ob_get_contents();        

	    // ob_end_clean();                
	    // require_once('./assets/html2pdf/html2pdf.class.php');    
	    // $pdf = new HTML2PDF('P','A4','en');
	    // $pdf->WriteHTML($html);    
	    // $pdf->Output('Laporan Tahunan.pdf', 'D'); 
	}
	
	public function cetakAll(){
		$data["laporan_debit"] = $this->M_Laporan_Debit->ambil_data();
		$data["sumdebit"] = $this->M_Laporan_Debit->ambil_sum();

		ob_start();    
	    $this->load->view('laporan_debit/cetak/cetak_debit_semua', $data);    
	    $html = ob_get_contents();        

	    ob_end_clean();                
	    require_once('./assets/html2pdf/html2pdf.class.php');    
	    $pdf = new HTML2PDF('P','A4','en');
	    $pdf->WriteHTML($html);    
	    $pdf->Output('Laporan Semua.pdf', 'D'); 
	}
}
