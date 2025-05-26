<div class="row">
  <div class="col-md-5">
    <img src="<?php echo base_url('uploads/' . $urun->resim_yolu); ?>" class="img-fluid rounded border" alt="<?php echo $urun->ad; ?>">
  </div>
  <div class="col-md-7">
    <h2><?php echo $urun->ad; ?></h2>
    <p><?php echo $urun->aciklama; ?></p>
    <p><strong>Fiyat:</strong> <?php echo $urun->fiyat; ?> TL</p>

    <form method="post" action="<?php echo base_url('Sepet/ekle/' . $urun->id); ?>">
      <div class="mb-3">
        <label>Adet:</label>
        <input type="number" name="adet" value="1" class="form-control" style="max-width: 100px;" min="1">
      </div>
      <button type="submit" class="btn btn-success">Sepete Ekle</button>
    </form>
  </div>
</div>

<hr>

<h4 class="mt-5">Yorumlar</h4>

<?php if (empty($yorumlar)): ?>
  <p>Bu ürüne henüz yorum yapılmamış.</p>
<?php else: ?>
  <ul class="list-group mb-4">
    <?php foreach ($yorumlar as $y): ?>
      <li class="list-group-item">
        <strong><?php echo $y->kullanici_ad; ?>:</strong> <?php echo $y->yorum; ?><br>
        <small class="text-muted"><?php echo $y->tarih; ?></small>
      </li>
    <?php endforeach; ?>
  </ul>
<?php endif; ?>

<h5>Yorum Ekle</h5>
<?php
$CI =& get_instance();
$kullanici = $CI->session->userdata('kullanici');
if ($kullanici):
?>
  <form method="post" action="<?php echo base_url('Urunler/yorum_ekle/' . $urun->id); ?>">
    <div class="mb-3">
      <textarea name="yorum" class="form-control" rows="3" required></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Gönder</button>
  </form>
<?php else: ?>
  <p>Yorum yapabilmek için <a href="<?php echo base_url('giris'); ?>">giriş yap</a>malısın.</p>
<?php endif; ?>
