<?php require_once '../app/views/layout/header.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Dashboard</h1>
  </section>

  <section class="content">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Selamat Datang</h3>
      </div>
      <div class="card-body">
        <p>Hai, <?= htmlspecialchars($data['username']); ?>! Anda berhasil login ke CMS Sederhana.</p>
        <a href="<?= BASE_URL ?>/auth/logout" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </section>
</div>

<?php require_once '../app/views/layout/footer.php'; ?>
