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
                            <!-- <form enctype="multipart/form-data" class="form-horizontal" method="post" id="formnya" > -->
                            <div class="box-header">

                                <div class="form-horizontal">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label class="col-sm-2 control-label ">Nama Pemesan</label>
                                            <div class="col-sm-3 ">
                                                <input type="text" class="form-control"  name="namapemesan" placeholder="Nama Pemesan" id="namapemesan">
                                                <input type="text" class="form-control"  name="id_pemesanan" placeholder="Nama Pemesan" id="id_pemesanan">
                                            </div>    
                                        </div>
                                        
                                        <div class="form-group">
                                            <!-- kontrol baris kedua -->
                                            <label class="col-sm-2 control-label">Data Barang</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control"  name="name" placeholder="Nama Barang" id="name">
                                                
                                                <input type="text" class="form-control" readonly name="id" placeholder="nomor" id="id" value="">
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

                                <div class="form-horizontal">
                                    <div class="box-body">

                                        

                                        <div class="form-group">
                                            
                                            <div class="col-sm-12 dropzone dz-message">
                                                <h3>Masukkan Gambar</h3></center>
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
        $(document).ready(function(e) {

            //set kode
            setCode();

            // date();
            // setTotal();
            setKremen()
            

            

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
            function setKremen() {
                var id = $('#id').val();
                if (id <=0) {
                    document.getElementById('id').value = 1;    
                }

                
                
            }
            

            $(".kremen").click(function() {
                
                
                
            })

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