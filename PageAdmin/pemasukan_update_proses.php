<?php
include '../config.php';

$Id         = $_POST['Id'];
$Tanggal    = DATE('Y-m-d', strtotime($_POST["Tanggal"]));
$Produk     = $_POST['Produk'];
$Qty        = $_POST['Qty'];

$sql = mysqli_query($con, "UPDATE pemasukan SET Tanggal='$Tanggal', Id_produk='$Produk', Qty='$Qty' WHERE Id_masuk='$Id' ");
if (!$sql) {
    echo "<script>alert('Gagal di Update!');document.location='index.php?Page=Pemasukan';</script>";
} else {
    echo "<script>alert('Data berhasil di Update!');document.location='index.php?Page=Pemasukan';</script>";
}
