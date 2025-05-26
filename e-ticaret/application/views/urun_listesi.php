<h1 class="mb-4">Ürünler</h1>
<div class="row">
<?php foreach ($urunler as $urun): ?>
  <div class="col-md-4 mb-4">
    <div class="card h-100">
      <img src="<?= base_url('uploads/' . $urun->resim_yolu) ?>" class="card-img-top" alt="<?= $urun->ad ?>">
      <div class="card-body">
        <h5 class="card-title"><?= $urun->ad ?></h5>
        <p class="card-text"><?= $urun->aciklama ?></p>
        <p class="card-text"><strong><?= $urun->fiyat ?> TL</strong></p>
        <a href="<?= base_url('urun/' . $urun->id) ?>" class="btn btn-primary">Detay</a>
      </div>
    </div>
  </div>
<?php endforeach; ?>
</div>
