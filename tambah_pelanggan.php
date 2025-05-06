<?php
include 'koneksi.php';

// Proses saat form disubmit
if (isset($_POST['simpan'])) {
  $nama_pelanggan  = $_POST['nama_pelanggan'];
  $no_pelanggan    = $_POST['no_pelanggan'];
  $alamat          = $_POST['alamat'];

  // Query untuk menyimpan data pelanggan
  $insert = mysqli_query($koneksi, "INSERT INTO tb_pelanggan (no_pelanggan, nama_pelanggan, alamat) 
                                     VALUES ('$no_pelanggan', '$nama_pelanggan', '$alamat')");

  if ($insert) {
    echo "<script>alert('Data pelanggan berhasil ditambahkan'); window.location='tampil_pelanggan.php';</script>";
  } else {
    echo "<script>alert('Gagal menambahkan data pelanggan');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Tambah Pelanggan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h3 class="mb-4">Tambah Pelanggan Baru</h3>
    <form method="POST">
      <div class="mb-3">
        <label for="no_pelanggan" class="form-label">No Pelanggan</label>
        <input type="text" class="form-control" name="no_pelanggan" required>
      </div>
      <div class="mb-3">
        <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
        <input type="text" class="form-control" name="nama_pelanggan" required>
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" name="alamat" rows="3" required></textarea>
      </div>
      <button type="submit" name="simpan" class="btn btn-primary">Simpan</button>
      <a href="tampil_pelanggan.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>

</html>

