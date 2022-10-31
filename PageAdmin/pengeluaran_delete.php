<?php
include '../config.php';
$Id = $_GET['Id'];

$sql = mysqli_query($con, "DELETE FROM pengeluaran WHERE Id_keluar='$Id'");

if (!$sql) {
    echo "<script>alert('Data ini tidak dapat dihapus!');document.location='index.php?Page=Pengeluaran';</script>";
} else {
    echo "<script>alert('Data berhasil dihapus!');document.location='index.php?Page=Pengeluaran';</script>";
}
