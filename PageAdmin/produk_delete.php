<?php
include '../config.php';
$Id = $_GET['Id'];

$sql = mysqli_query($con, "DELETE FROM produk WHERE Id_produk='$Id'");

if (!$sql) {
    echo "<script>alert('Produk ini tidak dapat dihapus!');document.location='index.php?Page=Produk';</script>";
} else {
    echo "<script>alert('Produk berhasil dihapus!');document.location='index.php?Page=Produk';</script>";
}
