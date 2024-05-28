<?php

include("../function/koneksi.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Calender</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
  <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.print.min.css" rel="stylesheet" media="print" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.css" />
  <link rel="stylesheet" href="../admin/style.css" />
  <style>
    @import url("https://fonts.googleapis.com/css2?family=Inknut+Antiqua:wght@300;400;500;600;700;800;900&family=Kaushan+Script&family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap");

    *{
      font-family: Arial, Helvetica, sans-serif;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg bg-dark fixed-top">
    <div class="container ">
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
            <a class="nav-link active text-white" href="calender.php">Calender</a>
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

  <div class="ui container">
    <div class="ui grid">
      <div class="ui sixteen column">
        <div id="calendar"></div>
      </div>
    </div>
  </div>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <script>
    $(document).ready(function() {
      // Submit form
      $("#rentalForm").submit(function(e) {
        e.preventDefault(); // Menghentikan pengiriman form bawaan browser
        var nama_penyewa = $('input[name="nama_penyewa"]').val();
        var check_in = $('input[name="check_in"]').val();
        var check_out = $('input[name="check_out"]').val();
        $.ajax({
          url: "../admin/simpan_data.php",
          type: "POST",
          data: {
            nama_penyewa: nama_penyewa,
            check_in: check_in,
            check_out: check_out,
          },
          success: function(response) {
            alert("Data berhasil disimpan!");
            $("#calendar").fullCalendar("refetchEvents");
          },
          error: function() {
            alert("Gagal menyimpan data!");
          },
        });
      });

      // Initialize FullCalendar
      $("#calendar").fullCalendar({
        header: {
          left: "prev,next today",
          center: "title",
          right: "month,agendaWeek,agendaDay",
        },
        defaultView: "month",
        editable: false,
        eventLimit: true,
        events: "../admin/ambil_data.php",
        error: function() {
          alert("Gagal mengambil data!");
        },
      });
    });
  </script>
</body>

</html>