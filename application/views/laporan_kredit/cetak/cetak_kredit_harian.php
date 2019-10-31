<h4 style="text-align: center;">
  <br><h1><B>Libra Konveksi & Bordir Computer</B></h1>
  Jln. Prov M. Yamin. 60 Bogo Nganjuk
  <br>
  Telp. 0852-3578-6923
</h4>
<h5 style="text-align: center;">
  <hr>
  <br><h4>LAPORAN KREDIT HARIAN</h4>
</h5>
<hr>
<br>
<table border-collapse: collapse class="tabel" align="center" border="1">
  <thead>
   <tr align="center"  bgcolor="yellow">
      <th>Kode Pemesanan</th>
      <th>Kredit</th>
      

  </tr> 
  </thead>
  <tbody>
    <?php foreach ($laporan_kredit as $t): ?>
      <tr>
        <td>
          <?php echo $t->id_pemesanan?>
        </td>
        <td>
          <?php echo $t->kredit?>
        </td>
        <?php endforeach; ?>
        <td>
        </td>
      </tr>
    
  </tbody>
</table>

<h1>Total : <?php foreach ($sum_kharian as $t):?><?php  echo $t->sumkredit?><?php endforeach; ?></h1>
<script>
    window.print();
    window.history.back();
     
</script>