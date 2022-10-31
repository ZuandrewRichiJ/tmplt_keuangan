<?php
include '../config.php';

$Id         = $_POST['Id'];
$Tanggal    = DATE('Y-m-d', strtotime($_POST["Tanggal"]));
$Keterangan = $_POST['Keterangan'];
$Nominal    = $_POST['Nominal'];

$sql = mysqli_query($con, "UPDATE pengeluaran SET Tanggal='$Tanggal', Keterangan='$Keterangan', Nominal='$Nominal' WHERE Id_keluar='$Id' ");
if (!$sql) {
    echo "<script>alert('Gagal di Update!');document.location='index.php?Page=Pengeluaran';</script>";
} else {
    echo "<script>alert('Data berhasil di Update!');document.location='index.php?Page=Pengeluaran';</script>";
}
