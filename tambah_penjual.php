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
  <style>
    body {
      background: linear-gradient(135deg, #f8f9fa, #e3e3e3);
      font-family: 'Poppins', sans-serif;
    }

    .container {
      max-width: 500px;
      background: white;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      margin-top: 50px;
    }

    h3 {
      text-align: center;
      font-weight: bold;
      color: #333;
    }

    .btn-primary {
      background-color: #6c63ff;
      border: none;
    }

    .btn-primary:hover {
      background-color: #5145cd;
    }
  </style>
</head>

<body>
  <div class="container">
    <h3>Tambah Penjual Baru</h3>
    <form method="POST">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Penjual</label>
        <input type="text" class="form-control" name="nama" required>
      </div>
      <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <textarea class="form-control" name="alamat" rows="3" required></textarea>
      </div>
      <div class="text-center">
        <button type="submit" name="simpan" class="btn btn-primary px-4">Simpan</button>
        <a href="tampil_penjual.php" class="btn btn-secondary px-4">Batal</a>
      </div>
    </form>
  </div>
</body>

</html>