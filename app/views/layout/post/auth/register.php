<?php require_once '../app/views/layout/header.php'; ?>

<div class="login-box">
  <div class="login-logo">
    <b>Register</b> User
  </div>
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">Buat akun baru</p>

      <?php if (!empty($data['error'])): ?>
        <div class="alert alert-danger"><?= $data['error']; ?></div>
      <?php elseif (!empty($data['success'])): ?>
        <div class="alert alert-success"><?= $data['success']; ?></div>
      <?php endif; ?>

      <form action="<?= BASE_URL ?>/auth/register" method="POST">
        <div class="input-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-user"></span></div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" name="confirm" class="form-control" placeholder="Ulangi Password" required>
          <div class="input-group-append">
            <div class="input-group-text"><span class="fas fa-lock"></span></div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <a href="<?= BASE_URL ?>/auth/login">Sudah punya akun?</a>
          </div>
          <div class="col-4">
            <button type="submit" class="btn btn-success btn-block">Daftar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<?php require_once '../app/views/layout/footer.php'; ?>
