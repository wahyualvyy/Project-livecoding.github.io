<?php

include("../function/koneksi.php");


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "../phpmailer/src/Exception.php";
require "../phpmailer/src/PHPMailer.php";
require "../phpmailer/src/SMTP.php";


if (isset($_POST["submit"])) {
  $gambar = htmlspecialchars($_POST["gambar"]);
  $nama = htmlspecialchars($_POST["nama"]);
  $check_in = htmlspecialchars($_POST["check_in"]);
  $check_out = htmlspecialchars($_POST["check_out"]);
  $email = htmlspecialchars($_POST["email"]);
  $beberapa_hari = htmlspecialchars($_POST["beberapa_hari"]);
  $nomer = htmlspecialchars($_POST["nomer"]);
  $nama_kamar = htmlspecialchars($_POST["nama_kamar"]);
  $status = htmlspecialchars($_POST["status"]);
  $paket = htmlspecialchars($_POST["paket"]);
  $harga = htmlspecialchars($_POST["total"]);

  $total_harga = $harga * $beberapa_hari;
  $query = "INSERT INTO user (nama, check_in, check_out, email, berapa_hari, nomer, nama_kamar, status, paket, total) VALUES ('$nama','$check_in','$check_out','$email','$beberapa_hari','$nomer','$nama_kamar','$status','$paket','$total_harga')";

  if (mysqli_query($koneksi, $query)) {
    // Jika query berhasil dijalankan, tidak perlu tindakan tambahan
  } else {
    echo mysqli_error($koneksi);
  }
  $mail = new PHPMailer(true);
  $mail->isSMTP();
  $mail->Host = "smtp.gmail.com";
  $mail->SMTPAuth = true;
  $mail->Username = "wahyualvy@gmail.com";
  $mail->Password = "ygdwehsnowanxuvb";
  $mail->SMTPSecure = "ssl";
  $mail->Port = 465;

  $mail->setFrom('wahyualvy@gmail.com');

  $mail->addAddress($email);

  $mail->isHTML(true);

  $mail->Subject = 'Pembayaran kamar';
  $mail->Body = "
            <html>
            <head>
                <style>
                    body {
                        font-family: Arial, sans-serif;
                        background-color: #f4f4f4;
                        margin: 0;
                        padding: 0;
                    }
                    .container {
                        max-width: 600px;
                        margin: 20px auto;
                        background-color: #fff;
                        padding: 20px;
                        border-radius: 8px;
                        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                    }
                    h1 {
                        text-align: center;
                        color: #333;
                        margin-bottom: 20px;
                    }
                    ul {
                        list-style-type: none;
                        padding: 0;
                    }
                    li {
                        margin-bottom: 10px;
                        padding-left: 20px;
                        position: relative;
                    }
                    li strong {
                        display: inline-block;
                        width: 150px;
                        font-weight: bold;
                    }
                    .payment-details {
                        background-color: #f9f9f9;
                        border-left: 4px solid #4CAF50;
                        padding: 10px;
                    }
                    .rekening {
                        background-color: #f9f9f9;
                        border-left: 4px solid #ff9933;
                        padding: 10px;
                    }
                </style>
            </head>
            <body>
                <div class='container'>
                    <h1>Detail Pembayaran Kamar</h1>
                    <ul>
                        <li><strong>Nama:</strong> $nama</li>
                        <li><strong>Paket:</strong> $paket</li>
                        <li><strong>Nomor Telepon:</strong> $nomer</li>
                        <li><strong>Email:</strong> $email</li>
                        <li><strong>Berapa hari:</strong> $beberapa_hari</li>
                        <li><strong>Tanggal Pesan:</strong> $check_in</li>
                        <li><strong>Tanggal Akhir:</strong> $check_out</li>
                        <li class='payment-details'><strong>Total Harga:</strong> Rp.$total_harga</li>
                        <li class='payment-details'><strong>Status Pembayaran:</strong> $status</li>
                    </ul>
                    <h1>Silakan Bayar Dengan Nomor Rekening Dibawah ini</h1>
                    <div class='rekening'><strong>Nomor Rekening :</strong> 210381203812</div>
                </div>
            </body>
            </html>";



  // Kirim email
  if ($mail->send()) {
    echo 'Email berhasil dikirim';
  } else {
    echo 'Email gagal dikirim';
  }
} else {
  header('Location: ../index.php');
}
?>





<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Informasi pembayaran</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Kaushan+Script&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap");

    .info-container {
      background-color: #f9f9f9;
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }

    .info-container ul {
      list-style-type: none;
      padding: 0;
    }

    .info-container ul li {
      margin-bottom: 10px;
    }

    .info-container ul li span {
      font-weight: bold;
      color: #333;
    }
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
    <div class="container-sm">
      <div class="row">
        <div class="col-lg-8">
          <img src="../resource/<?= $gambar ?>" class="img" alt="..." style="box-shadow: 0 3px 3px rgba(0,0,0,0.2);">
        </div>
        <div class="col-lg-4" id="kolom">
          <div class="card mb-4 mx-3" style="box-shadow: 0 3px 3px rgba(0,0,0,0.2);">
            <div class="card-body">
              <h5 class="card-title text-center">Informasi Pembayaran</h5>
              <p class="card-text">
              <div class="container">
                <div class="row">
                  <p class="fs-6 ">
                  <div class="container">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="info-container">
                          <ul>
                            <li><span>Nama:</span> <?= $nama; ?></li>
                            <li><span>Paket:</span> <?= $paket; ?></li>
                            <li><span>Nomer Telepon:</span> <?= $nomer; ?></li>
                            <li><span>Email:</span> <?= $email; ?></li>
                            <li><span>Berapa hari:</span> <?= $beberapa_hari; ?></li>
                            <li><span>Tanggal pesan:</span> <?= $check_in; ?></li>
                            <li><span>Tanggal akhir:</span> <?= $check_out; ?></li>
                            <li><span>Total Harga:</span> Rp.<?= $total_harga; ?></li>
                            <li><span>Status Pembayaran:</span> <?= $status; ?></li>
                          </ul>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="card-footer text-center">
                  <button class="btn btn-secondary text-black"><a href="https://web.whatsapp.com/send/?phone=6281230035681&text&type=phone_number&app_absent=0" style="text-decoration: none; color: black;" target="_blank">Bayar Sekarang</a>
                  </button>
                </div>
              </div>
            </div>
          </div>
        </div>
  </section>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>