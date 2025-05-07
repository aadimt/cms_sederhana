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
  <style>
    body {
      background: linear-gradient(135deg, #ff9a9e, #fad0c4);
      font-family: 'Poppins', sans-serif;
      color: #333;
    }

    .container {
      max-width: 500px;
      background: #ffffff;
      padding: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
      margin-top: 50px;
    }

    h3 {
      text-align: center;
      font-weight: bold;
      color: #6c5b7b;
    }

    .form-label {
      font-weight: 500;
      color: #355c7d;
    }

    .btn-primary {
      background-color: #ff758c;
      border: none;
    }

    .btn-primary:hover {
      background-color: #e94969;
    }

    .btn-secondary {
      background-color: #6c5b7b;
    }

    .btn-secondary:hover {
      background-color: #554c69;
    }
  </style>
</head>

<body>
  <div class="container">
    <h3>Tambah Barang Baru</h3>
    <form method="POST">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama Barang</label>
        <input type="text" class="form-control" name="nama" required>
      </div>
      <div class="mb-3">
        <label for="harga" class="form-label">Harga</label>
        <input type="number" class="form-control" name="harga" required>
      </div>
      <div class="text-center">
        <button type="submit" name="simpan" class="btn btn-primary px-4">Simpan</button>
        <a href="tampil_barang.php" class="btn btn-secondary px-4">Batal</a>
      </div>
    </form>
  </div>
</body>

</html>