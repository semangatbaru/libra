<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_barangmasuk extends CI_Model {
     private $_table = "pelanggan";
     private $_tT = "pemesanan";
     private $_tDT = "barangmasuk";

    public function get_pemesanan()
    {
    $query = $this->db->get('pemesanan');
    return $query->result();
    }

    public function keranjang()
     {
             
          $namabarang = $this->input->post('namabarang');
          $jumlah = $this->input->post('jumlah');
          $hargabeli = $this->input->post('hargabeli');
          $detail = array(
               'namabarang'    => $namabarang,
               'jumlah'   => $jumlah,
               'hargabeli'      => $hargabeli
          );

        $this->cart->insert($detail);
          echo $this->show(); 
        }

     public function show()
     {
          $output = '';
          foreach ($this->cart->contents() as $items) {
               # code...
               $output .= '
                    <tr>
                         <td>' . $items['namabarang'] . '</td>
                         <td>' . $items['jumlah'] . '</td>
                         <td>' . number_format($items['hargabeli']) . '</td>
                         <td>
                              <div class="col-md-10">
                              <div class="form-group">
                                   <input type="text" id="subtotal" name="subtotal" value="' . $items['subtotal'] .  '" class="form-control" style="text-align:right;margin-bottom:5px;" readonly>
                              </div>
                         </div>
                         </td>
                              <td><button type="button" id="' . $items['namabarang'] . '" class="hapus_cart btn btn-danger btn-xs">Batal</button></td>
                    </tr>
          ';
          }
          return $output;
     }    
     
    public function load()
     {
          echo $this->show();
     }      
               
 function detail()
     {
          if ($cart = $this->cart->contents()) {
               $namabarang = $this->input->post('namabarang');
               foreach ($cart as $item) {
                    $data_detail = array(
                         
                         'namabarang' => $item['namabarang'],
                         'jumlah' => $item['jumlah'],
                         'hargabeli' => $item['hargabeli'],
                    );
                    $this->db->insert($this->_tDT, $data_detail);
               }
          }
     }
}

