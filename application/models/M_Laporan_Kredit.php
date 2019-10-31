<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_Laporan_Kredit extends CI_Model {
    // deklarasi variable
    private $_table = "kredit_all";
    private $_table1 = "kredit_harian";
    private $_table2 = "kredit_mingguan";
    private $_table3 = "kredit_bulanan";
    private $_table4 = "kredit_tahunan";
    private $_tablesum = "sumkredital";
    private $_tablesumharian = "sumkharian";
    private $_tablesummingguan = "sumkmingguan";
    private $_tablesumbulanan = "sumkbulanan";
    private $_tablesumtahunan = "sumktahunan";

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
    public function ambil_sum(){
        return $this->db->get($this->_tablesum)->result();
    }
    public function ambil_sumharian(){
        return $this->db->get($this->_tablesumharian)->result();
    }
    public function ambil_summingguan(){
        return $this->db->get($this->_tablesummingguan)->result();
    }
    public function ambil_sumbulanan(){
        return $this->db->get($this->_tablesumbulanan)->result();
    }
    
    public function ambil_sumtahunan(){
        return $this->db->get($this->_tablesumtahunan)->result();
    }
}