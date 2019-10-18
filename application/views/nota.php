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
<body onload="">
    <h5 style="text-align:center;">Libra Conveksi<br>Jln. Prov M. Yamin. 60 Bogo Nganjuk</h5>
    <table>
        <tr>
            <td><?php foreach ($print as $t): ?> <?php echo $t->id_pemesanan?> <?php endforeach; ?></td>
        </tr>
        <tr>
            <td> <?php echo date('d-m-y h:m:s') ?></td>
        </tr>
    </table>
    <br>
    <table>
    <td><?php foreach ($print as $t): ?>
        <tr>
            <td><?php echo $t->id_pemesanan?></td>
        </tr>
        <tr>
            <td>150.000 X 13 = 750.000</td>
        </tr>
        <?php endforeach; ?>
    </table>
    <hr style="border-top : dotted 1px;">
    <table>
        <tr>
            <td>Total</td>
            <td>Rp. 850.000</td>
        </tr>
        <tr>
            <td>Dp</td>
            <td>Rp. 500.000</td>
        </tr>
        <tr>
            <td>Sisa</td>
            <td>Rp. 350.000</td>
        </tr>
    </table>
    <hr style="border-top : dotted 1px;">
    <p style="text-align:center;">Layanan Konsumen : 0899988263</p>
</body>
</html>