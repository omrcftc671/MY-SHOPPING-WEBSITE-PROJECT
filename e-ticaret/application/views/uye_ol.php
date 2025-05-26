<!DOCTYPE html>
<html lang="tr">
<head>
  <meta charset="UTF-8">
  <title>Üye Ol</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
      <div class="card shadow-sm">
        <div class="card-header text-center bg-primary text-white">
          <h4>Üye Ol</h4>
        </div>
        <div class="card-body">
          <?php if (isset($hata)): ?>
            <div class="alert alert-danger"><?= $hata ?></div>
          <?php endif; ?>

          <form method="post" action="<?= base_url('Kullanici/uye_kaydet') ?>">
            <div class="mb-3">
              <label for="email" class="form-label">E-posta</label>
              <input type="email" name="email" id="email" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="sifre" class="form-label">Şifre</label>
              <input type="password" name="sifre" id="sifre" class="form-control" required>
            </div>

            <div class="mb-3">
              <label for="sifre_tekrar" class="form-label">Şifre Tekrar</label>
              <input type="password" name="sifre_tekrar" id="sifre_tekrar" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success w-100">Kayıt Ol</button>
          </form>

          <div class="mt-3 text-center">
            <small>Zaten üye misiniz? <a href="<?= base_url('Kullanici/giris') ?>">Giriş Yap</a></small>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

</body>
</html>

