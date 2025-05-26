<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Giriş Yap</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card shadow">
        <div class="card-header text-center">
          <h4>Giriş Yap</h4>
        </div>
        <div class="card-body">
          <?php if (isset($hata)): ?>
            <div class="alert alert-danger"><?= $hata ?></div>
          <?php endif; ?>

          <form method="post" action="<?= base_url('Kullanici/giris_yap') ?>">
  <div class="mb-3">
    <label for="email" class="form-label">E-posta</label>
    <input type="email" name="email" id="email" class="form-control" required>
  </div>

  <div class="mb-3">
    <label for="sifre" class="form-label">Şifre</label>
    <input type="password" name="sifre" id="sifre" class="form-control" required>
  </div>

  <button type="submit" class="btn btn-primary w-100">Giriş Yap</button>
</form>


          <div class="mt-3 text-center">
            <a href="<?= base_url('Kullanici/uye_ol') ?>">Hesabınız yok mu? Üye olun</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>
