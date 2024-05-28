<?php
// Include file koneksi ke database
include("../function/koneksi.php");

// Pastikan bahwa request yang diterima adalah POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan bahwa data event_id telah diterima dari AJAX
    if (isset($_POST["event_id"])) {
        // Ambil event_id dari request
        $event_id = $_POST["event_id"];

        // Buat query untuk menghapus entri dari database berdasarkan event_id
        $query = "DELETE FROM tb_kalender WHERE id_kalender = '$event_id'";

        // Jalankan query
        if (mysqli_query($koneksi, $query)) {
            // Jika query berhasil dijalankan, kirimkan respons sukses ke AJAX
            echo json_encode(array("status" => "success"));
        } else {
            // Jika query gagal dijalankan, kirimkan respons error ke AJAX
            echo json_encode(array("status" => "error", "message" => mysqli_error($koneksi)));
        }
    } else {
        // Jika event_id tidak diterima dari AJAX, kirimkan respons error ke AJAX
        echo json_encode(array("status" => "error", "message" => "Event ID not received"));
    }
} else {
    // Jika request bukan POST, kirimkan respons error ke AJAX
    echo json_encode(array("status" => "error", "message" => "Invalid request method"));
}
?>
