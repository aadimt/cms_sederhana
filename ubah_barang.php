<?php
include 'koneksi.php';

// Ambil data berdasarkan ID dari URL
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_barang WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

// Proses saat tombol "Simpan" ditekan
if (isset($_POST['simpan'])) {
  $nama  = $_POST['nama'];
  $harga = $_POST['harga'];

  $update = mysqli_query($koneksi, "UPDATE tb_barang SET 
        nama = '$nama', 
        harga = '$harga' 
        WHERE id = '$id'");

  if ($update) {
    echo "<script>alert('Data berhasil diubah'); window.location='tampil_barang.php';</script>";
  } else {
    echo "<script>alert('Gagal mengubah data');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Ubah Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h3 class="mb-4">Ubah Data Barang</h3>
    <form method="POST">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" name="nama" value="<?= $data['nama'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" name="harga" value="<?= $data['harga'] ?>" required>
      </div>
      <button type="submit" name="simpan" class="btn btn-success">Simpan Perubahan</button>
      <a href="tampil_barang.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>

</html>