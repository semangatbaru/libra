<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Laporan_Pemesanan extends CI_Model {
    // deklarasi variable
    private $_table = "detG";
    private $_table1 = "pemesanan";
    private $_table2 = "detail_pemesanan";
    private $_table3 = "kredit";

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
    public function ambil_data(){
        return $this->db->get($this->_table)->result(); 
    }

    //Update data
    public function update()
    {
        $post = $this->input->post();
        $this->id_pemesanan = $post["id_pemesanan"];
        $this->bayar = $post["bayar"];

        $this->db->update($this->_table1, $this, array('id_pemesanan' => $post['id_pemesanan2']));
    }
    public function update2()
    {
        $post = $this->input->post();
        $this->id_pemesanan = $post["id_pemesanan"];
     
        $this->db->update($this->_table2, $this, array('id_pemesanan' => $post['id_pemesanan2']));
    }
    //menampilkan data
   public function ambil_detail($id_pemesanan){
        $this->db->order_by('id_pemesanan','ASC');
        // return $this->db->query("Select DISTINCT pemesanan.*,detail_pemesanan.* FROM pemesanan, detail_pemesanan WHERE pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan AND detail_pemesanan.id_pemesanan = $id_pemesanan")->result();
        return $this->db->get_where("detail_pemesanan", array('id_pemesanan' => $id_pemesanan))->result();
      
    }
    public function ambil_gambar($id_pemesanan){
        $this->db->order_by('id_pemesanan','ASC');
        // return $this->db->query("Select DISTINCT pemesanan.*,detail_pemesanan.* FROM pemesanan, detail_pemesanan WHERE pemesanan.id_pemesanan = detail_pemesanan.id_pemesanan AND detail_pemesanan.id_pemesanan = $id_pemesanan")->result();
        return $this->db->get_where("detail_gambar", array('id_pemesanan' => $id_pemesanan))->result();
    }
    //Delete
    public function delete()
    {
        // return $this->db->delete($this->_table, array("id_pemesanan"=> $id_pemesanan));
        $id_pemesanan = $this->input->post('id_pemesanan');
        $this->db->where('id_pemesanan', $id_pemesanan);
        $result = $this->db->delete('detail_pemesanan');
        return $result;
    }
    public function delete1()
    {
        // return $this->db->delete($this->_table, array("id_pemesanan"=> $id_pemesanan));
        $id_pemesanan = $this->input->post('id_pemesanan');
        $this->db->where('id_pemesanan', $id_pemesanan);
        
        $result = $this->db->delete('detail_gambar');
        
        return $result;
    }
    public function delete2()
    {
        // return $this->db->delete($this->_table, array("id_pemesanan"=> $id_pemesanan));
        $id_pemesanan = $this->input->post('id_pemesanan');
        $this->db->where('id_pemesanan', $id_pemesanan);
        
        
        $result = $this->db->delete('pemesanan');
        return $result;
    }
    public function delete4()
    {
        // return $this->db->delete($this->_table, array("id_pemesanan"=> $id_pemesanan));
        $id_pemesanan = $this->input->post('id_pemesanan');
        $this->db->where('id_pemesanan', $id_pemesanan);
        
        
        $result = $this->db->delete('barangmasuk');
        return $result;
    }
    public function delete3()
    {
        // return $this->db->delete($this->_table, array("id_pemesanan"=> $id_pemesanan));
        $id_pemesanan = $this->input->post('id_pemesanan');
        $this->db->where('id_pemesanan', $id_pemesanan);
        
        $result = $this->db->delete('detail_gambar');
        return $result;
    }
    public function delete9()
    {
        // return $this->db->delete($this->_table, array("id_pemesanan"=> $id_pemesanan));
        $id_pemesanan=$this->input->post('id_pemesanan');

		
		$foto=$this->db->get_where('detail_gambar',array('id_pemesanan'=>$id_pemesanan));


		foreach($foto->result() as $row){
			$nama_gambar=$row->nama_gambar;
			if(file_exists($file='./upload/'.$nama_gambar)){
				unlink($file);
			}
		}
		
    }
    public function save()
    {
        date_default_timezone_set('Asia/Jakarta');
        $tgl=date('Y-m-d');
        $post = $this->input->post();
        $this->id_pemesanan = $post["id_pemesanan"];
        $this->tanggal = $tgl;
        $this->kredit = $post["kredit"];

        $result = $this->db->insert($this->_table3, $this);
        return $result;
    }

    public function hps()
    {
        $nama_gambar =$this->input->post('nama_gambar');

		
		$foto=$this->db->get_where('detail_gambar',array('nama_gambar'=>$nama_gambar));


		if($foto->num_rows()>0){
			$hasil=$foto->row();
			$nama_gambar=$hasil->nama_gambar;
			if(file_exists($file='./upload/'.$nama_gambar)){
				unlink($file);
			}
			$this->db->delete('detail_gambar',array('nama_gambar'=>$nama_gambar));

		}
		echo "{}";
    }

}