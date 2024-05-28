<?php
session_start();
include("../function/koneksi.php");

if(!isset($_SESSION["nama"])){
    header("Location: login.php");
    exit();
  }


$query = mysqli_query($koneksi, "SELECT * FROM produk");



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Table produk</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>
        /* Gaya untuk form-container */
        .form-container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;

        }

        body {
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 21%, rgba(9, 9, 121, 1) 53%, rgba(0, 212, 255, 1) 90%);
        }

        /* Gaya untuk elemen dalam form */
        .form-container .card {
            background-color: #f8f9fa;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 100%;
            /* Menghapus padding agar form menjadi lebih lebar */
            /* padding: 20px; */
            max-width: 600px;
            /* Atur lebar maksimum */
            margin: 0 auto;
            /* Pusatkan form */
        }


        .form-container .form-control {
            width: 100%;
            margin-bottom: 10px;
            padding: 8px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-container .form-control:focus {
            border-color: #80bdff;
            outline: 0;
            box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
        }

        .form-container .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
        }

        .form-container .btn-primary:hover {
            background-color: #0056b3;
        }

        th,
        td {
            text-align: center;
            /* Mengatur isi sel tabel menjadi terpusat */
            padding: 8px;
            border: 1px solid #dddddd;
        }

        @media screen and (max-width: 768px) {
            .form-container .card {
                max-width: 90%;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-dark bg-dark fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Table Produk</a>
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
                            <a class="nav-link" href="table.php">Table Penyewaan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" href="produk.php">Input Produk</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../function/log_out.php">Keluar</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    <br><br><br><br><br>
    <div class="container form-container" id="container">
        <div class="card">
            <form action="../function/proses_form.php" method="POST" enctype="multipart/form-data">
                <label for="gambar">Gambar:</label>
                <input type="file" name="gambar" id="gambar" class="form-control" accept="image/*">

                <label for="nama_paket">Nama Paket:</label>
                <input type="text" name="nama_paket" class="form-control" id="nama_paket">

                <label for="nama_room">Nama Room:</label>
                <input type="text" name="nama_room" class="form-control" id="nama_room">

                <label for="harga">Harga:</label>
                <input type="number" name="harga" class="form-control" id="harga">

                <label for="deskripsi">Deskripsi:</label>
                <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" cols="50"></textarea>

                <label for="fasilitas1">Fasilitas 1:</label>
                <input type="text" name="fasilitas1" class="form-control" id="fasilitas1">

                <label for="fasilitas2">Fasilitas 2:</label>
                <input type="text" name="fasilitas2" class="form-control" id="fasilitas2">

                <label for="fasilitas3">Fasilitas 3:</label>
                <input type="text" name="fasilitas3" class="form-control" id="fasilitas3">

                <label for="fasilitas4">Fasilitas 4:</label>
                <input type="text" name="fasilitas4" class="form-control" id="fasilitas4">

                <label for="fasilitas5">Fasilitas 5:</label>
                <input type="text" name="fasilitas5" class="form-control" id="fasilitas5">

                <label for="fasilitas6">Fasilitas 6:</label>
                <input type="text" name="fasilitas6" class="form-control" id="fasilitas6">

                <input type="submit" class="btn btn-primary" name="submit" value="Submit">
            </form>
        </div>
    </div>
    <main>
        <div class="container-fluid px-4">
            <br /><br /><br />
            <div class="card mb-4" style="box-shadow: 0 3px 3px rgba(0, 0, 0, 0.2)">
                <div class="card-header">
                    <i class="fas fa-table me-1"></i>
                    Data Home Stay
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
                                    <th scope="col">Gambar</th>
                                    <th scope="col">Nama Paket</th>
                                    <th scope="col">Nama Kamar</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Deskripsi</th>
                                    <th scope="col">Fitur 1</th>
                                    <th scope="col">Fitur 2</th>
                                    <th scope="col">Fitur 3</th>
                                    <th scope="col">Fitur 4</th>
                                    <th scope="col">Fitur 5</th>
                                    <th scope="col">Fitur 6</th>
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
                                        <td><img src="../resource/<?= $user['gambar']; ?>" alt="Gambar Pengguna" width="300"></td>
                                        <td><?= $user['nama_paket']; ?></td>
                                        <td><?= $user['nama_room']; ?></td>
                                        <td><?= $user['harga']; ?></td>
                                        <td><?= $user['deskripsi']; ?></td>
                                        <td><?= $user['fasilitas1']; ?></td>
                                        <td><?= $user['fasilitas2']; ?></td>
                                        <td><?= $user['fasilitas3']; ?></td>
                                        <td><?= $user['fasilitas4']; ?></td>
                                        <td><?= $user['fasilitas5']; ?></td>
                                        <td><?= $user['fasilitas6']; ?></td>
                                        <td>
                                            <form action="../function/ubah_produk.php" method="GET">
                                                <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                                <button type="submit" class="btn btn-primary btn-block" onclick="return confirm('Anda yakin ingin mengedit data ini?')">Ubah</button>
                                            </form>
                                            <form action="../function/hapus_produk.php" method="GET">
                                                <input type="hidden" name="id" value="<?= $user['id']; ?>">
                                                <button type="submit" class="btn btn-danger btn-block" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
                                            </form>
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