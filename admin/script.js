// $(document).ready(function () {
//   $("#rentalForm").submit(function (e) {
//     e.preventDefault(); // Menghentikan pengiriman form bawaan browser

//     // Ambil data dari form
//     var nama_penyewa = $('input[name="nama_penyewa"]').val();
//     var check_in = $('input[name="check_in"]').val();
//     var check_out = $('input[name="check_out"]').val();

//     // Kirim data ke server menggunakan AJAX
//     $.ajax({
//       url: "simpan_data.php", // Ganti dengan URL untuk menyimpan data
//       type: "POST", // Menggunakan metode POST
//       data: {
//         nama_penyewa: nama_penyewa,
//         check_in: check_in,
//         check_out: check_out,
//       },
//       success: function (response) {
//         alert("Data berhasil disimpan!");
//         // Refresh kalender setelah data disimpan
//         $("#calendar").fullCalendar("refetchEvents");
//       },
//       error: function () {
//         alert("Gagal menyimpan data!");
//       },
//     });
//   });

//   $("#calendar").fullCalendar({
//     header: {
//       left: "prev,next today",
//       center: "title",
//       right: "month,agendaWeek,agendaDay",
//     },
//     defaultView: "month",
//     editable: false,
//     eventLimit: true,
//     events: {
//       url: "ambil_data.php",
//       type: "GET",
//       error: function () {
//         alert("Gagal mengambil data!");
//       },
//     },
//   });
// });
{/* <script>
document.addEventListener('DOMContentLoaded', function() {
  var calendarE1 = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarE1, {
    initialView: 'dayGridMonth',
    events: [
      <?php
      require_once('../function/koneksi.php');
      $coba = mysqli_query($koneksi, 'SELECT * FROM tb_kalender');

      foreach ($coba as $row) :
      ?> {
          title: '<?= $row['nama']; ?>',
          start: '<?= $row['check_in']; ?>',
          end: '<?= $row['check_out']; ?>'
        },
      <?php
      endforeach;
      ?>
    ]
  });
  calendar.render();
});
</script> */}