<?php
include("../function/koneksi.php");

// Periksa apakah permintaan datang dari metode POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data yang dikirim dari formulir
    $nama_penyewa = $_POST['nama_penyewa'];
    $check_in = $_POST['check_in'];
    $check_out = $_POST['check_out'];

    // Lakukan penyimpanan data ke dalam database
    $query = "INSERT INTO tb_kalender (nama, check_in, check_out) VALUES ('$nama_penyewa', '$check_in', '$check_out')";
    $result = mysqli_query($koneksi, $query);

    if ($result) {
        // Jika penyimpanan berhasil, kirim respon sukses ke klien
        echo json_encode(array("status" => "success"));
    } else {
        // Jika terjadi kesalahan, kirim respon gagal ke klien
        echo json_encode(array("status" => "error"));
    }
} else {
    // Jika permintaan bukan dari metode POST, kirim respon error
    echo json_encode(array("status" => "error", "message" => "Metode permintaan tidak valid"));
}
?>
