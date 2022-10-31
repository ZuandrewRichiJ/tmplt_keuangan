<?php
//Include file koneksi ke database
include "../config.php";
//menerima nilai dari kiriman form input-barang

$Tanggal    = DATE('Y-m-d', strtotime($_POST["Tanggal"]));
$Keterangan = $_POST['Keterangan'];
$Nominal    = $_POST['Nominal'];

// menginput data ke database
mysqli_query($con, "INSERT INTO pengeluaran VALUES('','$Tanggal','$Keterangan','$Nominal')");

// mengalihkan halaman kembali ke index.php
echo "<script>alert('Transaksi berhasil ditambah!');document.location='index.php?Page=Pengeluaran';</script>";
