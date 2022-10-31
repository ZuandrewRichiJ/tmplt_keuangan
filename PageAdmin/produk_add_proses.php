<?php
include '../config.php';

// menangkap data yang di kirim dari form
$NamaProduk = $_POST['NamaProduk'];
$Harga      = $_POST['Harga'];

// menginput data ke database
mysqli_query($con, "INSERT INTO produk VALUES('','$NamaProduk','$Harga')");

// mengalihkan halaman kembali ke index.php
echo "<script>alert('Produk berhasil ditambah!');document.location='index.php?Page=Produk';</script>";
