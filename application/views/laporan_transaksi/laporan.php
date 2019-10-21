<!DOCTYPE html >
<html lang="en">
<head>
<title>Laporan Data Belanja | Libra</title>
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
                    <div class="col-xs-10 col-sm-offset-1">
                        <!-- Modal detail-->
                     <form>
            <div class="modal fade in" id="Modal_Ambil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Pemesanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>       
                      </div>

                      <div class="form-group">
                      <label class="col-sm-2 control-label ">No Order</label>
                        <div class="col-sm-3 ">
                         <input type="text" class="form-control"  name="a" id="a" readonly>
                        </div> 
                        
                        <label  class="col-sm-2 control-label">Tanggal</label> 
                        <div class="col-sm-3 ">
                        <div class="input-group"> 
                            <div class="input-group">
                                <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                                </div>
                                <input type="text" name="c" id="c" class="form-control"  data-mask  readonly="readonly" >
                            </div>
                        </div>
                        </div>
                      </div>

                      <div class="form-group">
                      <label class="col-sm-2 control-label">Total </label>
                      <div class="col-sm-3">
                        <input type="text" class="form-control"  name="b" id="b" readonly>
                      </div>
                    </div>

                    <div>
                    <table style="padding: 0px 50px 0px 50px" id="example2" class="table  table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" >
                      <thead>
                        <tr>
                          <th>No</th>  
                          <th>Nama Barang</th>
                          <th>Jumlah</th>
                          <th>Harga Beli</th>
                        </thead>
                        <tbody id="showdata">                           
                        </tbody>
                    </table>
                    </div>
                      <div class="modal-footer">
                      <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>

          </form>

          <!-- form table -->
                      <div class="box ">
                        <div class="box-header">
                          <div class="col-xs-10 col-sm-offset-1">
                             <div style="text-align: center;">
                                <span style=" font-size: 20px;">Data Belanja</span>
                                </div>
                                
                                <div class="form-group">
                                <label  class="col-sm-1 control-label">Tanggal</label> 
                                    <div class="col-sm-4 ">
                                        <div class="input-group">
                                            <div class="input-group-addon">
                                            <i class="fa fa-calendar"></i>
                                            </div>
                                            
                                            <input type="text" name="tanggal" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask  readonly="readonly" >
                                        </div>
                                    </div>
                                    </div>
                      
                                 <div class="form-group">
                                   <label class="col-sm-1 control-label">Total</label>
                                      <div class="col-sm-3">
                                      <input type="text" class="form-control"  name="qty" id="qty">
                                      </div>
                                    </div>
                                  </br>
                      <!-- form table -->
                                                  
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
              </div>
            <div class="box-body">
              <table id="example1" class="table  table-striped" >
                <thead>
                <tr>
                  <th>No</th>
                  <th>Kode Belanja</th>
                  <th>Total</th>
                  <th>Status</th>
                  <th>Opsi</th>
                </thead>
                <tbody id="showData">

                </tbody>
              </table>
              </div>
            
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
                        '<a href="javascript:void(0);" class="btn btn-info btn-sm item_detail" data-id_barangmasuk="'+data[i].id_barangmasuk+'"data-total="'+data[i].total+'"data-tanggal="'+data[i].tanggal+'" >Detail</a>'+' '+
                      '</td>'+
                    '</tr>';
                }
          $('#showData').html(html);
          $('#example1').dataTable()
        }
      });
    }
    

    //ambil datanya dulu
    $('#showData').on('click','.item_detail', function(){
       // kosong();
       var id_barangmasuk = $(this).data('id_barangmasuk');
       var tanggal = $(this).data('tanggal');
       var total = $(this).data('total');
       
      
      $('#Modal_Ambil').modal('show');
       $('[name="a"]').val(id_barangmasuk);
       $('[name="b"]').val(total);
       $('[name="c"]').val(tanggal);
       
      
      $.ajax({
        type: 'POST',
        url: '<?php echo site_url('Detail_belanja/getD')?>',
        data : {id_barangmasuk, id_barangmasuk},
        async: true,
        dataType: 'JSON',
        success: function(data){
          var html = '';
          var i; 
          for(i=0; i<data.length; i++){
            html += '<tr>'+
                      '<td>'+(i+1)+'</td>'+
                      '<td>'+data[i].nama_barang+'</td>'+
                      '<td>'+data[i].jumlah+'</td>'+
                      '<td>'+data[i].harga_beli+'</td>'+
                  
                    '</tr>';
                }
          $('#showdata').html(html);
          $('#example1').dataTable()
        }
      });
    });

    
    //ambil
    
    //simpan
   
</script>
<!-- Script -->
    
</body>
</html>
