<?php
include 'koneksi.php';
$id = $_GET['id'];

$query = mysqli_query($connect, "SELECT * FROM tb_wisata WHERE id = '$id'");
$row = mysqli_fetch_array($query);
unlink("../images/images/$row[image]");
mysqli_query($connect, "DELETE FROM tb_wisata WHERE id = '$id'");

header("Location:wisata.php");
?>
