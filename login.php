<?php
session_start();
include 'config.php';

$Username = $_POST['Username'];
$Password = $_POST['Password'];

$sql = mysqli_query($con, "SELECT * FROM user WHERE Username='$Username' AND Password='$Password'");
$cek = mysqli_num_rows($sql);

if ($cek > 0) {

	$data = mysqli_fetch_assoc($sql);
	//ADMIN
	if ($data['Level'] == "Admin") {
		$_SESSION['Username'] 	= $Username;
		$_SESSION['Id']			= $data['Id'];
		$_SESSION['Level'] 		= "Admin";
		header("location:PageAdmin");
		//SUPPLIER
	} else if ($data['Level'] == "Owner") {
		$_SESSION['Username'] 	= $Username;
		$_SESSION['Id']			= $data['Id'];
		$_SESSION['Level'] 		= "Owner";
		header("location:PageOwner");
	}
} else {
	echo "<script>alert('Username/Password Salah !');history.go(-1);</script>";
}
