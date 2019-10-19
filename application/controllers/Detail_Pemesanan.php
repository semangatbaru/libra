<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Detail_Pemesanan extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		$this->load->model("M_Detail_Pemesanan");
		$this->load->library('form_validation');
		$this->load->helper('url');
		if($this->session->userdata('status') != 'login'){
				redirect(base_url(""));
		}
	}
	public function index($id_pemesanan)
	{
		$where = array('id_pemesanan' => $id_pemesanan );
		$data['print'] = $this->M_Detail_Pemesanan->ambil_data('pemesanan',$where)->result();
		$this->load->view("detail_pemesanan",$data);
	}
	public function getAll(){
		$data=$this->M_Detail_Pemesanan->ambil_data();
		echo json_encode($data);
	}
	public function edit(){
		$data=$this->M_Detail_Pemesanan->update2();
		$data=$this->M_Detail_Pemesanan->update();
		echo json_encode($data);
	}
}
