<h2>Ürün Düzenle</h2>
<form method="post" enctype="multipart/form-data">
    Ad: <input type="text" name="ad" value="<?= $urun->ad ?>"><br>

    Kategori:
    <select name="kategori_id">
        <?php foreach ($kategoriler as $kategori): ?>
            <option value="<?= $kategori->id ?>" <?= $kategori->id == $urun->kategori_id ? 'selected' : '' ?>>
                <?= $kategori->ad ?>
            </option>
        <?php endforeach; ?>
    </select><br>

    Açıklama: <textarea name="aciklama"><?= $urun->aciklama ?></textarea><br>
    Fiyat: <input type="text" name="fiyat" value="<?= $urun->fiyat ?>"><br>
    Stok: <input type="number" name="stok" value="<?= $urun->stok ?>"><br>

    Mevcut Resim: <br>
    <img src="<?= base_url('uploads/' . $urun->resim_yolu) ?>" width="150"><br>
    Yeni Resim Yükle (zorunlu değil): <input type="file" name="resim"><br>

    <input type="hidden" name="eski_resim" value="<?= $urun->resim_yolu ?>">

    <button type="submit">Kaydet</button>
</form>

<a href="<?= base_url('Admin') ?>">← Admin Panel</a>
