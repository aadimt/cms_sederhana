<?php
include 'koneksi.php';
$keyword = $_POST['keyword'] ?? '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Data Penjualan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container mt-5">
    <h3 class="mb-4">Daftar Penjualan</h3>

    <div class="d-flex justify-content-between mb-3">
      <a href="tambah_penjualan.php" class="btn btn-success btn-sm">Tambah</a>

      <form method="post" class="d-flex gap-2">
        <input type="text" name="keyword" value="<?= $keyword ?>" class="form-control form-control-sm" placeholder="Cari Nama Pelanggan">
        <button class="btn btn-info btn-sm">Cari</button>
        <a href="tampil_penjualan.php" class="btn btn-secondary btn-sm">Clear</a>
      </form>
    </div>

    <table class="table table-bordered table-striped table-hover">
      <thead class="table-dark">
        <tr>
          <th>No</th>
          <th>Faktur</th>
          <th>No Pelanggan</th>
          <th>Nama Pelanggan</th>
          <th>Tanggal Penjualan</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $no = 1;
        $sql = "SELECT p.id, p.faktur, p.no_pelanggan, pl.nama_pelanggan, p.tanggal_penjualan
                FROM tb_penjualan p
                JOIN tb_pelanggan pl ON p.no_pelanggan = pl.no_pelanggan
                WHERE pl.nama_pelanggan LIKE '%$keyword%'
                ORDER BY p.id ASC";

        $query = mysqli_query($koneksi, $sql);
        while ($data = mysqli_fetch_assoc($query)) {
          echo "<tr>";
          echo "<td>{$no}</td>";
          echo "<td>{$data['faktur']}</td>";
          echo "<td>{$data['no_pelanggan']}</td>";
          echo "<td>{$data['nama_pelanggan']}</td>";
          echo "<td>{$data['tanggal_penjualan']}</td>";
          echo "<td>
                  <a href='ubah_penjualan.php?id={$data['id']}' class='btn btn-warning btn-sm'>Ubah</a>
                  <a href='hapus_penjualan.php?id={$data['id']}' class='btn btn-danger btn-sm' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                </td>";
          echo "</tr>";
          $no++;
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
