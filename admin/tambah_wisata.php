<?php
session_start();
if (!isset($_SESSION['username']) AND !isset($_SESSION['status'])) {
  echo "<script type='text/javascript'>window.alert('Anda Belum Login!!');history.go(-1);</script>";
  exit;
}elseif ($_SESSION['status']!="admin") {
  echo "<script type='text/javascript'>window.alert('Anda Tidak Berhak Mengakses!!');history.go(-1);</script>";
}else{
?>

<?php include ('templates/admin_header.php'); ?>

<?php include ('templates/admin_navbar.php'); ?>

<?php include ('templates/admin_sidebar.php'); ?>

    <div id="content-wrapper">

      <div class="container-fluid">
<div class="container">
    <div class="card login mx-auto mt-5">
      <div class="card-header" align="center" >Tambah Wisata</div>
      	<div class="card-body">
		<form align="center" method="post" enctype="multipart/form-data" action="proses_tambah.php">
	<div class="form-group">
		<div>
			<input type="file" name="image" placeholder="Foto" class="form-data">
		</div>
	</div>
	<div class="form-group">
		<div>
			<input type="text" name="judul" placeholder="Masukan Nama Wisata" class="form-control">
		</div>
	</div>
	<div class="form-group">
		<div class="form-label-group">
			<textarea name="deskripsi" cols="50" rows="10" placeholder="Masukan Deskripsi" class="form-control"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div>
			<input type="text" name="tautan" placeholder="Tambahkan Tautan Maps" class="form-control">
		</div>
	</div>
	<div>
		<div>
			<input type="submit" name="kirim" value="Simpan" class="btn btn-primary btn-sm">
		</div>
	</div>
</form>
</div>
</div>
</div>
<br>
<br>

<?php include ('templates/admin_footer.php'); ?>

<?php
}
?>

