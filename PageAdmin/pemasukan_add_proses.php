<?php
//Include file koneksi ke database
include "../config.php";
//menerima nilai dari kiriman form input-barang

$Tanggal    = DATE('Y-m-d', strtotime($_POST["Tanggal"]));
$Produk     = $_POST["Produk"];
$Qty        = $_POST["Qty"];

// menginput data ke database
mysqli_query($con, "INSERT INTO pemasukan VALUES('','$Tanggal','$Produk','$Qty')");

// mengalihkan halaman kembali ke index.php
echo "<script>alert('Transaksi berhasil ditambah!');document.location='index.php?Page=Pemasukan';</script>";
