<?php
session_start();
include 'koneksi.php';

$login_error = "";

if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($koneksi, $_POST['username']);
  $password = $_POST['password'];

  $result = mysqli_query($koneksi, "SELECT * FROM users WHERE username='$username'");

  if ($result && mysqli_num_rows($result) === 1) {
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
      $_SESSION['username'] = $username;
      $_SESSION['user_id'] = $row['id'];
      header("Location: dashboard.php");
      exit;
    } else {
      $login_error = "Password salah!";
    }
  } else {
    $login_error = "Username tidak ditemukan!";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card shadow-sm mx-auto" style="max-width: 400px;">
      <div class="card-body">
        <h4 class="card-title mb-4">Login</h4>
        <?php if ($login_error): ?>
          <div class="alert alert-danger"><?= $login_error ?></div>
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
          <button name="login" class="btn btn-primary w-100">Login</button>
          <p class="text-center mt-3">Belum punya akun? <a href="register.php">Daftar</a></p>
        </form>
      </div>
    </div>
  </div>
</body>
</html>

