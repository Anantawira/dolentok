<?php
include 'koneksi.php';

$email = $_POST['email'];
$username = $_POST['username'];
$password = $_POST['password'];
$konfirmasi_password = $_POST['konfirmasi_password'];
$status = "user";
$register = $_POST['register'];

//acak password
$pengacak = "p3ng4c4k";
$password_acak = md5($pengacak.md5($password).$pengacak);
if ($password==$konfirmasi_password) {
	if ($register) {
		$query = "INSERT INTO tb_login VALUES ('$email','$username','$password_acak','$status')";
		$hasil = mysqli_query($connect,$query);
		echo "<script type='text/javascript'>window.alert('Register Berhasil');
		window.location.href='login.php';</script>";
	}else{
		echo "<script type='text/javascript'>window.alert('Register Gagal');
		window.location.href='signup.php';</script>";
	}
}else{
	echo "<script type='text/javascript'>window.alert('Password Tidak Sama!!');
		window.location.href='daftar.php';</script>";
}

 ?>