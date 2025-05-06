<?php
include 'koneksi.php';
$keyword = $_POST['keyword'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <title>Data Barang</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
  <div class="container mt-5">
    <h3 class="mb-4">Daftar Barang</h3>

    <div class="d-flex justify-content-between">
      <div>
        <a class="btn btn-success btn-sm mb-2" href="tambah_barang.php">Tambah</a>

      </div>
      <div>

        <form method=post class="d-flex gap-2">
          <div>
            <input name=keyword value="<?= $keyword ?>" class="form-control form-control-sm">
          </div>
          <div>
            <button class="btn btn-info btn-sm">Cari</button>
          </div>
          <div>
            <a href="tampil_barang.php" class="btn btn-info btn-sm">Clear</a>
          </div>
        </form>
      </div>
    </div>

    <table class="table table-bordered table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>Nama Barang</th>
          <th>Harga</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $sql = "SELECT * 
        FROM tb_barang 
        WHERE nama LIKE '%$keyword%' 
        ORDER BY nama
        ";
        var_dump($sql);
        $query = mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_assoc($query)) {
          echo "<tr>";
          echo "<td>{$no}</td>";
          echo "<td>{$data['nama']}</td>";
          echo "<td>Rp " . number_format($data['harga'], 0, ',', '.') . "</td>";
          echo "<td>
                            <a href='ubah_barang.php?id={$data['id']}' class='btn btn-warning btn-sm'>Ubah</a>
                            <a href='hapus_barang.php?id={$data['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                          </td>";
          echo "</tr>";
          $no++;
        }
        ?>
      </tbody>
    </table>
    <a href="tambah_barang.php" class="btn btn-primary">Tambah Barang</a>
  </div>
</body>

</html>