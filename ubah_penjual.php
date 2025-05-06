<?php
include 'koneksi.php';

// Ambil data berdasarkan ID dari URL
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_penjualan WHERE id = '$id'");
$data = mysqli_fetch_assoc($query);

// Proses saat tombol "Simpan" ditekan
if (isset($_POST['simpan'])) {
  $faktur = $_POST['faktur'];
  $no_pelanggan = $_POST['no_pelanggan'];
  $tanggal_penjualan = $_POST['tanggal_penjualan'];

  $update = mysqli_query($koneksi, "UPDATE tb_penjualan SET 
        faktur = '$faktur', 
        no_pelanggan = '$no_pelanggan', 
        tanggal_penjualan = '$tanggal_penjualan' 
        WHERE id = '$id'");

  if ($update) {
    echo "<script>alert('Data berhasil diubah'); window.location='tampil_penjualan.php';</script>";
  } else {
    echo "<script>alert('Gagal mengubah data');</script>";
  }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Ubah Penjualan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h3 class="mb-4">Ubah Data Penjualan</h3>
    <form method="POST">
      <div class="mb-3">
        <label for="faktur" class="form-label">Faktur</label>
        <input type="text" class="form-control" name="faktur" value="<?= $data['faktur'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="no_pelanggan" class="form-label">No Pelanggan</label>
        <input type="text" class="form-control" name="no_pelanggan" value="<?= $data['no_pelanggan'] ?>" required>
      </div>
      <div class="mb-3">
        <label for="tanggal_penjualan" class="form-label">Tanggal Penjualan</label>
        <input type="date" class="form-control" name="tanggal_penjualan" value="<?= $data['tanggal_penjualan'] ?>" required>
      </div>
      <button type="submit" name="simpan" class="btn btn-success">Simpan Perubahan</button>
      <a href="tampil_penjualan.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>

</html>
