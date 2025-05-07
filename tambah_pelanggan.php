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
  <style>
    body {
      background: linear-gradient(135deg, #ffdde1, #ee9ca7);
      font-family: 'Poppins', sans-serif;
    }

    .container {
      max-width: 500px;
      background: #fff;
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
    <h3>Tambah Pelanggan Baru</h3>
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
      <div class="text-center">
        <button type="submit" name="simpan" class="btn btn-primary px-4">Simpan</button>
        <a href="tampil_pelanggan.php" class="btn btn-secondary px-4">Batal</a>
      </div>
    </form>
  </div>
</body>

</html>
