<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_User extends CI_Model
{
    // deklarasi variable
    private $_table = "tb_user";
    public $id_user;
    public $username;
    public $password;
    public $level;

    //menampilkan data
    public function rule()
    {
        return [
            [
                `field` => `username`,
                `rules` => `required`
            ],
            [
                `field` => `password`,
                `rules` => `required`
            ],
        ];
    }
    //kode
    public function kode()
     {
          $this->db->select('RIGHT(tb_user.id_user, 1) as id_user', FALSE);
          $this->db->order_by('id_user', 'DESC');
          $this->db->limit(1);
          $query = $this->db->get('tb_user');  //cek dulu apakah ada sudah ada kode di tabel.    
          if ($query->num_rows() <> 0) {
               //cek kode jika telah tersedia    
               $data = $query->row();
               $kode = intval($data->id_user) + 1;
          } else {
               $kode = 1;  //cek jika kode belum terdapat pada table
          }
          $id_user = $this->session->userdata("id_user");
          $tgl = date('dmY');
          $D = date('d');
          $batas = str_pad($kode,  STR_PAD_LEFT);
          $kodetampil = "P".$batas; //format kode
          return $kodetampil;
     }

    //menampilkan data
    public function ambil_data()
    {
        return $this->db->get($this->_table)->result();
    }

    //create
    public function save()
    {
        $post = $this->input->post();
        $encrypt = $post["password"];
        $this->id_user = $post["id_user"];
        $this->username = $post["username"];
        $this->password = password_hash($encrypt, PASSWORD_BCRYPT);
        $this->level = $post["level"];

        $result = $this->db->insert($this->_table, $this);
        return $result;
    }
    //Update data
    public function update()
    {
        $post = $this->input->post();
        $encrypt = $post["password"];
        $this->kode_pemesanan = $post["kode_pemesanan"];
        $this->bayar = $post["bayar"];

        $this->db->update($this->_table, $this, array('kode_pemesanan' => $post['kode_pemesanan2']));
    }
    //Delete
    public function delete()
    {
        // return $this->db->delete($this->_table, array("id_user"=> $id_user));
        $id_user = $this->input->post('id_user');
        $this->db->where('id_user', $id_user);
        $result = $this->db->delete('login');
        return $result;
    }
}
