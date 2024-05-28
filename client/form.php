<?php

include("../function/koneksi.php");


// if (tambah($_POST) > 0) {
//   echo "<script>
//           alert('Sukses memesan');
//           document.location.href = 'total_pembayaran.html';
//         </script>";
// } else {
//   echo "<script>
//           alert('Busted');
//           document.location.href = 'form.php';
//         </script>";

// }
// }

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Form</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Kaushan+Script&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap");
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand fs-1 text-white" href="#" style="font-family: 'Kaushan Script', cursive">Revena</a>

      <button class="navbar-toggler bg-white" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item me-4 fs-4">
            <a class="nav-link active text-white" aria-current="page" href="../index.php">Home</a>
          </li>
          <li class="nav-item me-4 fs-4">
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
        <li class="nav-item me-4 fs-4">
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

  <br /><br /><br /><br /><br /><br />
  <section class="main-body">
    <div class="container">
      <?php
      if (isset($_GET["id"])) {
        $id = $_GET["id"];
        $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id = $id");
        if ($query->num_rows > 0) {
          $row = mysqli_fetch_assoc($query);

      ?>
          <div class="row">
            <div class="col-lg-8">
              <img src="../resource/<?= $row['gambar'] ?>" class="img" alt="..." style="box-shadow: 0 3px 3px rgba(0, 0, 0, 0.2)" />
            </div>
            <div class="col-lg-4" id="kolom">
              <form action="total_pembayaran.php" method="post">
                <div class="card mb-4 mx-2" style="box-shadow: 0 3px 3px rgba(0, 0, 0, 0.2)">
                  <div class="mb-3 mt-4 mx-4">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" aria-describedby="emailHelp" name="nama" required>
                  </div>
                  <div class="mb-3 mx-4">
                    <label for="nama_kamar" class="form-label">Nama Kamar</label>
                    <input type="text" class="form-control" id="nama_kamar" aria-describedby="emailHelp" name="nama_kamar" value="<?= $row['nama_room'] ?>" readonly>
                  </div>
                  <div class="mb-3 mx-4 ">
                    <label for="tanggal" class="form-label">Tanggal Check in</label>
                    <input type="date" class="form-control" id="tanggal_cekin" aria-describedby="emailHelp" name="check_in" required onchange="setMinCheckOut()" min="<?= date('Y-m-d') ?>">
                  </div>
                  <div class="mb-3 mx-4 ">
                    <label for="tanggal" class="form-label">Tanggal Check out</label>
                    <input type="date" class="form-control" id="tanggal_cekout" aria-describedby="emailHelp" name="check_out" required>
                  </div>
                  <div class="mb-3 mx-4">
                    <label for="email" class="form-label">Alamat Email</label>
                    <input type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email" required>
                  </div>
                  <div class="mb-3 mx-4">
                    <label for="hari" class="form-label">Berapa hari</label>
                    <input type="number" class="form-control" id="hari" aria-describedby="emailHelp" name="beberapa_hari" required>
                  </div>
                  <div class="mb-3 mx-4">
                    <label for="nama" class="form-label">NO Whatsapp</label>
                    <input type="number" class="form-control" id="nomer" aria-describedby="emailHelp" name="nomer" required>
                  </div>
                  <input type="hidden" name="status" value="Tidak Lunas">
                  <input type="hidden" name="total" value="<?= $row['harga']; ?>">
                  <input type="hidden" name="paket" value="<?= $row['nama_paket']; ?>">
                  <input type="hidden" name="gambar" value="<?= $row['gambar']; ?>">
                  <div class="card-footer text-center">
                    <button class="btn btn-light text-black" type="submit" name="submit">
                      Lanjutkan Pemesanan
                    </button>
                  </div>
                </div>
              </form>
          <?php } else {
          header('Location: ../index.php');
        }
      } else {
        header('Location: ../index.php');
      } ?>
            </div>
          </div>
    </div>
  </section>
  <script>
    function setMinCheckOut() {
      var checkInDate = new Date(document.getElementById("tanggal_cekin").value);
      var today = new Date();
      if (checkInDate < today) {
        document.getElementById("tanggal_cekout").min = today.toISOString().split('T')[0];
      } else {
        document.getElementById("tanggal_cekout").min = checkInDate.toISOString().split('T')[0];
      }
    }
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>