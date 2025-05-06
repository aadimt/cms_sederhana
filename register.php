<?php
session_start();
include 'koneksi.php';

$register_error = "";

if (isset($_POST['register'])) {
  $username = mysqli_real_escape_string($koneksi, $_POST['username']);
  $password = mysqli_real_escape_string($koneksi, $_POST['password']);
  $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

  $cekQuery = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");

  if (mysqli_num_rows($cekQuery) > 0) {
    $register_error = "Username sudah digunakan!";
  } else {
    $insert = mysqli_query($koneksi, "INSERT INTO users (username, password) VALUES ('$username', '$hashedPassword')");
    if ($insert) {
      $_SESSION['username'] = $username;
      $_SESSION['user_id'] = mysqli_insert_id($koneksi);
      header("Location: dashboard.php");
      exit;
    } else {
      $register_error = "Registrasi gagal!";
    }
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Registrasi Akun</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card shadow-sm mx-auto" style="max-width: 400px;">
      <div class="card-body">
        <h4 class="card-title mb-4">Registrasi Akun</h4>
        <?php if ($register_error): ?>
          <div class="alert alert-danger"><?= $register_error ?></div>
        <?php endif; ?>
        <form method="POST">
          <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
          </div>
          <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
          </div>
          <button name="register" class="btn btn-primary w-100">Daftar</button>
          <p class="text-center mt-3">Sudah punya akun? <a href="login.php">Login</a></p>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

