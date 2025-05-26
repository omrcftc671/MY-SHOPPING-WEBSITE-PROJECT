<h2>Yeni Ürün Ekle</h2>
<form method="post" enctype="multipart/form-data">
    Ad: <input type="text" name="ad"><br>
    Kategori:
    <select name="kategori_id">
        <?php foreach ($kategoriler as $kategori): ?>
            <option value="<?= $kategori->id ?>"><?= $kategori->ad ?></option>
        <?php endforeach; ?>
    </select><br>
    Açıklama: <textarea name="aciklama"></textarea><br>
    Fiyat: <input type="text" name="fiyat"><br>
    Stok: <input type="number" name="stok"><br>
    Resim Yükle: <input type="file" name="resim"><br>
    <button type="submit">Kaydet</button>
</form>
<a href="<?= base_url('Admin') ?>">Panele Dön</a>
