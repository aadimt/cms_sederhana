<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <div class="card p-4 shadow-sm">
      <h3 class="mb-4">Selamat Datang, <?= htmlspecialchars($_SESSION['username']) ?></h3>
      <div class="list-group">
        <a href="tampil_barang.php" class="list-group-item list-group-item-action">Manajemen Barang</a>
        <a href="tampil_pelanggan.php" class="list-group-item list-group-item-action">Manajemen Pelanggan</a>
        <a href="tampil_penjual.php" class="list-group-item list-group-item-action">Manajemen Penjualan</a>
        <a href="logout.php" class="list-group-item list-group-item-action text-danger">Logout</a>
      </div>
    </div>
  </div>
</body>
</html>
