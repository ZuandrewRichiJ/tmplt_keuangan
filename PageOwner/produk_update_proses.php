<?php
include '../config.php';

$Id         = $_POST['Id'];
$NamaProduk = $_POST['NamaProduk'];
$Harga      = $_POST['Harga'];

$sql = mysqli_query($con, "UPDATE produk SET Nama_produk='$NamaProduk', Harga='$Harga' WHERE Id_produk='$Id' ");
if (!$sql) {
  echo "<script>alert('Gagal di Update!');document.location='index.php?Page=Produk';</script>";
} else {
  echo "<script>alert('Produk berhasil di Update!');document.location='index.php?Page=Produk';</script>";
}
