<?php
//memanggil file koneksi php
include "koneksi.php";
$nama = $_POST['nama'];
$komen = $_POST['komen'];

$mysqli  = "INSERT INTO tb_komentar (nama, komen) VALUES ('$nama', '$komen')";
$result  = mysqli_query($connect, $mysqli);
echo "<script type='text/javascript'>window.alert('Komentar Berhasil Dikirim');
		window.location.href='komentar.php';</script>";

?>