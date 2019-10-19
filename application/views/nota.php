<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style type="text/css" media="print">
        @page {
    /* size: landscape; */
    margin: 0;

  }

  .body {
    margin:0in 0.2in 0in 0.3in;
    /* margin: 1.6cm;
    mso-header-margin:.5in;
    mso-footer-margin:.5in;
    mso-paper-source:4; */
    font-family: Arial, Helvetica, sans-serif;
   }

   .footer{
    position:absolute;
    /* right:0; */
    bottom:0;
  }
  p, td{
      font-size: 12px;
  }

    </style>
</head>
<!--  -->
<body >
    <h5 style="text-align:center;">Libra Conveksi<br>Jln. Prov M. Yamin. 60 Bogo Nganjuk</h5>
    <table>
        <tr>
            <td><?php foreach ($pemesanan as $t): ?> <?php echo $t->id_pemesanan?><?php endforeach; ?></td>
        </tr>
        <tr>
            <td><?php foreach ($pemesanan as $t): ?>Kasir</td>
            <td>:  <?php echo $t->username?><?php endforeach; ?></td>
        </tr>
        <tr>
            <td> <?php foreach ($pemesanan as $j): ?>Pelanggan</td>
            <td>:  <?php echo $j->nama?></td> <?php endforeach; ?></td>
        </tr>
    </table>
    <hr style="border-top : dotted 1px;">
    <br>
    <table>
    <td><?php foreach ($detail as $t): ?>
        <tr>
            <td><?php echo $t->nama_barang?></td>
        </tr>
        <tr>
            <td><?php echo $t->harga?> X <?php echo $t->jumlah?> = <?php echo ($t->jumlah * $t->harga)?></td>
        </tr>
        <?php endforeach; ?>
    </table>
    <hr style="border-top : dotted 1px;">
    <table>
        <tr>
        <?php $awal=0; ?>
            <td>Total</td>
            <td><?php foreach ($pemesanan as $t): ?> <?php echo $t->total?></td> <?php endforeach; ?>
        </tr>
        <tr>
            <td>Bayar</td>
            <td><?php foreach ($pemesanan as $t): ?> <?php echo $t->bayar?> <?php endforeach; ?></td>
        </tr>
        <tr>
            <td>
                <?php foreach ($pemesanan as $t):  
                    if($t->bayar >= $t->total){
                        echo("Kemballian  ");
                    }else{
                        echo("Sisa  ");
                    }
                ?>
                <?php endforeach; ?>
             </td>
            <td>
                <?php foreach ($pemesanan as $t):  
                    if($t->bayar >= $t->total){
                        echo ($t->bayar - $t->total) ;
                    }else{
                        echo ("-".($t->total - $t->bayar)) ;
                    }
                    ?>
                <?php endforeach; ?>
             </td>
        </tr>
    </table>
    <hr style="border-top : dotted 1px;">
    <p style="text-align:center;">Layanan Konsumen : 0899988263</p>
</body>
<script>
    window.print();
    document.location.href = "http://localhost/libra/Pemesanan"; 
     
</script>
</html>