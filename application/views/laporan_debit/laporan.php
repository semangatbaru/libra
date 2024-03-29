<!DOCTYPE html >
<html lang="en">
<head>
<title>Debit</title>
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
          <!-- form table -->
          <div class="box ">
            <div class="box-header">
              <br><br>
              <h3 class="box-title">Debit</h3>
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
                <a href="<?php echo site_url('laporan_debit/cetakHarian')?>" class="btn btn-success" name="harian" id="harian"><li class="fa fa-print"></li>Cetak</a>  
                <a href="<?php echo site_url('laporan_debit/cetakMingguan')?>" class="btn btn-success" name="mingguan" id="mingguan"><li class="fa fa-print"></li>Cetak</a>  
                <a href="<?php echo site_url('laporan_debit/cetakBulanan')?>" class="btn btn-success" name="bulanan" id="bulanan"><li class="fa fa-print"></li>Cetak</a>
                <a href="<?php echo site_url('laporan_debit/cetakTahunan')?>" class="btn btn-success" name="tahunan" id="tahunan"><li class="fa fa-print"></li>Cetak</a>
                <a href="<?php echo site_url('laporan_debit/cetakAll')?>" class="btn btn-success" name="semua" id="semua"><li class="fa fa-print"></li>Cetak</a>
              </div>
            </div>
            <div class="box-body">
              <table id="example1" class="table  table-striped" >
                <thead>
                <tr>
                  <th>Kode Pemesanan</th>
                  <th>debit</th>
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
    $('#cetakDebit').on('click',function(e){
      $.ajax({
        type: 'ajax',
        url: '<?php echo site_url('Laporan_Debit/hariQ')?>',
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
        url: '<?php echo site_url('Laporan_Debit/getAll')?>',
        async: true,
        dataType: 'JSON',
        success: function(data){
          var html = '';
          var i; 
          for(i=0; i<data.length; i++){
            html += '<tr>'+
                      '<td>'+data[i].id_barangmasuk+'</td>'+
                      '<td>'+data[i].debit+'</td>'+
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
        url: '<?php echo site_url('Laporan_Debit/getharian')?>',
        async: true,
        dataType: 'JSON',
        success: function(data){
          var html = '';
          var i; 
          for(i=0; i<data.length; i++){
            html += '<tr>'+
                    '<td>'+data[i].id_barangmasuk+'</td>'+
                    '<td>'+data[i].debit+'</td>'+
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
        url: '<?php echo site_url('Laporan_Debit/getmingguan')?>',
        async: true,
        dataType: 'JSON',
        success: function(data){
          var html = '';
          var i; 
          for(i=0; i<data.length; i++){
            html += '<tr>'+
                        '<td>'+data[i].id_barangmasuk+'</td>'+
                        '<td>'+data[i].debit+'</td>'+
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
        url: '<?php echo site_url('Laporan_Debit/getbulanan')?>',
        async: true,
        dataType: 'JSON',
        success: function(data){
          var html = '';
          var i; 
          for(i=0; i<data.length; i++){
            html += '<tr>'+
                    '<td>'+data[i].id_barangmasuk+'</td>'+
                    '<td>'+data[i].debit+'</td>'+
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
        url: '<?php echo site_url('Laporan_Debit/gettahunan')?>',
        async: true,
        dataType: 'JSON',
        success: function(data){
          var html = '';
          var i; 
          for(i=0; i<data.length; i++){
            html += '<tr>'+
                    '<td>'+data[i].id_barangmasuk+'</td>'+
                    '<td>'+data[i].debit+'</td>'+
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
