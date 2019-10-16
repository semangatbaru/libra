<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pemesanan | Libra</title>
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
                    <div class="col-xs-7 ">
                        <div class="box box-info">
                            <form>
                                <div class="modal fade" id="Modal_Ambil" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                      <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Edit Laporan Angsuran</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>
                                      <div class="modal-body">
                                           <div class="form-group row ">
                                              <label  class="col-sm-2 control-label">Id Pelanggan</label>
                                              <div class="col-sm-8">
                                                <input type="text" class="form-control" id="id_pelanggan" name="id_pelanggan" placeholder="Id Pelanggan"readonly >
                                              </div>
                                            </div>

                                            <div class="form-group row">
                                              <label  class="col-sm-2 control-label">Nama</label>
                                              <div class="col-sm-8">
                                                <input type="text" class="form-control aturan" id="nama"  name="nama" placeholder="Nama">
                                              </div>
                                            </div>

                                            <div class="form-group row">
                                              <label  class="col-sm-2 control-label">No HP</label>
                                              <div class="col-sm-8">
                                                <input type="text" class="form-control aturan" id="hp"  name="hp" placeholder="hp">
                                              </div>
                                            </div>

                                            <div class="form-group row">
                                              <label  class="col-sm-2 control-label">Alamat</label>
                                              <div class="col-sm-8">
                                                <input type="text" class="form-control aturan" id="alamat"  name="alamat" placeholder="Alamat">
                                              </div>
                                            </div>

                                      </div>

                                      <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="button" type="submit" name="simpan" id="click-simpan" class="btn btn-primary">Simpan</button>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                            </form>
                            <!-- <form enctype="multipart/form-data" class="form-horizontal" method="post" id="formnya" > -->
                            <div class="box-header">

                                <div class="form-horizontal">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label " id="datapemesan">Nama Pemesan</label>
                                            <div class="col-sm-3 ">
                                                 <select class="form-control select2 j" style="width: 100%;" name="id_pelanggan" id="id_pelanggan">
                                                    <option value="" disable >Cari Pelanggan</option>
                                                    <?php foreach ($pelanggan as $p): ?>
                                                        <option data-nohp="<?php echo $p->hp ?>" data-alamat="<?php echo $p->alamat ?>" data-nama="<?php echo $p->nama ?>" value="<?php echo $p->id_pelanggan?>"><?php echo $p->nama;?></option>
                                                    <?php endforeach;?>
                                                </select>
                                                <input type="hidden" class="form-control"  name="id_pemesanan" placeholder="Nama Pemesan" id="id_pemesanan">
                                            </div>    
                                        </div>
                                        
                                        <div class="form-group">
                                            <!-- kontrol baris kedua -->
                                            <label class="col-sm-2 control-label">Data Barang</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control"  name="name" placeholder="Nama Barang" id="name">
                                                
                                                <input type="hidden" class="form-control" readonly name="id" placeholder="nomor" id="id" value="">
                                            </div>
                                            <div class="col-sm-2">
                                                <input type="text" class="form-control"  name="qty" placeholder="Jumlah" id="qty">
                                            </div>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control"  name="price" placeholder="Harga" id="price">
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
                                            </table>
                                        </div>
                                        <div class="form-group ">
                                            <div class="col-sm-4 col-sm-offset-2">
                                                <input type="text" class="form-control"  name="bayar" placeholder="Bayar" id="bayar">
                                                
                                            </div>    
                                            <div class="col-sm-4 ">
                                                <input type="text" class="form-control"  name="kembalian" placeholder="Kembalian" id="kembalian" readonly>
                                            </div>    
                                        </div>
                                        
                                        <div class="col-md-12 col-sm-offset-1 ">
                                            <button style="padding:6px 210px 6px 210px" class="btn   btn-social btn-instagram" name="keranjang" id="keranjang">Pesan</button>
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
                    <div class="col-xs-5 ">
                        <div class="box box-info">
                            <!-- <form enctype="multipart/form-data" class="form-horizontal" method="post" id="formnya" > -->
                            <div class="box-header">
                            <center><h3 class="box-title">Tambah Gambar</h3></center>
                                <div class="form-horizontal">
                                    <div class="box-body">

                                        

                                        <div class="form-group">
                                            
                                            <div class="col-sm-12 dropzone dz-message">
                                            </div>
                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- </form> -->
                        </div>
                        <!-- /.col -->
                    </div>
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
            b.id_pemesanan = $('#id_pemesanan').val();
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
            setCodep();
            function setCodep(){
                var id_pelanggan = $('#id_pelanggan').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('Pelanggan/setCode') ?>",
                    dataType: "JSON",
                    data:{id_pelanggan:id_pelanggan},
                    success : function(data){
                        $('[name="id_pelanggan"]').val(data);
                    }
                });
            return false;
            }


            

            //set kode
            setCode();

            // date();
            // setTotal();
            //setKremen()

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
            

            

            function setCode() {
                var id_pemesanan = $('#id_pemesanan').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('Pemesanan/setCode') ?>",
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
           
            

            
            //set total
            function setTotal() {
                var total = $('#total').val();
                $.ajax({
                    type: "POST",
                    url: "<?php echo site_url('Pemesanan/total') ?>",
                    dataType: "JSON",
                    data: {
                        total: total
                    },
                    success: function(data) {
                        $('[name="total"]').val(data);
                        $('[name="hargaAwal"]').val(data);
                    }
                });
                return false;
            }
            //hari
            function date() {
                var today = new Date();
                var dd = today.getDate();

                var mm = today.getMonth() + 1;
                var yyyy = today.getFullYear();
                if (dd < 10) {
                    dd = '0' + dd;
                }
                if (mm < 10) {
                    mm = '0' + mm;
                }
                today = dd + '/' + mm + '/' + yyyy;
                $('[name="tanggal"]').val(today);
            }
            //get alamat
           

            //getStokBarang
           

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
                    url: "<?php echo base_url(); ?>Pemesanan/Cart",
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
            $('#detailCart').load("<?php echo base_url(); ?>Pemesanan/load_cart");
            //hapus cart
            $(document).on('click', '.hapus_cart', function() {
                var row_id = $(this).attr("id");
                $.ajax({
                    url: "<?php echo base_url(); ?>Pemesanan/hapus_keranjang",
                    method: "POST",
                    data: {
                        row_id: row_id
                    },
                    success: function(data) {
                        $('#detail_keranjang').html(data);
                        $('#detailCart').load("<?php echo base_url(); ?>Pemesanan/load_cart");
                        setTotal()
                        var result = parseInt(id)-1;
                        document.getElementById('id').value = result;
                    }
                })
            })
            //kode kredit
            
            //cek stok
            // $("#qty").keyup(function() {
            //     var stok = parseInt($("#stok").val());
            //     var thisVal = parseInt($(this).val());

            //     if (thisVal > stok) {
            //         alert("Stok tidak mecukupi, tersedia = " + stok);
            //     }

            // })
            //diskon
           
            //hitung
            function hitung() {
                var total = document.getElementById('total').value;
                var bayar = document.getElementById('bayar').value;

                var result = parseInt(bayar) - parseInt(total);

                if (bayar == "") {
                    document.getElementById('kembalian').value = "";
                } else {
                    document.getElementById('kembalian').value = result;
                    if (result == 0) {
                        document.getElementById('kembalian').value = "";
                    }
                }
            }
            //pemesanan

            $('#pemesanan').on('click', function(e) {
                
                var kode_pemesanan = $('#kode_pemesanan').val();
                var id_user = $('#id_user').val();
                var id_pelanggan = $('#id_pelanggan').val();
                var tanggal = $('#tanggal').val();
                var total = $('#total').val();
                var potongan = $('#potongan').val();
                var bayar = $('#bayar').val();
                var kategori = $('#kategori').val();
                var pesan = $('#pesan').val();

                    if (id_pelanggan == "") {
                        document.getElementById("msgP").innerHTML = "*Pelanggannya..";
                   } else if (bayar == "") {
                        document.getElementById("msgB").innerHTML = "*Bayarnya...";
                    } else {
                        $.ajax({
                            type: "POST",
                            url: '<?php echo site_url('Pemesanan/add'); ?>',
                            dataType: "JSON",
                            data: {
                                kode_pemesanan: kode_pemesanan,
                                id_user: id_user,
                                id_pelanggan: id_pelanggan,
                                tanggal: tanggal,
                                bayar: bayar,
                                total: total,
                                pesan: pesan,
                                
                            },
                            success: function(data) {
                                setCode();
                                date();
                                document.getElementById('id_pelanggan').value = "";
                                $('[name="alamat"]').val("");
                                $('[name="kategori"]').val("");
                                $('[name="bayar"]').val("");
                                $('[name="total"]').val("");
                                $("#id_pelanggan").prop("selected", false);
                                $("#namaBarang").prop("selected", false);
                                $('[name="potongan"]').val("");
                                $('[name="kembalian"]').val("");
                                $('#detailCart').load("<?php echo base_url(); ?>Pemesanan/hapusSemua");
                            },
                            error: function(data) {
                                console.log(data);
                            }
                        });
                    }
                

            });
            
        }); //akhir
    </script>
    <!-- Script -->

</body>

</html>