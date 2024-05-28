<?php
session_start();
include("../function/koneksi.php");

if(!isset($_SESSION["nama"])){
  header("Location: login.php");
  exit();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous" />
  <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.print.min.css' rel='stylesheet' media='print' />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.css">
  <link rel="stylesheet" href="style.css">
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
      <a class="navbar-brand" href="#">Tanggal Penyewaan</a>
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
              <a class="nav-link active" aria-current="page" href="admin.php">Calender Penyewaan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="table.php">Table Penyewaan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="produk.php">Input Produk</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../function/log_out.php">Keluar</a>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </nav>

  <br><br><br>
  <br>
  <div class="ui container">
    <div class="ui grid">
      <div class="ui eight wide column" style="box-shadow: 0 3px 3px rgba(0,0,0,0.2);">
        <form method="post" id="rentalForm" class="ui form" action="simpan_data.php">
          <div class="field">
            <label>Nama Penyewa</label>
            <input type="text" name="nama_penyewa" placeholder="Nama Penyewa">
          </div>
          <div class="field">
            <label>Check-in</label>
            <input type="date" name="check_in">
          </div>
          <div class="field">
            <label>Check-out</label>
            <input type="date" name="check_out">
          </div>
          <button class="ui button primary" type="submit">Simpan</button>
        </form>
      </div>
      <div class="ui eight wide column">
        <div id="calendar"></div>
      </div>
    </div>
  </div>
  <br><br><br><br>
  <div class="card mb-4" style="box-shadow: 0 3px 3px rgba(0, 0, 0, 0.2)">
    <div class="card-header">
      <i class="fas fa-table me-1"></i>
      Data tabel pesanan
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
              <th scope="col">Check in</th>
              <th scope="col">Check out</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $ambil = mysqli_query($koneksi, "SELECT * FROM tb_kalender");

            $a = 1;
            foreach ($ambil as $user) {
            ?>
              <tr>
                <th scope="row"><?= $a; ?></th>
                <td><?= $user['nama']; ?></td>
                <td><?= $user['check_in']; ?></td>
                <td><?= $user['check_out']; ?></td>
                <td>
                  <form action="../function/hapus_pesan.php" method="GET">
                    <input type="hidden" name="id" value="<?= $user['id_kalender']; ?>">
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Anda yakin ingin menghapus data ini?')">Hapus</button>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.7/semantic.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.17.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.1.0/fullcalendar.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

  <!-- <script src="script.js"></script> -->
  <script>
    $(document).ready(function() {
      // Submit form
      $('#rentalForm').submit(function(e) {
        e.preventDefault(); // Menghentikan pengiriman form bawaan browser
        var nama_penyewa = $('input[name="nama_penyewa"]').val();
        var check_in = $('input[name="check_in"]').val();
        var check_out = $('input[name="check_out"]').val();
        $.ajax({
          url: 'simpan_data.php',
          type: 'POST',
          data: {
            nama_penyewa: nama_penyewa,
            check_in: check_in,
            check_out: check_out
          },
          success: function(response) {
            alert('Data berhasil disimpan!');
            $('#calendar').fullCalendar('refetchEvents');
          },
          error: function() {
            alert('Gagal menyimpan data!');
          }
        });
      });

      // Initialize FullCalendar
      $('#calendar').fullCalendar({
        header: {
          left: 'prev,next today',
          center: 'title',
          right: 'month,agendaWeek,agendaDay'
        },
        defaultView: 'month',
        editable: false,
        eventLimit: true,
        events: 'ambil_data.php',
        eventClick: function(calEvent, jsEvent, view) {
          var confirmDelete = confirm("Apakah Anda yakin ingin menghapus acara ini?");
          if (confirmDelete) {
            // Cetak id acara ke konsol browser sebelum mengirimkan permintaan
            console.log(calEvent.id);
            $.ajax({
              url: 'hapus_data.php',
              type: 'POST',
              data: {
                event_id: calEvent.id
              },
              success: function(response) {
                alert('Acara berhasil dihapus!');
                $('#calendar').fullCalendar('refetchEvents');
              },
              error: function() {
                alert('Gagal menghapus acara!');
              }
            });
          }
        },
        error: function() {
          alert('Gagal mengambil data!');
        }
      });
    });
  </script>

</body>

</html>