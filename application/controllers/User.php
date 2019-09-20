<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
    
    function __construct(){
		parent::__construct();
		$this->load->model("M_User");
		$this->load->library('form_validation');
		$this->load->helper('url');
		if($this->session->userdata('status') != 'login'){
				redirect(base_url(""));
		}
	
	}
	public function index()
	{
		$this->load->view("user");
	}
	public function getAll(){
		$data=$this->M_User->ambil_data();
		echo json_encode($data);
	}
	public function add(){
		$data=$this->M_User->save();
		echo json_encode($data);
	}
	public function edit(){
		$data=$this->M_User->update();
		echo json_encode($data);
	}
	public function hapus(){
		$data = $this->M_User->delete();
		echo json_encode($data);
	}
}
