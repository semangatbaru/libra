<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Detail_Pemesanan extends CI_Model {
    // deklarasi variable
    private $_table = "cekcok";
    private $_table1 = "pemesanan";
    private $_table2 = "detail_pemesanan";

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
    public function ambil_data($table,$where){
        // $id_pemesanan = $_GET['id_pemesanan'];
        // $this->db->select('*');
        // $this->db->from('pemesanan');
        // $this->db->join('detail_pemesanan', 'detail_pemesanan.id_pemesanan = pemesanan.id_pemesanan');
        // $this->db->join('detail_gambar', 'detail_gambar.id_pemesanan = pemesanan.id_pemesanan');
        // $this->db->join('tb_user', 'pemesanan.id_user = tb_user.id_user');
        // $this->db->where('pemesanan.id_pemesanan', $id_pemesanan);
        // $hasil= $this->db->get();
        // return $hasil->result();
        return $this->db->get_where($table,$where);
    }

    //Update data
    public function update()
    {
        $post = $this->input->post();
        $this->kode_pemesanan = $post["kode_pemesanan"];
        $this->bayar = $post["bayar"];

        $this->db->update($this->_table1, $this, array('kode_pemesanan' => $post['kode_pemesanan2']));
    }
    public function update2()
    {
        $post = $this->input->post();
        $this->kode_pemesanan = $post["kode_pemesanan"];
     

     
        $this->db->update($this->_table2, $this, array('kode_pemesanan' => $post['kode_pemesanan2']));
    }
}