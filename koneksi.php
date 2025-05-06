<?php
$host     = "localhost";     // atau bisa juga '127.0.0.1'
$user     = "root";          // ganti jika bukan root (misal di hosting)
$password = "";              // sesuaikan dengan password MySQL kamu
$database = "db_penjualan";  // nama database

// Membuat koneksi
$koneksi = mysqli_connect($host, $user, $password, $database);

// Mengecek koneksi
if (!$koneksi) {
  die("Koneksi gagal: " . mysqli_connect_error());
}

// echo "Koneksi berhasil"; // Untuk testing saja
