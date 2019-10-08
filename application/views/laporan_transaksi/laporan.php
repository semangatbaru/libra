<!DOCTYPE html >
<html lang="en">
<head>
<title>Laporan Transaksi | JHP</title>
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

          <!-- form detail -->
           <!-- MODAL DETAIL -->
          <form>
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Belanja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Kode Belanja</label>
                            <div class="col-md-10">
                              <input type="text" name="id_pelanggan_edit" id="id_pelanggan_edit" class="form-control" placeholder="Id Pelanggan" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">No Order</label>
                            <div class="col-md-10">
                              <input type="text" name="nama_edit" id="nama_edit" class="form-control" placeholder="Nama">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Total Belanja</label>
                            <div class="col-md-10">
                              <input type="text" name="nohp_edit" id="nohp_edit" class="form-control" placeholder="No Hp">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Tanggal</label>
                            <div class="col-md-10">
                              <input type="text" name="alamat_edit" id="alamat_edit" class="form-control" placeholder="Alamat">
                            </div>
                        </div>
                      <div class="box-body">
                        <table id="example1" class="table  table-striped" >
                        <thead>
                        <tr>
                        <th>Nama Barang</th>
                        <th>Jumlah</th>
                        <th>Harga Beli</th>
                        <th>Sub Total</th>
                        </tr>
                        </thead>
                          <tbody id="showData">

                          </tbody>
                        </table>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        <!--END MODAL DETAIL-->

          <!-- form table -->
          <div class="box ">
            <div class="box-header">
              <br><br>
             <!-- <h3 class="box-title">Data Belanja</h3>-->
            </div>
            <!-- /.box-header -->
            <div class="box-header with-border">
              <div class="form-group">
                <div class="col-md-3">
                    <select class="form-control select2 " style="width: 100%;" name="filter" id="filter">
                        <option value="hariini"  >Hari Ini</option>
                        <option value="mingguini"  >Minggu Ini</option>
                        <option value="bulanini"  >Bulan Ini</option>
                        <option value="tahunini"> Tahun ini</option>
                        <option value="semua"  >Semua</option>
                        
                    </select>
                </div>
                <a href="<?php echo site_url('laporan_transaksi/cetakHarian')?>" class="btn btn-success" name="harian" id="harian"><li class="fa fa-print"></li>Cetak</a>  
                <a href="<?php echo site_url('laporan_transaksi/cetakMingguan')?>" class="btn btn-success" name="mingguan" id="mingguan"><li class="fa fa-print"></li>Cetak</a>  
                <a href="<?php echo site_url('laporan_transaksi/cetakBulanan')?>" class="btn btn-success" name="bulanan" id="bulanan"><li class="fa fa-print"></li>Cetak</a>
                <a href="<?php echo site_url('laporan_transaksi/cetakTahunan')?>" class="btn btn-success" name="tahunan" id="tahunan"><li class="fa fa-print"></li>Cetak</a>
                <a href="<?php echo site_url('laporan_transaksi/cetakAll')?>" class="btn btn-success" name="semua" id="semua"><li class="fa fa-print"></li>Cetak</a>
              </div>
            </div>
            <div class="box-body">
               <table id="example1" class="table  table-striped" >
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Belanja</th>
                  <th>Total Belanja</th>
                  <th>Status</th>
                  <th>Opsi</th>
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
          $("#mingguan").hide();
          $("#bulanan").hide();
          $("#tahunan").hide();
          $("#semua").hide();
    //crud
   
    //function showdata
    showRecordharian()
    //
    $('#cetakTransaksi').on('click',function(e){
      $.ajax({
        type: 'ajax',
        url: '<?php echo site_url('Laporan_Transaksi/hariQ')?>',
        async: true,
        dataType: 'JSON',
      });
    });
    //getStokBarang
    $("#filter").change(function(){
        var filter = $(this).val();
        if(filter=="hariini"){
          showRecordharian();
          $("#harian").show();
          $("#mingguan").hide();
          $("#bulanan").hide();
          $("#tahunan").hide();
          $("#semua").hide();
        }else if(filter=="mingguini"){
          showRecordmingguan();
          $("#harian").hide();
          $("#mingguan").show();
          $("#bulanan").hide();
          $("#tahunan").hide();
          $("#semua").hide();
        }else if(filter=="bulanini"){
          showRecordbulanan();
          $("#harian").hide();
          $("#mingguan").hide();
          $("#bulanan").show();
          $("#tahunan").hide();
          $("#semua").hide();
        }else if(filter=="tahunini"){
          showRecordtahunan();
          $("#harian").hide();
          $("#mingguan").hide();
          $("#bulanan").hide();
          $("#tahunan").show();
          $("#semua").hide();
        }else if(filter=="semua"){
          showRecord();
          $("#harian").hide();
          $("#mingguan").hide();
          $("#bulanan").hide();
          $("#tahunan").hide();
          $("#semua").show();
        }
    })
    //semua
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
                      '<td>'+data[i].tangal+'</td>'+
                      '<td>'+data[i].nofaktur+'</td>'+
                      '<td>'+data[i].penjual+'</td>'+
                      '<td>'+data[i].pelanggan+'</td>'+
                      '<td>'+data[i].total+'</td>'+
                      '<td>'+data[i].kategori+'</td>'+
                    '</tr>';
                }
          $('#showData').html(html);
          $('#example1').dataTable()
        }
      });
    }
    //harian
    function showRecordharian(){
      $.ajax({
        type: 'ajax',
        url: '<?php echo site_url('Laporan_Transaksi/getharian')?>',
        async: true,
        dataType: 'JSON',
        success: function(data){
          var html = '';
          var i; 
          for(i=0; i<data.length; i++){
            html += '<tr>'+
                      '<td>'+data[i].tangal+'</td>'+
                      '<td>'+data[i].nofaktur+'</td>'+
                      '<td>'+data[i].penjual+'</td>'+
                      '<td>'+data[i].pelanggan+'</td>'+
                      '<td>'+data[i].total+'</td>'+
                      '<td>'+data[i].kategori+'</td>'+
                    '</tr>';
                }
          $('#showData').html(html);
          $('#example1').dataTable()
        }
      });
    }
    //mingguan
    function showRecordmingguan(){
      $.ajax({
        type: 'ajax',
        url: '<?php echo site_url('Laporan_Transaksi/getmingguan')?>',
        async: true,
        dataType: 'JSON',
        success: function(data){
          var html = '';
          var i; 
          for(i=0; i<data.length; i++){
            html += '<tr>'+
                      '<td>'+data[i].tangal+'</td>'+
                      '<td>'+data[i].nofaktur+'</td>'+
                      '<td>'+data[i].penjual+'</td>'+
                      '<td>'+data[i].pelanggan+'</td>'+
                      '<td>'+data[i].total+'</td>'+
                      '<td>'+data[i].kategori+'</td>'+
                    '</tr>';
                }
          $('#showData').html(html);
          $('#example1').dataTable()
        }
      });
    }
    //bulanan
    function showRecordbulanan(){
      $.ajax({
        type: 'ajax',
        url: '<?php echo site_url('Laporan_Transaksi/getbulanan')?>',
        async: true,
        dataType: 'JSON',
        success: function(data){
          var html = '';
          var i; 
          for(i=0; i<data.length; i++){
            html += '<tr>'+
                      '<td>'+data[i].tangal+'</td>'+
                      '<td>'+data[i].nofaktur+'</td>'+
                      '<td>'+data[i].penjual+'</td>'+
                      '<td>'+data[i].pelanggan+'</td>'+
                      '<td>'+data[i].total+'</td>'+
                      '<td>'+data[i].kategori+'</td>'+
                    '</tr>';
                }
          $('#showData').html(html);
          $('#example1').dataTable()
        }
      });
    }
    //tahunan
    function showRecordtahunan(){
      $.ajax({
        type: 'ajax',
        url: '<?php echo site_url('Laporan_Transaksi/gettahunan')?>',
        async: true,
        dataType: 'JSON',
        success: function(data){
          var html = '';
          var i; 
          for(i=0; i<data.length; i++){
            html += '<tr>'+
                      '<td>'+data[i].tangal+'</td>'+
                      '<td>'+data[i].nofaktur+'</td>'+
                      '<td>'+data[i].penjual+'</td>'+
                      '<td>'+data[i].pelanggan+'</td>'+
                      '<td>'+data[i].total+'</td>'+
                      '<td>'+data[i].kategori+'</td>'+
                    '</tr>';
                }
          $('#showData').html(html);
          $('#example1').dataTable()
        }
      });
    }
    //function kosongan
    function kosong(){
      document.getElementById('nama').value="";
      document.getElementById('password').value="";
    }; //akhir
</script>
<!-- Script -->

</body>
</html>
