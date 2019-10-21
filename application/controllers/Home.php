<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		$this->load->model("M_Home");
		$this->load->library('form_validation');
		$this->load->helper('url');
		if($this->session->userdata('status') != 'login'){
				redirect(base_url(""));
		}
	}

	public function getAll(){
		$data=$this->M_Home->ambil_data();
		echo json_encode($data);
	}
	public function index(){
		$this->load->view("home");
	}
	public function getD(){
		$id_pemesanan = $this->input->post("id_pemesanan");
		$data=$this->M_Home->ambil_detail($id_pemesanan);
		echo json_encode($data); 
	}

}
