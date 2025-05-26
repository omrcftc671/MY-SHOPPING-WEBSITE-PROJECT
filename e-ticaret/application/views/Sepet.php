<h2>Sepetim</h2>

<?php if (empty($sepet)): ?>
  <div class="alert alert-info">Sepetiniz şu anda boş.</div>
<?php else: ?>
  <table class="table table-bordered align-middle">
    <thead class="table-light">
      <tr>
        <th>Ürün</th>
        <th>Fiyat</th>
        <th>Adet</th>
        <th>Toplam</th>
        <th>İşlem</th>
      </tr>
    </thead>
    <tbody>
      <?php
        $toplam = 0;
        foreach ($sepet as $s):
          $araToplam = $s->urun_fiyat * $s->adet;
          $toplam += $araToplam;
      ?>
        <tr>
          <td><?php echo $s->urun_adi; ?></td>
          <td><?php echo number_format($s->urun_fiyat, 2); ?> TL</td>
          <td><?php echo $s->adet; ?></td>
          <td><?php echo number_format($araToplam, 2); ?> TL</td>
          <td>
            <a href="<?php echo base_url('Sepet/sil/' . $s->id); ?>" class="btn btn-sm btn-danger">Sil</a>
          </td>
        </tr>
      <?php endforeach; ?>
    </tbody>
    <tfoot>
  <tr>
    <th colspan="3" class="text-end">Genel Toplam:</th>
    <th colspan="2"><?php echo number_format($toplam, 2); ?> TL</th>
  </tr>
</tfoot>
  </table>

  <?php
  $CI =& get_instance();
  $kullanici = $CI->session->userdata('kullanici');
  if ($kullanici):
  ?>
    <form method="post" action="<?php echo base_url('Sepet/siparis_onayla'); ?>">
      <button type="submit" class="btn btn-success">Siparişi Onayla</button>
    </form>
  <?php else: ?>
    <div class="alert alert-warning">
      Sipariş verebilmek için <a href="<?php echo base_url('giris'); ?>">giriş yap</a>malısınız.
    </div>
  <?php endif; ?>
<?php endif; ?>
