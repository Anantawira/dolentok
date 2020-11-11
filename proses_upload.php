<?php

if (isset($_POST['kirim'])) {
	// the path to store the upload image
	$target = "images/images/".basename($_FILES['image']['name']);

	//connect to the database
	$db = mysqli_connect ("localhost","root","","dolentok");

	//get all them submited data from the from
	session_start();
	$image = $_FILES['image']['name'];
	$judul = $_POST['judul'];
	$deskripsi = $_POST['deskripsi'];
	$status = '0';
	$user = $_SESSION['email'];
	$tanggal = date("d-m-y");

	$sql = "INSERT INTO tb_wisata (image,judul,deskripsi,status,nama,tanggal) VALUES ('$image','$judul','$deskripsi','$status','$user','$tanggal')";
	mysqli_query($db, $sql);
	//stores the submitted data into database and table

	//move the uploads images into the folder
	if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
		echo "<script type='text/javascript'>window.alert('Wisata Berhasil Diupload !!');
		window.location.href='upload_wisata.php';</script>";
	}else{
		echo "<script type='text/javascript'>window.alert('Gagal Menambahkan atau File Gambar Terlalu Besar !!');
		window.location.href='upload_wisata.php';</script>";
	}

}

?>