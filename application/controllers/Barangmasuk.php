<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Barangmasuk extends CI_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->library('cart');
        $this->load->model("M_barangmasuk");
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->database();
        if ($this->session->userdata('status') != 'login') {
            redirect(base_url(""));
        }
    }
    public function index()
    {
        $data["barangmasuk"] = $this->M_barangmasuk->get_pemesanan();
        $this->load->view("barangmasuk",$data);
    }
    public function setCode()
    {
        $data = $this->M_barangmasuk->kode();
        echo json_encode($data);
    }

    
    function Cart()
    {
        $data = $this->M_barangmasuk->keranjang();
        echo json_encode($data);
    }
    function show_keranjang()
    {
        $data = $this->M_barangmasuk->show();
        echo json_encode($data);
    }
    function load_cart()
    {
        $data = $this->M_barangmasuk->load();
        echo json_encode($data);
    }
    function hapus_keranjang()
    {
        $data = $this->M_barangmasuk->hapus();
        echo json_encode($data);
    }
    function total()
    {
        $data = $this->cart->total();
        echo json_encode($data);
    }
    function hapusSemua()
    {
        $data = $this->cart->destroy();
        echo json_encode($data);
    }
    public function add()
    {
        $data = $this->M_barangmasuk->insTr();
        $data = $this->M_barangmasuk->detail();
        echo json_encode($data);
    }
    public function addCre()
    {
        $data = $this->M_barangmasuk->insTr();
        $data = $this->M_barangmasuk->detail();
        $data = $this->M_barangmasuk->kredit();
        echo json_encode($data);
    }
}
