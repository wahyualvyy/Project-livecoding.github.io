<?php
session_start();
include("../function/koneksi.php");

if (!isset($_SESSION["nama"])) {
  header("Location: login.php");
  exit();
}

$query = mysqli_query($koneksi, "SELECT * FROM user");



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Table admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
  <style>
    th,
    td {
      text-align: center;
      /* Mengatur isi sel tabel menjadi terpusat */
      padding: 8px;
      border: 1px solid #dddddd;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Table Admin</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
        <div class="offcanvas-header">
          <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
            Navigasi
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
          <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
            <li class="nav-item">
              <a class="nav-link" aria-current="page" href="admin.php">Calender Penyewaan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="table.php">Table Penyewaan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="produk.php">Input Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../function/log_out.php">Keluar</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>
  <main>
    <div class="container-fluid px-4">
      <br /><br /><br />
      <div class="card mb-4" style="box-shadow: 0 3px 3px rgba(0, 0, 0, 0.2)">
        <div class="card-header">
          <i class="fas fa-table me-1"></i>
          Data Penyewa Home stay
          <div class="d-flex justify-content-end">
            <div class="row justify-content-end">
              <input class="form-control mr-2" type="search" placeholder="Search" aria-label="Search" />
            </div>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama</th>
                  <th scope="col">Nomer telepon</th>
                  <th scope="col">Nama Kamar</th>
                  <th scope="col">Email</th>
                  <th scope="col">Hari</th>
                  <th scope="col">Paket</th>
                  <th scope="col">Check in</th>
                  <th scope="col">Check out</th>
                  <th scope="col">Total</th>
                  <th scope="col">Status</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $a = 1;
                foreach ($query as $user) {
                ?>
                  <tr>
                    <th scope="row"><?= $a; ?></th>
                    <td><?= $user['nama']; ?></td>
                    <td><?= $user['nomer']; ?></td>
                    <td><?= $user['nama_kamar']; ?></td>
                    <td><?= $user['email']; ?></td>
                    <td><?= $user['berapa_hari']; ?></td>
                    <td><?= $user['paket']; ?></td>
                    <td><?= $user['check_in']; ?></td>
                    <td><?= $user['check_out']; ?></td>
                    <td><?= $user['total']; ?></td>
                    <td><?= $user['status']; ?></td>
                    <td>
                      <div class="row">
                        <div class="col-md-6">
                          <form action="../function/ubah_table.php" method="GET">
                            <input type="hidden" name="id" value="<?= $user['id_user']; ?>">
                            <button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Anda yakin ingin mengedit data ini?')">Ubah</button>
                          </form>
                        </div>
                        <div class="col-md-6">
                          <form action="../function/hapus_table.php" method="GET">
                            <input type="hidden" name="id" value="<?= $user['id_user']; ?>">
                            <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                          </form>
                        </div>
                      </div>
                    </td>
                  </tr>
                <?php $a++;
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>