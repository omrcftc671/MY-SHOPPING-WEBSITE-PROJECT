<h2>Sipariş Listesi</h2>
<table border="1" cellpadding="5">
    <tr>
        <th>Müşteri</th>
        <th>Ürün</th>
        <th>Adet</th>
        <th>Tarih</th>
        <th>Durum</th>
    </tr>
    <?php foreach ($siparisler as $s): ?>
    <tr>
        <td><?= $s->musteri ?></td>
        <td><?= $s->urun_adi ?></td>
        <td><?= $s->adet ?></td>
        <td><?= $s->tarih ?></td>
        <td>
            <form method="post" action="<?= base_url('Admin/siparis_durum_guncelle') ?>">
                <input type="hidden" name="siparis_id" value="<?= $s->id ?>">
                <select name="durum" onchange="this.form.submit()">
                    <option <?= $s->durum == 'Hazırlanıyor' ? 'selected' : '' ?>>Hazırlanıyor</option>
                    <option <?= $s->durum == 'Kargoya Verildi' ? 'selected' : '' ?>>Kargoya Verildi</option>
                    <option <?= $s->durum == 'Teslim Edildi' ? 'selected' : '' ?>>Teslim Edildi</option>
                </select>
            </form>
        </td>
    </tr>
    <?php endforeach; ?>
</table>

<a href="<?= base_url('Admin') ?>">← Admin Panel</a>
