<h2>Admin Paneli</h2>

<p><a href="<?= base_url('Admin/urun_ekle') ?>">Yeni Ürün Ekle</a></p>
<ul>
<h2>Admin Paneli</h2>
<ul>
<?php foreach ($urunler as $urun): ?>
    <li>
        <img src="<?= base_url('uploads/' . $urun->resim_yolu) ?>" width="150" alt="<?= $urun->ad ?>"><br>
        <strong><?= $urun->ad ?></strong> - <?= $urun->fiyat ?> TL
        <a href="<?= base_url('Admin/urun_sil/' . $urun->id) ?>">[Sil]</a>
        <a href="<?= base_url('Admin/urun_duzenle/' . $urun->id) ?>">[Düzenle]</a>

    </li>
    <a href="<?= base_url('Admin/siparisler') ?>">[Siparişleri Görüntüle]</a>

<?php endforeach; ?>
</ul>

<a href="<?= base_url('Urunler') ?>">Siteye Dön</a>
