<h2>Siparişlerim</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>Ürün</th>
        <th>Adet</th>
        <th>Tarih</th>
        <th>Durum</th>
    </tr>
    <?php foreach ($siparisler as $s): ?>
    <tr>
        <td><?= $s->urun_adi ?></td>
        <td><?= $s->adet ?></td>
        <td><?= $s->tarih ?></td>
        <td><?= $s->durum ?></td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="<?= base_url('Urunler') ?>">← Ürünlere Dön</a>
