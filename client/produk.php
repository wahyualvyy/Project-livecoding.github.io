<?php

include("../function/koneksi.php");



?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Produk</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Kaushan+Script&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap");
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand fs-1 text-white" href="#" style=" font-family: 'Kaushan Script', cursive">Revena</a>

      <button class="navbar-toggler bg-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item me-4 fs-4">
            <a class="nav-link active text-white" aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item me-4 fs-4 ">
            <a class="nav-link text-white" href="../index.php#about">About</a>
          </li>
          <li class="nav-item me-3 fs-4">
            <a class="nav-link text-white" href="../index.php#contact">Contact</a>
          </li>
          <li class="nav-item fs-4">
            <a class="nav-link text-white" href="calender.php">Calender</a>
          </li>
          <li class="nav-item fs-4">
            <a class="nav-link text-white" href="tutorial.html">Tata cara memesan</a>
          </li>
        </ul>
      </div>

    </div>
  </nav>

  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasRightLabel">Navigasi</h5>
      <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body bg-dark">
      <ul class="navbar-nav">
        <li class="nav-item me-4 fs-4">
          <a class="nav-link active text-white" aria-current="page" href="../index.php">Home</a>
        </li>
        <li class="nav-item me-4 fs-4 ">
          <a class="nav-link text-white" href="../index.php#about">About</a>
        </li>
        <li class="nav-item me-3 fs-4">
          <a class="nav-link text-white" href="../index.php#contact">Contact</a>
        </li>
        <li class="nav-item fs-4">
          <a class="nav-link text-white" href="calender.php">Calender</a>
        </li>
        <li class="nav-item fs-4">
          <a class="nav-link text-white" href="tutorial.html">Tata cara memesan</a>
        </li>
      </ul>
    </div>
  </div>

  <br><br><br><br><br><br>
  <section class="main-body">
    <?php
    if (isset($_GET["id"])) {
      $id = $_GET['id'];
      $query =  "SELECT * FROM  produk WHERE id = $id";
      $result = mysqli_query($koneksi, $query);
      if ($result->num_rows > 0) {
        ($row = mysqli_fetch_assoc($result));  ?>
        <div class="container-sm">
          <div class="row">
            <div class="col-lg-8">
              <img src="../resource/<?= $row['gambar'] ?>" class="img" alt="..." height= '50%' width= '100%' style="box-shadow: 0 3px 3px rgba(0,0,0,0.2);">
            </div>
            <div class="col-lg-4" id="kolom">
              <div class="card mb-4 mx-3" style="box-shadow: 0 3px 3px rgba(0,0,0,0.2);">
                <div class="card-body">
                  <h5 class="card-title text-center"><?= $row['nama_room']; ?></h5>
                  <p class="card-text">
                  <div class="container">
                    <div class="row">
                      <div class="col text-center">
                        <?= $row['deskripsi']; ?>
                      </div>
                      <p class="fs-6 ">
                        Fasilitas
                        <li><?= $row['fasilitas1']; ?>
                        </li>
                        <li><?= $row['fasilitas2']; ?></li>
                        <li><?= $row['fasilitas3']; ?>
                        </li>
                        <li><?= $row['fasilitas4']; ?>
                        </li>
                        <li>
                          <?= $row['fasilitas5']; ?>
                        </li>
                        <li>
                          <?= $row['fasilitas6']; ?>
                        </li>
                      </p>
                    </div>
                  </div>
                  </p>
                </div>
                <div class="card-footer text-center">
                  <button class="btn btn-secondary text-black"><?='<a href="form.php?id='. $row['id'].'" style="text-decoration: none; color: black;">Pesan Sekarang</a>'?>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php } else { 
      header('Location: ../index.php');
    }
    }else {
      header('Location: ../index.php');
    } ?>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>