<?php

include 'koneksi.php';

$status = $_POST['status'];
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];


//query update
$query = "UPDATE tb_login SET status = '$status' WHERE email = '$email' ";

if (mysqli_query($connect, $query)) {
	echo "<script type='text/javascript'>window.alert('Status Akun Telah Diganti !!');
		window.location.href='datauser.php';</script>";
	
}
else{
	echo "<script type='text/javascript'>window.alert('Maaf Anda Gagal Mengganti !!');
		window.location.href='proses_status.php';</script>";
}

mysqli_close($connect);
?>