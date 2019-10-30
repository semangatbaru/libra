<h4 style="text-align: center;">
  <br><h1><B>PT. Jatim Herbal Perkasa</B></h1>
  Pasar, Sengon, Kec. Mantingan, Kabupaten Ngawi, Jawa Timur 
  <br>
  Telp. 085883680093
</h4>
<h5 style="text-align: center;">
  <hr>
  <br><h4>LAPORAN PENJUALAN JAMU SEMUA</h4>
</h5>
<hr>
<br>
<table border-collapse: collapse class="tabel" align="center">
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

<h1>Total : <?php foreach ($sum_kmingguan as $t):?><?php  echo $t->sumkredit?><?php endforeach; ?></h1>