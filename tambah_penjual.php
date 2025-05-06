<?php
include 'koneksi.php';

// Proses saat form disubmit
if (isset($_POST['simpan'])) {
  $nama   = $_POST['nama'];
  $alamat = $_POST['alamat'];

  $insert = mysqli_query($koneksi, "INSERT INTO tb_penjual (nama, alamat) VALUES ('$nama', '$alamat')");

  if ($insert) {
    echo "<script>alert('Data penjual berhasil ditambahkan'); window.location='tampil_penjual.php';</script>";
  } else {
    echo "<script>alert('Gagal menambahkan data penjual');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Tambah Penjual</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h3 class="mb-4">Tambah Penjual Baru</h3>
    <form method="POST">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Penjual</label>
        <input type="text" class="form-control" name="nama" required>
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" name="alamat" rows="3" required></textarea>
      </div>
      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      <a href="tampil_penjual.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>

</html>
