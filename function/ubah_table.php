<?php

include("koneksi.php");

if (isset($_GET["id"])) {
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM user WHERE id_user ='$id'");
    if ($query->num_rows > 0) {
        $row = mysqli_fetch_assoc($query);

        if (isset($_POST["submit"])) {
            $status = $_POST['status'];

            $query_update = mysqli_query($koneksi, "UPDATE user SET status = '$status' WHERE id_user ='$id' ");

            if ($query_update) {
                echo "<script>alert('Data berhasil diubah');</script>";
                echo "<script>window.location.href='../admin/table.php';</script>";
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
                                    <a class="nav-link active" href="table.php">Table Penyewaan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="produk.php">Input Produk</a>
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

                        <label for="nama">Nama:</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="<?= $row['nama']; ?>" readonly>

                        <label for="nomer">Nama Telepon:</label>
                        <input type="number" name="nomer" class="form-control" id="nomer" value="<?= $row['nomer']; ?>" readonly>

                        <label for="nama_kamar">Nama Kamar:</label>
                        <input type="text" name="nama_kamar" class="form-control" id="nama_kamar" value="<?= $row['nama_kamar']; ?>" readonly>

                        <label for="email">Email:</label>
                        <input type="text" name="email" id="email" class="form-control" value="<?= $row['email']; ?>" readonly></input>

                        <label for="hari">hari:</label>
                        <input type="number" name="hari" class="form-control" id="hari" value="<?= $row['berapa_hari']; ?>" readonly>

                        <label for="paket">Paket:</label>
                        <input type="text" name="paket" class="form-control" id="paket" value="<?= $row['paket']; ?>" readonly>

                        <label for="check_in">Check In:</label>
                        <input type="date" name="check_in" class="form-control" id="check_in" value="<?= $row['check_in']; ?>" readonly>

                        <label for="check_out">Check Out:</label>
                        <input type="date" name="check_out" class="form-control" id="check_out" value="<?= $row['check_out']; ?>" readonly>

                        <label for="total">Total:</label>
                        <input type="number" name="total" class="form-control" id="total" value="<?= $row['total']; ?>" readonly>

                        <label for="status">Status:</label>
                        <select name="status" id="status" class="form-control">
                            <option value="Tidak Lunas" <?php if ($row['status'] == 'tidak_lunas') echo 'selected'; ?>>Tidak Lunas</option>
                            <option value="Lunas" <?php if ($row['status'] == 'lunas') echo 'selected'; ?>>Lunas</option>
                        </select>


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