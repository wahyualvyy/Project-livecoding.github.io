<?php

include("koneksi.php");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    if(isset($_GET["id"])) {
    $query_delete = mysqli_query($koneksi, "DELETE FROM produk WHERE id='$id'");

    if ($query_delete) {
        echo "<script>alert('Data berhasil dihapus');</script>";
        echo "<script>window.location.href='../admin/produk.php';</script>";
    }
}
}
var_dump($query_delete);
?>
