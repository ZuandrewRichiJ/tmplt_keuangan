<?php
include '../config.php';

$Id          = $_POST['Id'];
$Nama        = $_POST['Nama'];
$Username    = $_POST['Username'];
$Password    = $_POST['Password'];

$sql = mysqli_query($con, "UPDATE user SET Nama='$Nama', Username='$Username', Password='$Password' WHERE Id=$Id");
if (!$sql) {
  echo "<script>alert('Gagal di Update!');</script>";
} else {
  echo "<script>alert('Data berhasil di Update!');document.location='index.php';</script>";
}
