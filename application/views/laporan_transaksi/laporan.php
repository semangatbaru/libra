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
        <div class="col-xs-10 col-sm-offset-1"   >


          <!-- form detail -->
           <!-- Modal ambil -->
          <form>
            <div class="modal fade" id="Modal_Ambil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <
                    <h5 class="modal-title" id="exampleModalLabel">Kode Belanja</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                     <label  class="col-sm-1 control-label">Tanggal</label> 
                        <div class="col-sm-3 ">
                        <div class="input-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                
                                <input type="text" name="tanggal" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask  readonly="readonly" >
                            </div>
                        </div>
                        </div>

                  </div>
                  <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">No Order</label>
                        <div class="col-md-5">
                          <input type="text" name="kode_pemesanan" id="kode_pemesanan" class="form-control"  >
                          <input type="text" name="kode_pemesanan2" id="kode_pemesanan2" class="form-control"  readonly>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2 col-form-label">Total Belanja</label>
                        <div class="col-md-5">
                          <input type="text" name="nofaktur" id="nofaktur" class="form-control"  readonly>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <div class="col-md-3 col-sm-offset-5"> 
                        <label  class="control-label">Kredit</label><input type="checkbox" class="minimal"  id="kondisi" name="kondisi" >  
                        </div>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  
                  </div>
                </div>
              </div>
            </div>
          </form>
          <!-- / Modal ambil -->

          <!-- form table -->
          <div class="box ">
            <div class="box-header">
                <div style="text-align: center;">
                    <span style=" font-size: 20px;">Data Belanja</span>
                    </div>
                    <br>
                    <label  class="col-sm-1 control-label">Tanggal</label> 
                        <div class="col-sm-3 ">
                        <div class="input-group">
                            <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                
                                <input type="text" name="tanggal" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask  readonly="readonly" >
                            </div>
                        </div>
                        </div>
                      </br>

                    <br>
                     <div class="form-group">
                       <label class="col-sm-1 control-label">Total</label>
                          <div class="col-sm-3">
                          <input type="text" class="form-control"  name="qty" id="qty">
                          </div>
                        </div>
                      </br>
                                                  
            <!-- /.box-header -->
            <div class="form-group">
              <div class="box-header with-border">
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
                      '<td>'+data[i].no+'</td>'+
                      '<td>'+data[i].kode belanja+'</td>'+
                      '<td>'+data[i].total belanja+'</td>'+
                      '<td>'+data[i].status+'</td>'+
                      '<td>'+data[i].opsi+'</td>'+
                    '<td style="text-align:left;">'+
                        '<a href="javascript:void(0);" class="btn btn-info btn-sm item_belanja" data-nofaktur="'+data[i].kode_pemesanan+'" >Detail</a>'+' '+
                      '</td>'+
                    '</tr>';
                }
          $('#showData').html(html);
          $('#ini').dataTable({
            'searching'   : true,
            'ordering'    : false,
          })
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
                      '<td>'+data[i].no+'</td>'+
                      '<td>'+data[i].kode belanja+'</td>'+
                      '<td>'+data[i].total belanja+'</td>'+
                      '<td>'+data[i].status+'</td>'+
                      '<td>'+data[i].opsi+'</td>'+
                      '<td style="text-align:left;">'+
                        '<a href="javascript:void(0);" class="btn btn-info btn-sm item_belanja" data-nofaktur="'+data[i].kode_pemesanan+'" >Detail</a>'+' '+
                      '</td>'+
                    '</tr>';
                }
          $('#showData').html(html);
          $('#ini').dataTable({
            'searching'   : true,
            'ordering'    : false,
          })
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
                      '<td>'+data[i].no+'</td>'+
                      '<td>'+data[i].kode belanja+'</td>'+
                      '<td>'+data[i].total belanja+'</td>'+
                      '<td>'+data[i].status+'</td>'+
                      '<td>'+data[i].opsi+'</td>'+
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
                      '<td>'+data[i].no+'</td>'+
                      '<td>'+data[i].kode belanja+'</td>'+
                      '<td>'+data[i].total belanja+'</td>'+
                      '<td>'+data[i].status+'</td>'+
                      '<td>'+data[i].opsi+'</td>'+
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
                      '<td>'+data[i].no+'</td>'+
                      '<td>'+data[i].kode belanja+'</td>'+
                      '<td>'+data[i].total belanja+'</td>'+
                      '<td>'+data[i].status+'</td>'+
                      '<td>'+data[i].opsi+'</td>'+
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
