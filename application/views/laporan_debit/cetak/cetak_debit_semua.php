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
      <th>Debit</th>
      <th>Total</th>

  </tr> 
  </thead>
  <tbody>
    <?php foreach ($laporan_debit as $t): ?>
      <tr>
        <td>
          <?php echo $t->id_barangmasuk?>
        </td>
        <td>
          <?php echo $t->debit?>
        </td>
        <td>
          <?php foreach ($sumdebit as $su)
          { echo $su->sumdebit;}?>
        </td>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>