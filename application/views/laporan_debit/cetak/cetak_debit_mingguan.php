<h4 style="text-align: center;">
  <br><h1><B>Libra Konveksi & Bordir Computer</B></h1>
  Jln. Prov M. Yamin. 60 Bogo Nganjuk
  <br>
  Telp. 0852-3578-6923
</h4>
<h5 style="text-align: center;">
  <hr>
  <br><h4>LAPORAN DEBIT MINGGUAN</h4>
</h5>
<hr>
<br>
<table border-collapse: collapse class="tabel" align="center" border="1">
  <thead>
   <tr align="center"  bgcolor="yellow">
      <th>Kode Belanja</th>
      <th>Debit</th>
      

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
        <?php endforeach; ?>
        <td>
        </td>
      </tr>
    
  </tbody>
</table>

<h1>Total : <?php foreach ($sum_dmingguan as $su):?><?php  echo $su->sumdebit?><?php endforeach; ?></h1>
<script>
    // window.print();
    // window.history.back();
     
</script>