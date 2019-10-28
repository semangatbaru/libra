<!DOCTYPE html >
<html lang="en">
<head>
<title>Laporan Pemesanan | Libra</title>
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
        

        <div class="col-xs-12 col-sm-offset-0">
          <!--MODAL DELETE-->
          <form>
            <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Product</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="id_pemesanan_delete" id="id_pemesanan_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
          </form>
        <!--END MODAL DELETE-->
        form>
            <div class="modal fade" id="tahu" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><strong>Belum Lunas<strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       
                       <div class="form-group row">
                          <label class="col-sm-2  control-label ">Total</label>
                          <div class="col-sm-3 ">
                            <input type="text" class="form-control"  name="ablttl" id="ablttl" readonly>
                            <input type="hidden" class="form-control"  name="z" id="z" readonly>
                            <input type="hidden" class="form-control"  name="y" id="y" readonly>

                          </div>
                          <label class="col-sm-2  control-label ">Bayar</label>
                          <div class="col-sm-3 ">
                            <input type="text" class="form-control"  name="ablb" id="ablb" readonly>
                          </div>
                          
                        </div>
                        <div class="form-group row">
                        <label class="col-sm-2 s  control-label ">Sisa</label>
                          <div class="col-sm-3 ">
                            <input type="text" class="form-control"  name="ablss" id="ablss" readonly>
                            <input type="text" class="form-control"  name="ablssk" id="ablssk" readonly>
                          </div> 
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6 ">
                            <input type="text" class="form-control"  name="br" id="br" placeholder="angsur..">
                          </div> 
                        </div>
                        <div class="form-group row">
                          <div class="col-sm-6 ">
                          </div> 
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" type="submit" style="padding:6px 210px 6px 210px" id="btn_abl" class="btn btn-primary">Yes</button>
                    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    
                  </div>
                </div>
              </div>
            </div>
          </form>
          <!-- Modal ambil -->
                    <form>
                      <div class="modal fade in" id="Modal_Ambil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail Pemesanan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>       
                                </div>
                                <div class="modal-body">
                                <div class="form-group row">
                                <label class="col-sm-2 col-sm-offset-1 control-label ">ID Pemesanan</label>
                                  <div class="col-sm-3 ">
                                   <input type="text" class="form-control"  name="a" id="a" readonly>
                                  </div> 
                                  <label  class="col-sm-2 control-label">Tanggal Ambil</label> 
                                  <div class="col-sm-3 ">
                                  <div class="input-group"> 
                                      <div class="input-group">
                                          <div class="input-group-addon">
                                          <i class="fa fa-calendar"></i>
                                          </div>
                                          <input type="text" name="b" id="b" class="form-control"  data-mask  readonly="readonly" >
                                      </div>
                                  </div>
                                  </div>
                                </div>

                                <div class="form-group row">
                                  <div class="col-sm-3 col-sm-offset-1">
                                    <input type="text" class="form-control"  name="d" id="d" readonly placeholder="Nama">
                                  </div>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control"  name="e" id="e" readonly placeholder="HP">
                                  </div>
                                  <div class="col-sm-3">
                                    <input type="text" class="form-control"  name="f" id="f" readonly placeholder="Alamat">
                                  </div>
                                </div>


                              <div>
                              <table style="padding: 0px 50px 0px 50px" id="example2" class="table  table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info" >
                                <thead>
                                  <tr>
                                    <th>No</th>  
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Sub Total</th>
                                  </thead>
                                  <tbody id="showdata">                           
                                  </tbody>
                              </table>
                              </div>

                              <div class="form-group row">
                                  <label class="col-sm-1 col-sm-offset-1 control-label ">Total</label>
                                <div class="col-sm-2"> 
                                  <input type="text" class="form-control"  name="c" placeholder="total" id="c" readonly>
                                </div>
                              </div>

                              <div class="form-group row">
                                  <label class="col-sm-1 col-sm-offset-1 control-label ">Bayar</label>
                                <div class="col-sm-2"> 
                                  <input type="text" class="form-control"  name="g" placeholder="total" id="g" readonly>
                                </div>
                              </div>

                              <div class="form-group row">
                                  <label class="col-sm-1 col-sm-offset-1 control-label ">Kembalian</label>
                                <div class="col-sm-2"> 
                                  <input type="text" class="form-control"  name="h" placeholder="total" id="h" readonly>
                                </div>
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
          <form>
                      <div class="modal fade in" id="Modal_Gambar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Detail Pemesanan</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>       
                            </div>

                                <div class="form-group row">
                                  <label class="col-sm-2 col-sm-offset-1 control-label ">ID Pemesanan</label>
                                  <div class="col-sm-3 ">
                                   <input type="text" class="form-control"  name="i" id="i" readonly>
                                  </div> 
                                </div>

                               <div class="form-group row">
                                  <div class="col-sm-10 col-sm-offset-1">
                                    <table id="example" class="table  table-striped" >
                                      
                                        
                                        <tbody id="gambar">

                                        </tbody>
                                    </table>
                                  </div>
                                </div>
                                 <div class="form-group row">
                                  <div class="col-sm-10 col-sm-offset-1 dropzone dz-message">
                                  </div>
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
              <br><br>
              <h3 class="box-title">Laporan Pemesanan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-header with-border">
                  
                  <div class="col-md-3">
                    <div class="form-group">
                    </div>

                  </div>
                </div>
            <div class="box-body">
              <table id="example1" class="table  table-striped" >
                <thead>
                <tr>
                  <th>ID Pemesanan</th>
                  <th>Nama Pemesan</th>
                  <th>Tanggal Pesan</th>
                  <th>DP Bayar</th>
                  <th>Sisa Bayar</th>
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

        </div>
        <!-- /.row -->

        <!-- table baru -->
        

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

    Dropzone.autoDiscover = false;

        var foto_upload= new Dropzone(".dropzone",{
        url: "<?php echo base_url('Pemesanan/proses_upload') ?>",
        maxFilesize: 2,
        method:"post",
        acceptedFiles:"image/*",
        paramName:"userfile",
        dictInvalidFileType:"Type file ini tidak dizinkan",
        addRemoveLinks:true,
        });


        //Event ketika Memulai mengupload
        foto_upload.on("sending",function(a,b,c){
            a.token=Math.random();
            b.id_pemesanan = $('#i').val();
            c.append("token_foto",a.token); //Menmpersiapkan token untuk masing masing foto
            c.append("id_pemesanan",b.id_pemesanan); 
        });


        //Event ketika foto dihapus
        foto_upload.on("removedfile",function(a){
            var token=a.token;
            $.ajax({
                type:"post",
                data:{token:token},
                url:"<?php echo base_url('Pemesanan/remove_foto') ?>",
                cache:false,
                dataType: 'json',
                success: function(){
                    console.log("Foto terhapus");
                },
                error: function(){
                    console.log("Error");

                }
            });
        });

    //crud
    $(document).ready(function(e){
    showRecord(); //munculkan data
    function showRecord(){
      $.ajax({
        type: 'ajax',
        url: '<?php echo site_url('Laporan_Pemesanan/getAll')?>',
        async: true,
        dataType: 'JSON',
        success: function(data){
          var html = '';
          var i; 
          for(i=0; i<data.length; i++){
            html += '<tr>'+
                      '<td>'+data[i].id_pemesanan+'</td>'+
                      '<td>'+data[i].nama+'</td>'+
                      '<td>'+data[i].tanggal+'</td>'+
                      '<td>'+data[i].bayar+'</td>'+
                      '<td>'+data[i].sisa+'</td>'+
                      '<td style="text-align:left;">'+
                        '<a href="javascript:void(0);" class="btn btn-info btn-sm item_belanja" data-id_pemesanan="'+data[i].id_pemesanan+'" data-ambil="'+data[i].ambil+'"   data-nama="'+data[i].nama+'"  data-hp="'+data[i].hp+'"  data-alamat="'+data[i].alamat+'" data-total="'+data[i].total+'" data-bayar="'+data[i].bayar+'" " data-sisa="'+data[i].sisa+'">Detail</a>'+
                        '<a href="javascript:void(0);" class="btn btn-info btn-sm item_gambar" data-id_pemesanan="'+data[i].id_pemesanan+'" >Gambar</a>'+
                        '<a href="javascript:void(0);" class="btn btn-success btn-sm item_ambil" data-id_pemesanan="'+data[i].id_pemesanan+'" data-ambil="'+data[i].ambil+'"  data-total="'+data[i].total+'" data-tanggal="'+data[i].tanggal+'" data-bayar="'+data[i].bayar+'" data-sisa="'+data[i].sisa+' ">Ambil</a>'+
                        '<a href="javascript:void(0);" class="btn btn-info btn-sm item_delete" data-id_pemesanan="'+data[i].id_pemesanan+'" >Hapus</a>'+
                      '</td>'+
                    '</tr>';
                }
          $('#showData').html(html);
          $('#example1').dataTable()
        }
      });
    }


    //ambil datanya dulu button detail
    $('#showData').on('click','.item_belanja', function(){
       // kosong();
       var id_pemesanan = $(this).data('id_pemesanan');
       var tanggal = $(this).data('tanggal');
       var total = $(this).data('total');
       var nama = $(this).data('nama');
       var hp = $(this).data('hp');
       var alamat = $(this).data('alamat');
       var bayar = $(this).data('bayar');
       var sisa = $(this).data('sisa');
       var ambil = $(this).data('ambil');

      $('#Modal_Ambil').modal('show');
       $('[name="a"]').val(id_pemesanan);
       $('[name="b"]').val(ambil);
       $('[name="c"]').val(total);
       $('[name="d"]').val(nama);
       $('[name="e"]').val(hp);
       $('[name="f"]').val(alamat);
       $('[name="g"]').val(bayar);
       $('[name="h"]').val(sisa);

      $.ajax({
        type: 'POST',
        url: '<?php echo site_url('Laporan_Pemesanan/getD')?>',
        data : {id_pemesanan, id_pemesanan},
        async: true,
        dataType: 'JSON',
        success: function(data){
          var html = '';
          var i; 
          for(i=0; i<data.length; i++){
            html += '<tr>'+
                      '<td>'+(i+1)+'</td>'+
                      '<td>'+data[i].nama_barang+'</td>'+
                      '<td>'+data[i].harga+'</td>'+
                      '<td>'+data[i].jumlah+'</td>'+
                      '<td>'+(data[i].harga*data[i].jumlah)+'</td>'+
                    '</tr>';
                }
          $('#showdata').html(html);
          $('#ini').dataTable({
            'searching'   : true,
            'ordering'    : false,
          })
        }
      });
    });

    //ambil data button ambil
    $('#showData').on('click','.item_ambil', function(){
       // kosong();


       var id_pemesanan = $(this).data('id_pemesanan');
       var tanggal = $(this).data('ambil');
       var kredit = $(this).data('total');
       var sisa = $(this).data('sisa');
       var bayar = $(this).data('bayar');

       if(sisa >= 0){
          $.ajax({
          type: 'POST',
          url: '<?php echo site_url('Laporan_Pemesanan/ambil')?>',
          data : {id_pemesanan : id_pemesanan, tanggal : tanggal, kredit : kredit},
          async: true,
          dataType: 'JSON',
          success: function(data){
            showRecord();
          }
        });
       }else{
        $('#tahu').modal('show');
        $('#btn_abl').hide();
        $('#ablssk').show();
        $('[name="ablttl"]').val(kredit);
        $('[name="ablss"]').val(sisa);
        $('[name="ablb"]').val(bayar);
        $('[name="z"]').val(id_pemesanan);
        $('[name="y"]').val(tanggal);
       }
    });
    $("#br").keyup(function(){
        hitung();
    })

    function hitung() {
        var ablss = document.getElementById('ablss').value;
        var br = document.getElementById('br').value;

        var result = parseInt(ablss) + parseInt(br);

        if (br == "") {
          $('#btn_abl').hide();
          $('#ablssk').hide();
          $('#ablss').show();
        } else {
          if(result >= 0){
            $('#btn_abl').show();
            
          }
          $('#ablssk').show();
          $('#ablss').hide();
          document.getElementById('ablssk').value = result;
          
            if (result == 0) {
                document.getElementById('ablssk').value = "";
                
            }
        }
    }

    $('#btn_abl').on('click', function(){
       var id_pemesanan = $('#z').val();
       var tanggal = $('#y').val();
       var kredit = $('#ablttl').val();

      $.ajax({
        type: 'POST',
        url: '<?php echo site_url('Laporan_Pemesanan/ambil')?>',
        data : {id_pemesanan : id_pemesanan, tanggal : tanggal, kredit : kredit},
        async: true,
        dataType: 'JSON',
        success: function(data){
          showRecord();
          $('#tahu').modal('hide');
        }
      });
    });

    //ambil data button gambar
    $('#showData').on('click','.item_gambar', function(){
       // kosong();
       var id_pemesanan = $(this).data('id_pemesanan');

      $('#Modal_Gambar').modal('show');
      $('[name="i"]').val(id_pemesanan);
      

      $.ajax({
        type: 'POST',
        url: '<?php echo site_url('Laporan_Pemesanan/getG')?>',
        data : {id_pemesanan, id_pemesanan},
        async: true,
        dataType: 'JSON',
        success: function(data){
          var html = '';
          var i; 
          for(i=0; i<data.length; i++){
            html += '<tr>'+
                      '<td><img src="upload/'+data[i].nama_gambar+'" width="100px" height="100px"></td>'+
                      
                    '</tr>';
                }
          $('#gambar').html(html);
        }
      });
    });

    //hapus
    //ambil datanya dulu
    $('#showData').on('click','.item_delete',function(){
      var id_pemesanan = $(this).data('id_pemesanan');
        
      $('#modalDelete').modal('show');
      $('[name="id_pemesanan_delete"]').val(id_pemesanan);
    });

    

    //delete record for db
    $('#btn_delete').on('click', function(){
      var id_pemesanan = $('#id_pemesanan_delete').val();
      $.ajax({
        type: "POST",
        url: "<?php echo site_url('Laporan_Pemesanan/hapus')?>",
        dataType: "JSON",
        data:{id_pemesanan :id_pemesanan},
        success : function(data){
          $('[name="id_pemesanan_delete"]').val("");
          $('#modalDelete').modal('hide');
          showRecord();
        },
        error: function (xhr, ajaxOptions, thrownError) {
        alert(xhr.status);
        alert(thrownError);
        }
      });
      return false;
    });

   
  }); //akhir


</script>
<!-- Script -->
    
</body>
</html>
<!--  -->