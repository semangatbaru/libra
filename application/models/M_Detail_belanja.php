<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Detail_belanja extends CI_Model {
    // deklarasi variable
    private $_table = "barangmasuk";
    private $_table1 = "laporan_transaksiharian";
    private $_table2 = "laporan_transaksimingguan";
    private $_table3 = "laporan_transaksibulanan";
    private $_table4 = "laporan_transaksitahunan";
    private $_table5 = "detail_belanja";

    //menampilkan data
    public function rule(){
        return[
            [`field` => `nama`,
            `rules` => `required`],
            [`field` => `password`,
            `rules` => `required`],
        ];
    }
    
    //menampilkan data
    public function ambil_data($table, $where){
        // $id_barangmasuk = $_GET['id_barangmasuk'];
        // $this->db->select('*');
        // $this->db->from('id_barangmasuk');
        // $this->db->join()
        // $this->db->where('barangmasuk.id_barangmasuk', $id_barangmasuk);
        return $this->db->get_where($table,$where);
    }
    public function ambil_detail($id_barangmasuk){
        $this->db->order_by('id_barangmasuk','ASC');
        // return $this->db->query("Select DISTINCT pemesanan.*,detail_pemesanan.* FROM pemesanan, detail_pemesanan WHERE pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan AND detail_pemesanan.id_pemesanan = $id_pemesanan")->result();
        return $this->db->get_where("detail_belanja", array('id_barangmasuk' => $id_barangmasuk))->result();
      
    }
    //Update data
    public function update()
    {
        $post = $this->input->post();
        $this->id_barangmasuk = $post["id_barangmasuk"];
        $this->bayar = $post["bayar"];

        $this->db->update($this->_table1, $this, array('id_barangmasuk' => $post['id_barangmasuk2']));
    }
    
    public function update2()
    {
        $post = $this->input->post();
        $this->id_barangmasuk = $post["id_barangmasuk"];
        $this->db->update($this->_table2, $this, array('id_barangmasuk' => $post['id_barangmasuk2']));
    }

    public function ambil_dataharian(){
        return $this->db->get($this->_table1)->result();
    }
    
    public function ambil_datamingguan(){
        return $this->db->get($this->_table2)->result();
    }
    public function ambil_databulanan(){
        return $this->db->get($this->_table3)->result();
    }
    public function ambil_datatahunan(){
        return $this->db->get($this->_table4)->result();
    }
}