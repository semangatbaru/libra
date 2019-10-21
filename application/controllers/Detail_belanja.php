<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_belanja extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		$this->load->model("M_Detail_belanja");
		$this->load->library('form_validation');
		$this->load->helper('url');
		if($this->session->userdata('status') != 'login'){
				redirect(base_url(""));
		}
	}

	public function index($id_barangmasuk)
	{
		$where = array('id_barangmasuk' => $id_barangmasuk);
		$data['print'] = $this->M_Detail_belanja->ambil_data('barangmasuk',$where)->result();
		$this->load->view("detail_belanja",$data);

		// $data["print2"] = $this->M_Detail_belanja->getData();
		// $this->load->view("detail_belanja", $data);
	}

	public function getAll(){
		$data=$this->M_Detail_belanja->ambil_data();
		echo json_encode($data);
	}
	public function edit(){
		$data=$this->M_Detail_belanja->update2();
		$data=$this->M_Detail_belanja->update();
		echo json_encode($data);
	}

	public function hariQ(){
		$this->load->view("laporan_transaksi/cetak/cetak_penjualan_hariini.php");
	}

	public function getharian(){
		$data["laporan"] = $this->M_Laporan_Transaksi->ambil_dataharian();
		$this->load->view('laporan_transaksi/cetak/cetak_penjualan_hariini', $data);
	}
	public function getmingguan(){
		$data["laporan"] = $this->M_Laporan_Transaksi->ambil_datamingguan();
		$this->load->view('laporan_transaksi/cetak/cetak_penjualan_mingguini', $data);
	}
	public function getbulanan(){
		$data=$this->M_Laporan_Transaksi->ambil_databulanan();
		echo json_encode($data);
	}
	
	public function gettahunan(){
		$data=$this->M_Laporan_Transaksi->ambil_datatahunan();
		echo json_encode($data);
	}
	public function cetakHarian(){
		$data["laporan_transaksi"] = $this->M_Laporan_Transaksi->ambil_dataharian();

		ob_start();    
	    $this->load->view('laporan_transaksi/cetak/cetak_penjualan_hariini', $data);    
	    $html = ob_get_contents();        

	    ob_end_clean();                
	    require_once('./assets/html2pdf/html2pdf.class.php');    
	    $pdf = new HTML2PDF('P','A4','en');
	    $pdf->WriteHTML($html);    
	    $pdf->Output('Laporan Harian.pdf', 'D'); 
	}
	public function cetakMingguan(){
		$data["laporan_transaksi"] = $this->M_Laporan_Transaksi->ambil_datamingguan();

		ob_start();    
	    $this->load->view('laporan_transaksi/cetak/cetak_penjualan_mingguini', $data);    
	    $html = ob_get_contents();        

	    ob_end_clean();                
	    require_once('./assets/html2pdf/html2pdf.class.php');    
	    $pdf = new HTML2PDF('P','A4','en');
	    $pdf->WriteHTML($html);    
	    $pdf->Output('Laporan Mingguan.pdf', 'D'); 
	}
	public function cetakBulanan(){
		$data["laporan_transaksi"] = $this->M_Laporan_Transaksi->ambil_databulanan();

		ob_start();    
	    $this->load->view('laporan_transaksi/cetak/cetak_penjualan_bulanini', $data);    
	    $html = ob_get_contents();        

	    ob_end_clean();                
	    require_once('./assets/html2pdf/html2pdf.class.php');    
	    $pdf = new HTML2PDF('P','A4','en');
	    $pdf->WriteHTML($html);    
	    $pdf->Output('Laporan Bulanan.pdf', 'D'); 
	}
	public function cetakTahunan(){
		$data["laporan_transaksi"] = $this->M_Laporan_Transaksi->ambil_datatahunan();

		ob_start();    
	    $this->load->view('laporan_transaksi/cetak/cetak_penjualan_tahunini', $data);    
	    $html = ob_get_contents();        

	    ob_end_clean();                
	    require_once('./assets/html2pdf/html2pdf.class.php');    
	    $pdf = new HTML2PDF('P','A4','en');
	    $pdf->WriteHTML($html);    
	    $pdf->Output('Laporan Tahunan.pdf', 'D'); 
	}
	
	public function cetakAll(){
		$data["laporan_transaksi"] = $this->M_Laporan_Transaksi->ambil_data();

		ob_start();    
	    $this->load->view('laporan_transaksi/cetak/cetak_penjualan_semua', $data);    
	    $html = ob_get_contents();        

	    ob_end_clean();                
	    require_once('./assets/html2pdf/html2pdf.class.php');    
	    $pdf = new HTML2PDF('P','A4','en');
	    $pdf->WriteHTML($html);    
	    $pdf->Output('Laporan Semua.pdf', 'D'); 
	}
}
