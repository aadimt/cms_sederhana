<?php
include 'koneksi.php';

// Proses saat form disubmit
if (isset($_POST['simpan'])) {
  $nama  = $_POST['nama'];
  $harga = $_POST['harga'];

  $insert = mysqli_query($koneksi, "INSERT INTO tb_barang (nama, harga) VALUES ('$nama', '$harga')");

  if ($insert) {
    echo "<script>alert('Data berhasil ditambahkan'); window.location='tampil_barang.php';</script>";
  } else {
    echo "<script>alert('Gagal menambahkan data');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Tambah Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h3 class="mb-4">Tambah Barang Baru</h3>
    <form method="POST">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" name="nama" required>
      </div>
      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" name="harga" required>
      </div>
      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      <a href="tampil_barang.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>

</html>