<?php
include 'koneksi.php';

// Pastikan parameter id tersedia dan valid
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
  $id = $_GET['id'];

  // Eksekusi query hapus
  $hapus = mysqli_query($koneksi, "DELETE FROM tb_pelanggan WHERE no_pelanggan = '$id'");

  if ($hapus) {
    echo "<script>alert('Data berhasil dihapus'); window.location='tampil_pelanggan.php';</script>";
  } else {
    echo "<script>alert('Gagal menghapus data'); window.location='tampil_pelanggan.php';</script>";
  }
} else {
  echo "<script>alert('ID tidak valid'); window.location='tampil_pelanggan.php';</script>";
}
?>
