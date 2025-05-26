<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo isset($title) ? $title : 'E-Ticaret Sitesi'; ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
  <div class="container">
    <a class="navbar-brand" href="<?= base_url() ?>">E-Ticaret</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navMenu">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item"><a class="nav-link" href="<?= base_url('Urunler') ?>">Ürünler</a></li>
        <li class="nav-item"><a class="nav-link" href="<?= base_url('Sepet') ?>">Sepet</a></li>
        <?php
        $CI =& get_instance();
        $kullanici = $CI->session->userdata('kullanici');
        if ($kullanici):
        ?>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('siparislerim') ?>">Siparişlerim</a></li>
          <?php if ($kullanici->rol === 'admin'): ?>
            <li class="nav-item"><a class="nav-link" href="<?= base_url('admin') ?>">Admin</a></li>
          <?php endif; ?>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('cikis') ?>">Çıkış</a></li>
        <?php else: ?>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('giris') ?>">Giriş</a></li>
          <li class="nav-item"><a class="nav-link" href="<?= base_url('uye-ol') ?>">Üye Ol</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
<?php echo isset($icerik) ? $icerik : ''; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
