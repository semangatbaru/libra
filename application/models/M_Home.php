<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * 
 */
class M_Home extends CI_Model{
	 
	 private $_table = "pemesanan";
	 private $_table2 = "detail_pemesanan";

	// public function all(){
	// 	$hasil = $this->db->get('barang');
	// 	if($hasil->num_rows() > 0){
	// 		return $hasil->result();
	// 	} else {
	// 		return array();
	// 	}
	// }
	 public function ambil_data(){
	 	$this->db->order_by('id_pemesanan','ASC');
	 	return $this->db->get($this->_table)->result();
    }
    public function ambil_detail($id_pemesanan){
    	$this->db->order_by('id_pemesanan','ASC');
        // return $this->db->query("Select DISTINCT pemesanan.*,detail_pemesanan.* FROM pemesanan, detail_pemesanan WHERE pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan AND detail_pemesanan.id_pemesanan = $id_pemesanan")->result();
        return $this->db->get_where("detail_pemesanan", array('id_pemesanan' => $id_pemesanan))->result();
        
    }

		// public function find($id_barang){
		// 	//Query mencari record berdasarkan ID-nya
		// 	$hasil = $this->db->where('id_barang', $id_barang)
		// 					->get('barang');
		// 	if ($hasil->num_rows() > 0){
		// 		return $hasil->row();
		// 	} else {
		// 		return array();
		// 	}
		// }
}