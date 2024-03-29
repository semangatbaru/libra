<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_Kredit extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		$this->load->model("M_Laporan_Kredit");
		$this->load->library('form_validation');
		$this->load->helper('url');
		if($this->session->userdata('status') != 'login'){
				redirect(base_url(""));
		}
	}
	public function index(){
		$this->load->view("laporan_kredit/laporan.php");
	}

	public function hariQ(){
		$this->load->view("laporan_kredit/cetak/cetak_kredit_hariini.php");
	}

	public function getAll(){
		$data=$this->M_Laporan_Kredit->ambil_data();
		echo json_encode($data);
	}
	public function getharian(){
		$data=$this->M_Laporan_Kredit->ambil_dataharian();
		echo json_encode($data);
	}
	public function getmingguan(){
		$data=$this->M_Laporan_Kredit->ambil_datamingguan();
		echo json_encode($data);
	}
	public function getbulanan(){
		$data=$this->M_Laporan_Kredit->ambil_databulanan();
		echo json_encode($data);
	}
	
	public function gettahunan(){
		$data=$this->M_Laporan_Kredit->ambil_datatahunan();
		echo json_encode($data);
	}
	public function cetakHarian(){
		$data["laporan_kredit"] = $this->M_Laporan_Kredit->ambil_dataharian();
		$data["sum_kharian"] = $this->M_Laporan_Kredit->ambil_sumharian();

		  
	    $this->load->view('laporan_kredit/cetak/cetak_kredit_harian', $data);    
	   
	}
	public function cetakMingguan(){
		$data["laporan_kredit"] = $this->M_Laporan_Kredit->ambil_datamingguan();
		$data["sum_kmingguan"] = $this->M_Laporan_Kredit->ambil_summingguan();

		  
	    $this->load->view('laporan_kredit/cetak/cetak_kredit_mingguan', $data);    
	    
	}
	public function cetakBulanan(){
		$data["laporan_kredit"] = $this->M_Laporan_Kredit->ambil_databulanan();
		$data["sum_kbulanan"] = $this->M_Laporan_Kredit->ambil_sumbulanan();

		  

		$this->load->view('laporan_kredit/cetak/cetak_kredit_bulanan', $data);      
		
	}
	public function cetakTahunan(){
		$data["laporan_kredit"] = $this->M_Laporan_Kredit->ambil_datatahunan();
		$data["sum_ktahunan"] = $this->M_Laporan_Kredit->ambil_sumtahunan();

		$this->load->view('laporan_kredit/cetak/cetak_kredit_tahunan', $data);    
		
	}
	
	public function cetakAll(){
		$data["laporan_kredit"] = $this->M_Laporan_Kredit->ambil_data();
		$data["sumkredit"] = $this->M_Laporan_Kredit->ambil_sum();

		
		$this->load->view('laporan_kredit/cetak/cetak_kredit_semua', $data);
		
	}
}
