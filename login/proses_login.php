<?php
session_start();
include "koneksi.php";

@$email = $_POST['email'];
$pengacak = "p3ng4c4k";
@$password = $_POST['password'];
$password_acak = md5($pengacak.md5($password).$pengacak);
@$kirim = $_POST['kirim'];

$query = "SELECT * FROM tb_login WHERE email = '$email' and password = '$password_acak'";
$hasil = mysqli_query($connect,$query);

$cek = mysqli_num_rows($hasil);

if($cek > 0){
	$data = mysqli_fetch_array($hasil);

	if ($data['status'] == "admin") {		
		$_SESSION['email'] = $data['username'];
		$_SESSION['status'] = "admin";

		header("location:../admin/index.php");

	}else if ($data['status'] == "user") {
		$_SESSION['email'] = $data['username'];
		$_SESSION['status'] = "user";

		header("location:../hal_user.php");

	}else{

		header("location:login.php?pesan=gagal");
	}
}else{

	header("location:login.php?pesan=gagal");
}
?>