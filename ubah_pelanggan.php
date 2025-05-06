<?php
include 'koneksi.php';

// Ambil data berdasarkan ID dari URL
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_pelanggan WHERE no_pelanggan = '$id'");
$data = mysqli_fetch_assoc($query);

// Proses saat tombol "Simpan" ditekan
if (isset($_POST['simpan'])) {
  $nama = $_POST['nama_pelanggan'];
  $alamat = $_POST['alamat'];

  $update = mysqli_query($koneksi, "UPDATE tb_pelanggan SET 
        nama_pelanggan = '$nama', 
        alamat = '$alamat' 
        WHERE no_pelanggan = '$id'");

  if ($update) {
    echo "<script>alert('Data berhasil diubah'); window.location='tampil_pelanggan.php';</script>";
  } else {
    echo "<script>alert('Gagal mengubah data');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Ubah Pelanggan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h3 class="mb-4">Ubah Data Pelanggan</h3>
    <form method="POST">
      <div class="mb-3">
        <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
        <input type="text" class="form-control" name="nama_pelanggan" value="<?= $data['nama_pelanggan'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" class="form-control" name="alamat" value="<?= $data['alamat'] ?>" required>
      </div>
      <button type="submit" name="simpan" class="btn btn-success">Simpan Perubahan</button>
      <a href="tampil_pelanggan.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>

</html>
