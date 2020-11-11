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

<?php
include 'koneksi.php';
	$ambil = $connect->query("SELECT * FROM tb_wisata WHERE id = '$_GET[id]'");
	$data = $ambil->fetch_assoc();
?>

<div class="container">
    <div class="card login mx-auto mt-5">
      <div class="card-header" align="center" >Update Wisata</div>
      	<div class="card-body">
		<form align="center" method="post" enctype="multipart/form-data" >
	<div class="form-group">
		<div>
			<input type="file" class="form-data" name="image" value="<?php $data['image']; ?>"><?php echo $data['image']; ?>
		</div>
	</div>
	<div class="form-group">
		<div>
			<input type="text" name="judul" class="form-control" value="<?php echo $data['judul']; ?>">
		</div>
	</div>
	<div class="form-group">
		<div class="form-label-group">
			<textarea name="deskripsi" cols="50" rows="10" class="form-control" ><?php echo $data['deskripsi']; ?></textarea>
		</div>
	</div>
	<div class="form-group">
		<div>
			<input type="text" name="tautan" class="form-control" value="<?php echo $data['tautan']; ?>">
		</div>
	</div>
	<div>
		<div>
			<input type="submit" name="simpan" value="Simpan" class="btn btn-primary btn-sm">
		</div>
	</div>
</form>
</div>
</div>
</div>
<br>
<br>

<?php 
if (isset($_POST['simpan'])) 
{
	$namafoto = $_FILES['image']['name'];
	$lokasifoto = $_FILES['image']['tmp_name'];
	//jika foto diubah
	if (!empty($lokasifoto)) 
	{
		move_uploaded_file($lokasifoto, "../images/images/$namafoto");

		$connect->query("UPDATE tb_wisata SET image = '$namafoto', judul = '$_POST[judul]', deskripsi = '$_POST[deskripsi]', tautan = '$_POST[tautan]' WHERE id = '$_GET[id]' ");
	}else{
		$connect->query("UPDATE tb_wisata SET judul = '$_POST[judul]', deskripsi = '$_POST[deskripsi]', tautan = '$_POST[tautan]' WHERE id = '$_GET[id]' ");
	}
	echo "<script type='text/javascript'>window.alert('Data Wisata Telah Terupdate !!');
		window.location.href='wisata.php';</script>";
}
?>

<?php include ('templates/admin_footer.php'); ?>

<?php
}
?>