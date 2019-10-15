<!DOCTYPE html>
<html lang="en">

<head>
    <title>Barang Masuk | Libra</title>
    <?php $this->load->view('_partials/head') ?>
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
                            <div class="box-header">

                                <div class="form-horizontal">
                                    <div class="box-body">
                                        <div style="text-align: center;">
                                         <span style=" font-size: 20px;">Data Barang Masuk</span>
                                        </div>
                  

                                        <div class="form-group">
                                             <label class="col-sm-2 control-label ">No Order</label>
                                                <div class="col-sm-3 ">
                                                    <select class="form-control select2 " style="width: 100%;" name="namapemesan" id="namapemesan">
                                                    <?php foreach($barangmasuk as $p){ ?>
                                                                    
                                                      <option class="form-control"  name="id_pemesanan" placeholder="Nama Pemesan" id="id_pemesanan"  value="<?php echo $p->id_pemesanan; ?>"> <?php echo $p->id_pemesanan;?>    </option>
                                                        <br>
                                                        <?php } ?>
                                                    
                                                    </select>
                                            
                                                 </div> 
                                                  <label  class="col-sm-2 control-label">Tanggal</label> 
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

                                            </div>

                                            
                                        

                                        
                                        <div class="form-group">
                                            <!-- kontrol baris kedua -->
                                            <label class="col-sm-2 control-label">Data Barang</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control"  name="name" placeholder="Nama Barang" id="name">
                                                <input type="hidden" class="form-control" readonly name="id" placeholder="nomor" id="id" value="">

                                                <input type="text" class="form-control" readonly name="id_barangmasuk" placeholder="nomor" id="id_barangmasuk" value="">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control"  name="qty" placeholder="Jumlah" id="qty">
                                            </div>
                                            <div class="col-sm-3">
                                                <input  type="text" class="form-control"  name="price" placeholder="Harga" id="price">
                                            </div>
                                            <div class="col-xs-2">
                                                <button class="add_keranjang btn btn-flat  btn-success" name="keranjang" id="keranjang">Tambah</button>
                                            </div>
                                            

                                           
                                        </div>
                                        
                                        <div class="col-sm-12 ">
                                            <table class="table table-striped table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>No</th>
                                                        <th>Nama Barang</th>
                                                        <th>Jumlah</th>
                                                        <th>Harga</th>
                                                        <th>Subtotal</th>
                                                        <th>Pilihan</th>
                                                    </tr>

                                                </thead>
                                                <tbody id="detailCart">
                                                </tbody>
                                                 <div class="col-sm-3">
                                              
                                            </div>  
                                            </table>
                                        </div>
                                         <div class="col-md-9 col-sm-offset-5 ">
                                              <button class=" btn btn-instagram" name="barangmasuk" id="barangmasuk" >Simpan</button>
                                        </div>
                                      
                                    
                                        

                                        
                                    </div>
                                </div>
                            </div>
                            <!-- </form> -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <!-- table baru -->
                    <!-- /.row -->

                </div>
                
            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->
        <!-- Control Sidebar -->
        <?php
        ?>
    </div>
    <!-- ./wrapper -->

    <?php $this->load->view('_partials/script'); ?>
    <script type="text/javascript">     
        $(document).ready(function(e) {
            //simpan
            $('#click-simpan').on('click',function(e){
              
              var id_pelanggan = $('#id_pelanggan').val();
              var nama = $('#nama').val();
              var hp = $('#hp').val();
              var alamat = $('#alamat').val();
              $.ajax({
                type: "POST",
                url: '<?php echo site_url('Pelanggan/add') ?>',
                dataType: "JSON",
                data: {id_pelanggan:id_pelanggan, nama:nama, hp:hp, alamat:alamat,},
                success: function(data){
                  $('[name="id_pelanggan"]').val("");
                  $('[name="nama"]').val("");
                  $('[name="hp"]').val("");
                  $('[name="alamat"]').val("");
                  
                }
              });
              
              $('#Modal_Ambil').modal('hide');
              return false;
              
            });
       

            

              
               date();
  function date() {
        var today = new Date();
        var dd = today.getDate();

        var mm = today.getMonth()+1; 
        var yyyy = today.getFullYear();
        if(dd<10) {
            dd='0'+dd;
        } 
        if(mm<10) {
            mm='0'+mm;
        } 
        today = dd+'/'+mm+'/'+yyyy;
        $('[name="tanggal"]').val(today); 
    }



            // date();
            // setTotal();
            setKremen()
            

            setCode()
            function setCode() {
                var id_barangmasuk = $('#id_barangmasuk').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('Barangmasuk/setCode') ?>",
                    dataType: "JSON",
                    data: {
                        id_barangmasuk: id_barangmasuk
                    },
                    success: function(data) {
                        $('[name="id_barangmasuk"]').val(data);
                        
                    }
                });
                return false;
            }
            function setKremen() {
                var id = $('#id').val();
                if (id <=0) {
                    document.getElementById('id').value = 1;    
                }

                
                
            }
            

            $(".kremen").click(function() {
                
                
                
            })

            //getStokBarang

            $("#datapemesan").click(function(){
                $('#Modal_Ambil').modal('show');
            })

            //nama barang
            $("#name").keyup(function(){
                var replaceSpace = $(this).val(); 
                var data = replaceSpace.replace(/ /g, ".");
                $('[name="id"]').val(data);
            })
            
            //jumlah barang
            $("#qty").keyup(function(){
                var qty = $(this).val(); 
                var numbers = /^[0-9]+$/;
                if(!qty.match(numbers)){
                
                document.getElementById('qty').value = "";
                }
            })
            //jumlah barang
            $("#hp").keyup(function(){
                var hp = $(this).val(); 
                var numbers = /^[0-9]+$/;
                if(!hp.match(numbers)){
                
                document.getElementById('hp').value = "";
                }
            })

            //harga barang
            $("#price").keyup(function(){
                var numbers = /^[0-9]+$/;
                var price = $(this).val(); 
                if(!price.match(numbers)){
                
                document.getElementById('price').value = "";
                }
            })

            function kosong() {
                
                
                document.getElementById('price').value = "";
                document.getElementById('name').value = "";
                document.getElementById('qty').value = "";
            }
            //keranjang
            $(".add_keranjang").click(function() {
                var id = $('#id').val();
               
                var name = $("#name").val();
                var price = $("#price").val();
                var qty = parseInt($("#qty").val());
                
                $.ajax({
                    url: "<?php echo base_url(); ?>Barangmasuk/Cart",
                    method: "POST",
                    data: {
                        id : id,
                        name: name,
                        qty: qty,
                        price: price
                    },
                    success: function(data) {
                        
                        $("#detailCart").html(data);
                        var id = $('#id').val();
                        var result = parseInt(id)+1;
                        document.getElementById('id').value = result;

                        kosong();
                        // setTotal()
                    }
                });
                
            })
            //load
            $('#detailCart').load("<?php echo base_url(); ?>Barangmasuk/load_cart");
            //hapus cart
            $(document).on('click', '.hapus_cart', function() {
                var row_id = $(this).attr("id");
                $.ajax({
                    url: "<?php echo base_url(); ?>Barangmasuk/hapus_keranjang",
                    method: "POST",
                    data: {
                        row_id: row_id
                    },
                    success: function(data) {
                        $('#detail_keranjang').html(data);
                        $('#detailCart').load("<?php echo base_url(); ?>Barangmasuk/load_cart");
                        setTotal()
                        var result = parseInt(id)-1;
                        document.getElementById('id').value = result;
                    }
                })
            })

             //barangmasuk
   
    $('#barangmasuk').on('click',function(e){
      var id_barangmasuk = $('#id_barangmasuk').val();
      var id_pemesanan = $('#id_pemesanan').val();
      var tanggal = $('#tanggal').val();
      var total = $('#total').val();
     
              $.ajax({
                type: "POST",
                url: '<?php echo site_url('Barangmasuk/addCre'); ?>',
                dataType: "JSON",
                data: {id_barangmasuk:id_barangmasuk, id_pemesanan:id_pemesanan, tanggal:tanggal,total:total},
                success: function(data){
                    setCode();
                    date();
                     window.alert("Data berhasil disimpan");
        
                $('#detailCart').load("<?php echo base_url();?>Barangmasuk/hapusSemua");
                },
                error: function(data){
                console.log(data);
                
                }
            });
    });
  }); //akhir
      
    </script>
    <!-- Script -->

</body>

</html>