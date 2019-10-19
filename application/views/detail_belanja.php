<!DOCTYPE html >
<html lang="en">
<head>
<title>Detail Belanja | Libra</title>
  <?php $this->load->view('_partials/head')?>
   <style type="text/css">

    body{
        background-color: #E8E9EC;
    }

    .dropzone {
        border: 2px dashed #0087F7;
    }
    .margin {
        margin-top: 50px;
    }

    </style> 
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

   <header class="main-header">
    <?php $this->load->view('_partials/header'); ?>
    
  </header> 
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
   <?php $this->load->view('_partials/sidebar'); ?>
    <!-- /.sidebar -->
  </aside>
  

   <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
            <!-- Main content -->
            <section class="content">
              <div class="row">
                <div class="col-xs-10 col-sm-offset-1">
                  <div class="box box-info">
                    <!-- <form enctype="multipart/form-data" class="form-horizontal" method="post" id="formnya" > -->
                    <div class="form-horizontal">
                      <div class="box-body">

                        <!-- form table -->
                        <div class="box ">
                          <div class="box-header">
                            <div class="col-xs-10 col-sm-offset-1">
                              <div style="text-align: center;">
                                <span style=" font-size: 20px;">Detail Belanja</span>
                              </div>
                              
                              <div class="form-group">
                                <label class="col-sm-2 control-label ">Kode Belanja</label>
                                <div class="col-sm-3 ">
                                  <input value="" class="form-control"></input>
                                </div>

                                <label class="col-sm-2 control-label">Tanggal</label>
                                <div class="col-sm-3 ">
                                  <div class="input-group">
                                    <div class="input-group-addon">
                                      <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" name="tanggal" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask  readonly="readonly" >
                                  </div>
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="col-sm-2 control-label">No Order</label>
                                <div class="col-sm-3">
                                  <input type="text" class="form-control"  name="name" id="name">
                                </div>
                              </div>

                              <div class="form-group">
                                <label class="col-sm-2 control-label">Total Belanja</label>
                                <div class="col-sm-3">
                                  <input type="text" class="form-control"  name="name" id="name">
                                </div>
                              </div>

                              <table id="example2" class="table  table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" >
                                <thead>
                                  <tr>
                                    <th>Nama Barang</th>
                                    <th>Jumlah</th>
                                    <th>Harga Beli</th>
                                    <th>Sub Total</th>
                                </thead>
                              </table>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                              </div>
                            
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                  <!-- form table -->
                  </div>
                <!-- /.box -->
                </div>
              <!-- /.col -->
              </div>
              <!-- /.row -->
            </section>
            <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <!-- Control Sidebar -->
</div>
<!-- ./wrapper -->

<?php $this->load->view('_partials/script');?>
<script type="text/javascript">

    //crud
    showRecord(); //munculkan data
    
    //function showdata
    function showRecord(){
      $.ajax({
        type: 'ajax',
        url: '<?php echo site_url('Laporan_Transaksi/getAll')?>',
        async: true,
        dataType: 'JSON',
        success: function(data){
          var html = '';
          var i; 
          for(i=0; i<data.length; i++){
            html += '<tr>'+
                      '<td>'+(i+1)+'</td>'+
                      '<td>'+data[i].id_barangmasuk+'</td>'+
                      '<td>'+data[i].total+'</td>'+
                      '<td>tersedia</td>'+
                      '<td style="text-align:left;">'+
                        '<a href="javascript:void(0);" class="btn btn-info btn-sm item_belanja" data-id_pemesanan="'+data[i].id_pemesanan+'" >Detail</a>'+' '+
                      '</td>'+
                    '</tr>';
                }
          $('#showData').html(html);
          $('#example1').dataTable()
        }
      });
    }
    //function setCode
    function setCode() {
        var id_pemesanan = $('#id_pemesanan').val();
        $.ajax({
            type: "POST",
            url: "<?php echo site_url('Transaksi/setCode') ?>",
            dataType: "JSON",
            data: {
                id_pemesanan: id_pemesanan
            },
            success: function(data) {
                $('[name="id_pemesanan"]').val(data);
                

                
            }
        });
        return false;
    }

    //hitung

    $("#bayarL").keyup(function(){
      var sisa = document.getElementById('sisaA').value;
      var bayar = document.getElementById('bayarA').value;
      
      var thisVal = $(this).val()
      var resul = parseInt(bayar) + parseInt(thisVal);
      var result = parseInt(sisa) + parseInt(thisVal);
      

      if(thisVal != ""){
            $("#bayar").val(resul);
            $("#sisa").val(result);
        }else{
            $("#bayar").val(bayar);
            $("#sisa").val(sisa);
        }
    })
    //hitung
    function hitung() {
        var bayar = document.getElementById('bayar').value;
        var bayarL = document.getElementById('bayarL').value;

        
        if (bayarL=="") {
        document.getElementById('sisa').value = "";
        }else{
        document.getElementById('sisa').value = result;
        if (result == 0) {
            document.getElementById('sisa').value = "";
        }  
        }
    }

    //ambil datanya dulu
    $('#showData').on('click','.item_ambil', function(){
      var id_pemesanan = $(this).data('id_pemesanan');
      var nama = $(this).data('nama');
      var tanggal = $(this).data('nama');
      var bayar = $(this).data('bayar');
      var sisa = $(this).data('sisa');

      
      $('#Modal_Ambil').modal('show');
      $('[name="nama"]').val(pemesan);
      $('[name="total"]').val(total);
      $('[name="bayar"]').val(bayar);
      $('[name="bayarA"]').val(bayar);
      $('[name="id_pemesanan"]').val(id_pemesanan);
      $('[name="id_pemesanan2"]').val(id_pemesanan);
      $('[name="bayarL"]').val("");
      setCode();
      $("#kondisi").prop("checked", false);
      var result = parseInt(bayar) - parseInt(total);
      $('[name="sisaA"]').val(result);
      $('[name="sisa"]').val(result);
      

    });

    //rapcale
    //function replace at
    String.prototype.replaceAt=function(index, replacement) {
    return this.substr(0, index) + replacement+ this.substr(index + replacement.length);
    }

    //kondisi
    $('#kondisi').click(function () {
        if ($(this).is(":checked")) {
            var id_pemesanan = $('#id_pemesanan').val();
            var res = "B";
            var b= "N";
            var posisi =27;
            var result = [id_pemesanan.slice(0,posisi), b, id_pemesanan.slice(posisi)].join('');
            var txt = result.replaceAt(26,res);
            $('#id_pemesanan').val(txt);
            $('#kategori').val("kredit");
        } else {
            setCode();
        }
    });
    //ambil
    
    //simpan
    $('#btn_ambil').on('click',function(e){
      var sisa = $('#sisa').val();
      var kategori = $('#kategori').val();
      var bayar = $('#nama').val();
      var namabarang = $('#namabarang').val();
      var total = $('#total').val();
      var bayar = $('#bayar').val();
      var nofaktu = $('#id_pemesanan').val();
      var res = alamat.substring(0, 4);
      var id_pemesanan = nofaktu_replaceAt(12,res);
      var id_pemesanan2 = $('#idpemesanan2').val();
      // $('#nofaktur').val(txt);

      if(kategori == "kredit"){
        $.ajax({
          type : "POST",
          url  : "<?php echo site_url('Laporan_Pemesanan/edit')?>",
          dataType : "JSON",
          data : {id_pemesanan:id_pemesanan , bayar:bayar, id_pemesanan2:id_pemesanan2},
          success: function(data){
              $('#Modal_Ambil').modal('hide');
              
              showRecord();
          }
        });
      }else{
        if(parseInt(sisa) >= 0){
          $.ajax({
          type : "POST",
          url  : "<?php echo site_url('Laporan_Pemesanan/edit')?>",
          dataType : "JSON",
          data : {id_pemesanan:id_pemesanan , bayar:bayar, id_pemesanan2:id_pemesanan2},
          success: function(data){
              $('#Modal_Ambil').modal('hide');
              showRecord();
          }
          });
        }else{
          alert("cek bayar jika bukan credit");
        }
      }
    });

    //edit
    //ambil datanya dulu
    $('#showData').on('click','.item_belanja', function(){
      // kosong();
      // var id_pelanggan = $(this).data('id_pelanggan');
      // var nama = $(this).data('nama');
      // var nohp = $(this).data('nohp');
      // var alamat = $(this).data('alamat');
      // var email = $(this).data('email');
      // var password = $(this).data('password');
      
      $('#Modal_Ambil').modal('show');
      // $('[name="id_pelanggan_edit"]').val(id_pelanggan);
      // $('[name="nama_edit"]').val(nama);
      // $('[name="nohp_edit"]').val(nohp);
      // $('[name="alamat_edit"]').val(alamat);
      // $('[name="email_edit"]').val(email);
      // $('[name="password_edit"]').val(password);
    });


     //update record to database
    $('#btn_update').on('click',function(){
      var id_pelanggan = $('#id_pelanggan_edit').val();
      var nama = $('#nama_edit').val();
      var nohp = $('#nohp_edit').val();
      var alamat = $('#alamat_edit').val();
      var email = $('#email_edit').val();
      var password = $('#password_edit').val();
      $.ajax({
          type : "POST",
          url  : "<?php echo site_url('Pelanggan/edit')?>",
          dataType : "JSON",
          data : {id_pelanggan:id_pelanggan, nama:nama, nohp:nohp, alamat:alamat, email:email, password:password},
          success: function(data){
              $('[name="id_pelanggan_edit"]').val("");
              $('[name="nama_edit"]').val("");
              $('[name="nohp_edit"]').val("");
              $('[name="alamat_edit"]').val("");
              $('[name="email_edit"]').val("");
              $('[name="password_edit"]').val("");
              $('#Modal_Edit').modal('hide');
              showRecord();
          }
      });
      return false;
    });
</script>
<!-- Script -->
    
</body>
</html>
