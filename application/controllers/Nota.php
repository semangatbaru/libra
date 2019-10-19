<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Nota extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model("M_pemesanan");
        $this->load->library('form_validation');
        $this->load->helper('url');
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url(""));
        }
    }

    
    public function index($id_pemesanan)
	{
		$where = array('id_pemesanan' => $id_pemesanan );
        $data['pemesanan'] = $this->M_pemesanan->nota('detG',$where )->result();
        $data['detail'] = $this->M_pemesanan->nota('detail_pemesanan',$where)->result();
		$this->load->view("nota",$data);
	}
    
}
