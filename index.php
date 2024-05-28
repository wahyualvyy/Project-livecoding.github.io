<?php 

include("function/koneksi.php");

$query = mysqli_query($koneksi,"SELECT * FROM produk");

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Dashboard</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="style.css" />
    <style>
      @import url("https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Kaushan+Script&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap");
    </style>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg bg-dark fixed-top">
      <div class="container">
        <a
          class="navbar-brand fs-1 text-white"
          href="#"
          style=" font-family: 'Kaushan Script', cursive"
          >Revena</a
        >

        <button
          class="navbar-toggler bg-white"
          type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"
        > 
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
          <ul class="navbar-nav">
            <li class="nav-item me-4 fs-4">
              <a
                class="nav-link active text-white"
                aria-current="page"
                href="#home"
                >Home</a
              >
            </li>
            <li class="nav-item me-4 fs-4 ">
              <a class="nav-link text-white" href="#about">About</a>
            </li>
            <li class="nav-item me-3 fs-4">
              <a class="nav-link text-white" href="#contact">Contact</a>
            </li>
            <li class="nav-item fs-4">
              <a class="nav-link text-white" href="client/calender.php">Calender</a>
            </li>
            <li class="nav-item fs-4">
              <a class="nav-link text-white" href="client/tutorial.html">Tata cara memesan</a>
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
          <a
            class="nav-link active text-white"
            aria-current="page"
            href="#home"
            >Home</a
          >
        </li>
        <li class="nav-item me-4 fs-4 ">
          <a class="nav-link text-white" href="#about">About</a>
        </li>
        <li class="nav-item me-3 fs-4">
          <a class="nav-link text-white" href="#contact">Contact</a>
        </li>
        <li class="nav-item fs-4">
          <a class="nav-link text-white" href="client/calender.php">Calender</a>
        </li>
        <li class="nav-item fs-4">
          <a class="nav-link text-white" href="client/tutorial.html">Tata cara memesan</a>
        </li>
      </ul>
      </div>
    </div>
    <section>
      <img
        src="resource/Dashboard_background.jpg"
        alt="......"
        width="100%"
        height="30%"
        id="home"
      />
    </section>
    <div class="strip">
      <h2 id="paket" style="margin: 8vh auto"><span>Welcome</span></h2>
      <div class="container">
      <h5 style="line-height: 1.8">
        <center>
          Selamat datang di website homestay kami! Di sini, kami mengundang Anda
          untuk merasakan kehangatan dan kenyamanan rumah kami yang ramah.
          Dengan beragam pilihan akomodasi yang nyaman dan layanan yang
          memuaskan, kami siap menyambut perjalanan Anda dengan senyuman.
          Temukan pengalaman menginap yang tak terlupakan di tempat kami, di
          tengah keindahan alam dan keramahan lokal yang menyenangkan. Segera
          jelajahi dan buat kenangan indah bersama kami!
        </center>
      </h5>
    </div>
    </div>
    <section class="main-body">
      <div class="strip">
        <h2 id="paket" style="margin: 10vh auto;"><span>List Paket</span></h2>
      </div>
      <div class="container">
      <div class="row">
        <?php while ($row = mysqli_fetch_array($query)) { ?>
        <div class="col-md-4">
          <div class="card ms-3 mb-4 me-3" style="box-shadow: 0 3px 3px rgba(0,0,0,0.2);">
          <img src="resource/<?= $row['gambar'];?>" class="card-img-top" alt="..." height="285" />
          <div class="card-body">
            <h5 class="card-title text-center"><?= $row['nama_paket']; ?></h5>
            <p class="card-text">
                <div class="container text-center">
                    <div class="row align-items-center">
                      <div class="col fs-5">
                        <?= $row['nama_room'];?>
                      </div>
                      <div class="col">
                        <div class="v1" style="height: 80px; border-left: 2px solid black; position: relative; left: 50%; "></div>
                      </div>
                      <div class="col fs-5">
                        Rp.<?= $row['harga']; ?>
                        <br>
                        <p style="font-size: 12px;">per mlm</p>
                      </div>
                    </div>
                  </div>
            </p>
          </div>
          <div class="card-footer text-center">
            <button class="btn btn-secondary text-black"><?='<a href="client/produk.php?id='. $row['id'].'" style="text-decoration: none; color: black;">Lihat Lebih Lengkap</a>'?>
            </button>
          </div>
        </div>
      </div>
      <?php } ?>
      </div>
      </div>

    </section>
    
    <!-- Footer -->
    <footer
      class="text-center text-lg-start text-muted"
      style="background-color: #102c57"
    >
      <!-- Section: Social media -->
      <section <!-- Right -->
        <div>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-facebook-f"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-twitter"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-google"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-instagram"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-linkedin"></i>
          </a>
          <a href="" class="me-4 text-reset">
            <i class="fab fa-github"></i>
          </a>
        </div>
        <!-- Right -->
      </section>
      <!-- Section: Social media -->

      <!-- Section: Links  -->
      <section class="">
        <div class="container text-center text-md-start mt-5">
          <!-- Grid row -->
          <div class="row mt-3">
            <!-- Grid column -->
            <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
              <!-- Content -->
              <h6 class="text-uppercase fw-bold mb-4 text-center text-white">
                <i class="fas fa-gem me-3"></i>COMPANY NAME
              </h6>
              <center><hr style="width: 50%; color: white" /></center>
              <p class="text-center text-white">© 2024 Copyright: Revena</p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4" id="about">
              <!-- Links -->
              <h6 class="text-uppercase fw-bold mb-4 text-center text-white">
                ABOUT US
              </h6>
              <center><hr style="width: 50%; color: white" /></center>
              <p class="text-center text-white">
                Kami adalah platform penginapan yang menyediakan beragam pilihan
                akomodasi untuk memenuhi kebutuhan perjalanan Anda. Dari
                Homestay mewah hingga rumah tamu yang ramah, kami menawarkan
                pengalaman menginap yang tak terlupakan dengan layanan yang
                berkualitas dan harga yang bersaing.
              </p>
            </div>
            <!-- Grid column -->

            <!-- Grid column -->
            <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4"id="contact">
              <!-- Links -->
              <h6
                class="text-uppercase fw-bold mb-4 text-center text-white"
              >
                Contact
                <center><hr style="width: 50%;"/></center>
              </h6>
              <p class="text-center text-white">
                <i class="fas fa-home me-3"></i>Whatsapp
              </p>
              <p class="text-center text-white">
                <i class="fas fa-envelope me-3"></i>
                Facebook
              </p>
              <p class="text-center text-white">
                <i class="fas fa-phone me-3"></i>Line
              </p>
              <p class="text-center text-white">
                <i class="fas fa-print me-3"></i>Instagram
              </p>
            </div>
            <!-- Grid column -->
          </div>
          <!-- Grid row -->
        </div>
      </section>
      <!-- Section: Links  -->
    </footer>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
