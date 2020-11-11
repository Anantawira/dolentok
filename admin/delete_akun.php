<?php
include 'koneksi.php';
$email = $_GET['email'];
$query = mysqli_query($connect,"DELETE FROM tb_login WHERE email='$email' AND status='user'");
if ($query) {
	header("Location:datauser.php?pesan=hapus");
} else {
	echo "<script type='text/javascript'>window.alert('Anda Tidak Dapat Menghapus');
		window.location.href='datauser.php';</script>";
}
?>