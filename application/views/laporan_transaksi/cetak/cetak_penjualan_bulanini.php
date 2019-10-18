<h4 style="text-align: center;">
  <br><h1><B>Libra Konveksi dan Bordir Komputer</B></h1>
  Pasar, Sengon, Kec. Mantingan, Kabupaten Ngawi, Jawa Timur 
  <br>
  Telp. 085883680093
</h4>
<h5 style="text-align: center;">
  <hr>
  <br><h4>LAPORAN DATA BELANJA BULAN INI</h4>
</h5>
<hr>
<br>
<table border-collapse: collapse class="tabel" align="center">
  <thead>
   <tr align="center"  bgcolor="yellow">
      <th>tanggal</th>
      <th>kode belanja</th>
      <th>penjual</th>
      <th>pelanggan</th>
      <th>total</th>
      <th>kategori</th>
  </tr> 
  </thead>
  <tbody>
    <?php foreach ($laporan_transaksi as $t): ?>
      <tr>
        <td>
          <?php echo $t->tangal?>
        </td>
        <td>
          <?php echo $t->nofaktur?>
        </td>
        <td>
          <?php echo $t->penjual?>
        </td>
        <td>
          <?php echo $t->pelanggan?>
        </td>
        <td>
          <?php echo $t->total?>
        </td>
        <td>
          <?php echo $t->kategori?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>