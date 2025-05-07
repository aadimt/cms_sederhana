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
  <title>Dashboard Estetik</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
  <style>
    body {
      background: linear-gradient(135deg, #f8f9fa, #e3e6ea);
      font-family: 'Poppins', sans-serif;
    }
    .card {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      border-radius: 15px;
    }
    .list-group-item {
      transition: 0.3s ease-in-out;
    }
    .list-group-item:hover {
      background: #6c757d;
      color: white;
    }
    h3 {
      text-align: center;
      font-weight: 600;
      color: #343a40;
    }
  </style>
</head>
<body>
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