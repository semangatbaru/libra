<!DOCTYPE html >
<html lang="en">
<head>
<title>Home | Libra</title>
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
                        <div class="box box-info">
                            <!-- <form enctype="multipart/form-data" class="form-horizontal" method="post" id="formnya" > -->
                            <div class="box-header">

                                <div class="form-horizontal">
                                    <div class="box-body">
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
          <!-- / Modal ambil -->
                 
          <!-- form table -->
          <div class="box ">
            <div class="box-header">
              <div class="col-xs-10 col-sm-offset-1">
                 <div style="text-align: center;">
                    <span style=" font-size: 20px;">Deadline Pemesanan</span>
                    </div>
                    
                
            <div class="box-body">
              <table id="example1" class="table  table-striped" >
                <thead>
                <tr>
                  <th>No</th>
                  <th>No Order</th>
                  <th>Tanggal Ambil</th>
                  <th>Total</th>
                  <th>Detail</th>
                </thead>
                <tbody id="showData">

                </tbody>
              </table>
              </div>
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

    //crud
    showRecord(); //munculkan data
    
    //function showdata
    function showRecord(){
      $.ajax({
        type: 'ajax',
        url: '<?php echo site_url('Detail_belanja/getAll')?>',
        async: true,
        dataType: 'JSON',
        success: function(data){
          var html = '';
          var i; 
          for(i=0; i<data.length; i++){
            html += '<tr>'+
                      '<td>'+(i+1)+'</td>'+
                      '<td>'+data[i].id_barangmasuk+'</td>'+
                      '<td>'+data[i].tanggal+'</td>'+
                      '<td>'+data[i].total+'</td>'+
                      '<td>'+data[i].id_pemesanan+'</td>'+
                      '<td style="text-align:left;">'+
                        '<a href="javascript:void(0);" class="btn btn-info btn-sm item_detail"  data-id_pemesanan="'+data[i].id_pemesanan+'" data-total="'+data[i].total+'" data-ambil="'+data[i].ambil+'"data-nama_barang="'+data[i].nama_barang+'""data-jumlah="'+data[i].jumlah+'""data-harga="'+data[i].harga+'" >Detail</a>'+' '+
                      '</td>'+
                    '</tr>';
                }
          $('#showData').html(html);
          $('#example1').dataTable()
        }
      });
    }   
       
    
    //edit
    //ambil datanya dulu
    $('#showData').on('click','.item_detail', function(){
       // kosong();
       var id_pemesanan = $(this).data('id_pemesanan');
       var ambil = $(this).data('ambil');
       var total = $(this).data('total');
        var nama_barang = $(this).data('nama_barang');
      
      $('#Modal_Ambil').modal('show');
       $('[name="a"]').val(id_pemesanan);
       $('[name="b"]').val(total);
       $('[name="c"]').val(ambil);
      
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
   


</script>
<!-- Script -->
    
</body>
</html>
