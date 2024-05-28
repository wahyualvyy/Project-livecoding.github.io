<?php

include("koneksi.php");

if (isset($_GET["id"])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id ='$id'");
    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);

        if (isset($_POST["submit"])) {
            $nama_paket = strtoupper($_POST["nama_paket"]);
            $nama_room = $_POST["nama_room"];
            $harga = $_POST["harga"];
            $deskripsi = $_POST["deskripsi"];
            $fasilitas1 = $_POST["fasilitas1"];
            $fasilitas2 = $_POST["fasilitas2"];
            $fasilitas3 = $_POST["fasilitas3"];
            $fasilitas4 = $_POST["fasilitas4"];
            $fasilitas5 = $_POST["fasilitas5"];
            $fasilitas6 = $_POST["fasilitas6"];

                    $query_update = "UPDATE produk 
                    SET 
                    nama_paket='$nama_paket', 
                    nama_room='$nama_room', 
                    harga='$harga', 
                    deskripsi='$deskripsi', 
                    fasilitas1='$fasilitas1', 
                    fasilitas2='$fasilitas2', 
                    fasilitas3='$fasilitas3', 
                    fasilitas4='$fasilitas4', 
                    fasilitas5='$fasilitas5', 
                    fasilitas6='$fasilitas6' 
                    WHERE id='$id'";
                
                $update = mysqli_query($koneksi, $query_update);

                    if ($query_update) {
                        echo "<script>alert('Data berhasil disimpan');</script>";
                        echo "<script>window.location.href='../admin/produk.php';</script>";
                    } 
        }

?>


        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Ubah Data User</title>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
            <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
            <style>
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

                .form-container .card {
                    background-color: #f8f9fa;
                    border-radius: 8px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
                    padding: 20px;
                    width: 100%;
                    max-width: 400px;
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
                                    <a class="nav-link" href="table.php">Table Penyewaan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link active" href="produk.php">Input Produk</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="login.php">Keluar</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
            <br><br><br><br><br>
            <div class="container form-container" id="container">
                <div class="card">
                    <form action="" method="POST" enctype="multipart/form-data">


                        <label for="nama_paket">Nama Paket:</label>
                        <input type="text" name="nama_paket" class="form-control" id="nama_paket" value="<?= $row['nama_paket']; ?>">

                        <label for="nama_room">Nama Room:</label>
                        <input type="text" name="nama_room" class="form-control" id="nama_room" value="<?= $row['nama_room']; ?>">

                        <label for="harga">Harga:</label>
                        <input type="text" name="harga" class="form-control" id="harga" value="<?= $row['harga']; ?>">

                        <label for="deskripsi">Deskripsi:</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" rows="4" cols="50"><?= $row['deskripsi']; ?></textarea>

                        <label for="fasilitas1">Fasilitas 1:</label>
                        <input type="text" name="fasilitas1" class="form-control" id="fasilitas1" value="<?= $row['fasilitas1']; ?>">

                        <label for="fasilitas2">Fasilitas 2:</label>
                        <input type="text" name="fasilitas2" class="form-control" id="fasilitas2" value="<?= $row['fasilitas2']; ?>">

                        <label for="fasilitas3">Fasilitas 3:</label>
                        <input type="text" name="fasilitas3" class="form-control" id="fasilitas3" value="<?= $row['fasilitas3']; ?>">

                        <label for="fasilitas4">Fasilitas 4:</label>
                        <input type="text" name="fasilitas4" class="form-control" id="fasilitas4" value="<?= $row['fasilitas4']; ?>">

                        <label for="fasilitas5">Fasilitas 5:</label>
                        <input type="text" name="fasilitas5" class="form-control" id="fasilitas5" value="<?= $row['fasilitas5']; ?>">

                        <label for="fasilitas6">Fasilitas 6:</label>
                        <input type="text" name="fasilitas6" class="form-control" id="fasilitas6" value="<?= $row['fasilitas6']; ?>">

                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    </form>
            <?php
        }
    }
            ?>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        </body>

        </html>