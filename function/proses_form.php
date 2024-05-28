<?php
include("koneksi.php");

if (isset($_POST["submit"])) {
    $nama_paket = strtoupper($_POST["nama_paket"]);
    $nama_room = $_POST["nama_room"];
    $harga = $_POST["harga"];
    $deskripsi = $_POST["deskripsi"];
    $fasilitas1 = $_POST["fasilitas1"];
    $fasilitas2 = $_POST["fasilitas2"];
    $fasilitas3 = $_POST["fasilitas3"];
    $fasilitas4 = $_POST["fasilitas4"];
    $fasilitas5 = $_POST["fasilitas5"];
    $fasilitas6 = $_POST["fasilitas6"];

    $target_dir = "../resource/";
    $target_file = $target_dir . basename($_FILES["gambar"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));


    if (file_exists($target_file)) {
        echo "Maaf, file gambar sudah ada.";
        $uploadOk = 0;
    }


    if ($uploadOk == 0) {
        echo "Maaf, file gambar tidak terupload.";
    } else {
        if (move_uploaded_file($_FILES["gambar"]["tmp_name"], $target_file)) {

            $gambar = basename($_FILES["gambar"]["name"]);


            $query = "INSERT INTO produk (gambar, nama_paket, nama_room, harga, deskripsi, fasilitas1, fasilitas2, fasilitas3, fasilitas4, fasilitas5, fasilitas6) 
                      VALUES ('$gambar', '$nama_paket', '$nama_room', '$harga', '$deskripsi', '$fasilitas1', '$fasilitas2', '$fasilitas3', '$fasilitas4', '$fasilitas5', '$fasilitas6')";


            if ($koneksi->query($query) === TRUE) {
                echo "<script>alert('Data berhasil disimpan');</script>";
                echo "<script>window.location.href='../admin/produk.php';</script>";
                exit();
            } else {
                echo "Error: " . $query . "<br>" . $koneksi->error;
            }
        } else {
            echo "Maaf, terjadi kesalahan saat mengupload file gambar.";
        }
    }

    $koneksi->close();
}
