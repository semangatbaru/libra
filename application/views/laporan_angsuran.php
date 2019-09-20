<!DOCTYPE html >
<html lang="en">
<head>
<title>Laporan Angsuran | JHP</title>
  <?php $this->load->view('_partials/head')?>
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
        <div class="col-xs-12 col-sm-offset-0"   >
          <!-- form detail belanja -->
           <!-- MODAL belanja -->
          <form>
            <div class="modal fade" id="Modal_DetailBelanja" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Laporan Angsuran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <input type="text" name="nofakturdetail" id="nofakturdetail" class="form-control">
                    <input type="text" name="tahu" id="tahu" class="form-control">
                    <table id="" class="table  table-striped" >
                      <thead>
                        <tr>
                          <th>Nama Barang</th>
                          <th>Jumlah</th>
                        </tr>
                        </thead>
                          <tbody id="tahu">
                        </tbody>
                    </table>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        <!--END MODAL belanja-->
        <!-- form angsur -->
           <!-- MODAL Angsur -->
           <form>
            <div class="modal fade" id="Modal_Angsur" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Angsur</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Nofaktur</label>
                            <div class="col-md-10">
                              <input type="text" name="nofaktur_angsur" id="nofaktur_angsur" class="form-control" placeholder="Nama Pelanggan" readonly>
                              <input type="text" name="a" id="a" class="form-control" readonly>
                              <input type="text" name="b" id="b" class="form-control"  readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Bayar</label>
                            <div class="col-md-10">
                              <input type="text" name="bayar" id="bayar" class="form-control" placeholder="Bayar">
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="click-simpan" class="btn btn-primary">Angsur</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        <!--END MODAL Angsur-->
          <!-- form table -->
          <div class="box ">
            <div class="box-header">
              <br><br>
              <h3 class="box-title">Laporan Angsuran</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-header with-border">
                  
                  <div class="col-md-3">
                    <div class="form-group">
                    </div>
                    <div class="form-group">
                      <div class="col-md-3 col-sm-offset-5">
                        <button class="btn btn-success" name="cetak_barang"><li class="fa fa-print"></li>Cetak</button>
                      </div>
                    </div>
                  </div>
                </div>
            <div class="box-body">
              <table id="example1" class="table  table-striped" >
                <thead>
                <tr>
                  <th>No Faktur</th>
                  <th>Nama Pelanggan</th>
                  <th>Utang</th>
                  <th>Total Bayar</th>
                  <th>Sisa</th>
                  <th>Pilihan</th>
                </tr>
                </thead>
                <tbody id="showData">
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
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
  <?php //$this->load->view('_partials/aside');?>
</div>
<!-- ./wrapper -->

<?php $this->load->view('_partials/script');?>
<script type="text/javascript">
  $(document).ready(function(e){
    

    showRecord(); //munculkan data
    
    
    //function showdata
    function showRecord(){
      $.ajax({
        type: 'ajax',
        url: '<?php echo site_url('Laporan_Angsuran/getAll')?>',
        async: true,
        dataType: 'JSON',
        success: function(data){
          var html = '';
          var i; 
          for(i=0; i<data.length; i++){
            html += '<tr>'+
                      '<td>'+data[i].nofaktur+'</td>'+
                      '<td>'+data[i].pelanggan+'</td>'+
                      '<td>'+data[i].total+'</td>'+
                      '<td>'+data[i].masuk+'</td>'+
                      '<td>'+data[i].sisa+'</td>'+
                      '<td style="text-align:left;">'+
                        '<a href="javascript:void(0);" class="btn btn-info btn-sm item_angsur" data-nofaktur="'+data[i].nofaktur+'" data-total="'+data[i].total+'" data-totalAngsuran="'+data[i].totalAngsuran+'" data-sisa="'+data[i].sisa+'">Angsur</a>'+
                        '<a href="javascript:void(0);" class="btn btn-info btn-sm item_belanja" data-nofaktur="'+data[i].nofaktur+'">Detail</a>'+
                        '<a href="javascript:void(0);" class="btn btn-info btn-sm item_riwayat" data-nofaktur="'+data[i].nofaktur+'">Riwayat</a>'+
                      '</td>'+
                    '</tr>';
                }
          $('#showData').html(html);
          $('#example1').dataTable({
            'searching'   : true,
            'ordering'    : false,
          })
        }
      });
    }

    //simpan
    $('#click-simpan').on('click',function(e){
      
      var nofaktur = $('#nofaktur_angsur').val();
      var bayar = $('#nama').val();
      var namabarang = $('#namabarang').val();
      var total = $('#total').val();
      var bayar = $('#bayar').val();
      $.ajax({
        type: "POST",
        url: '<?php echo site_url('Laporan_Angsuran/angsur') ?>',
        dataType: "JSON",
        data: {nofaktur:nofaktur, bayar:bayar},
        success: function(data){
          $('[name="nofaktur_angsur"]').val("");
          $('[name="bayar"]').val("");
          showRecord();
        }
      });
      
      $(".formtambah").fadeIn(1000);
      return false;
      
    });

    //ambil datanya dulu
    $('#showData').on('click','.item_angsur', function(){
      
      var nofaktur = $(this).data('nofaktur');
      var total = $(this).data('total');
      var totalAngsuran = $(this).data('sisa');
      
      $('#Modal_Angsur').modal('show');
      $('[name="nofaktur_angsur"]').val(nofaktur);
      $('[name="a"]').val(total);
      $('[name="b"]').val(totalAngsuran);
      
      
      
      
    });

    
  }); //akhir
</script>
<!-- Script -->
</body>
</html>
