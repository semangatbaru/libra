<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan_Pemesanan extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		$this->load->model("M_Laporan_Pemesanan");
		$this->load->library('form_validation');
		$this->load->helper('url');
		if($this->session->userdata('status') != 'login'){
				redirect(base_url(""));
		}
	}
	public function index()
	{
		$this->load->view("laporan_pemesanan");
	}
	public function getAll(){
		$data=$this->M_Laporan_Pemesanan->ambil_data();
		echo json_encode($data);
	}
	public function edit(){
		$data=$this->M_Laporan_Pemesanan->update2();
		$data=$this->M_Laporan_Pemesanan->update();
		echo json_encode($data);
	}
	public function getD(){
		$id_pemesanan = $this->input->post("id_pemesanan");
		$data=$this->M_Laporan_Pemesanan->ambil_detail($id_pemesanan);
		echo json_encode($data); 
	}
	public function getG(){
		$id_pemesanan = $this->input->post("id_pemesanan");
		$data=$this->M_Laporan_Pemesanan->ambil_gambar($id_pemesanan);
		echo json_encode($data); 
	}
	public function cetak()
	{
		$pemesanan = $this->input->post("id_pemesanan");
		$data["laporan_pemesanan"] = $this->M_Laporan_Pemesanan->ambil_data($pemesanan);
		ob_start();
		$this->load->view('laporan_pemesanan/cetak/cetak_barang', $data);
		$html = ob_get_contents();

		ob_end_clean();
		require_once('./assets/html2pdf/html2pdf.class.php');
		$pdf = new HTML2PDF('P', 'A4', 'en');
		$pdf->WriteHTML($html);
		$pdf->Output('Laporan Pemesanan.pdf', 'D');
	}

	public function ambil(){
		$data = $this->M_Laporan_Pemesanan->save();
		$data = $this->M_Laporan_Pemesanan->delete();
		$data = $this->M_Laporan_Pemesanan->delete1();
		$data = $this->M_Laporan_Pemesanan->delete2();
		$data = $this->M_Laporan_Pemesanan->delete3();
		$data = $this->M_Laporan_Pemesanan->delete4();
		echo json_encode($data);
	}

	public function hapus(){
		
		$data = $this->M_Laporan_Pemesanan->delete9();
		$data = $this->M_Laporan_Pemesanan->delete();
		$data = $this->M_Laporan_Pemesanan->delete1();
		$data = $this->M_Laporan_Pemesanan->delete2();
		$data = $this->M_Laporan_Pemesanan->delete4();
		$data = $this->M_Laporan_Pemesanan->delete3();
		echo json_encode($data);
	}

}
