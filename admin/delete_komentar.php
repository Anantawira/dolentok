<?php
include 'koneksi.php';
$id = $_GET['id'];
mysqli_query($connect,"DELETE FROM tb_komentar WHERE id = '$id'");

header("Location:komentar.php?pesan=hapus");
?>