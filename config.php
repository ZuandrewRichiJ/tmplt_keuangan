<?php 
$con = mysqli_connect("localhost","root","","keuangan");
 
// cek koneksi
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
