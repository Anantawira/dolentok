<?php
session_start();
if (!isset($_SESSION['username']) AND !isset($_SESSION['status'])) {
  echo "<script type='text/javascript'>window.alert('Anda Belum Login!!');history.go(-1);</script>";
  exit;
}elseif ($_SESSION['status']!="admin") {
  echo "<script type='text/javascript'>window.alert('Anda Tidak Berhak Mengakses!!');history.go(-1);</script>";
}else{
?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Admin Dolentok</title>
  <link rel="icon" href="../images/icon.png">

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

</head>


<body id="page-top">

  <nav class="navbar navbar-expand navbar-dark bg-success static-top">

    <a class="navbar-brand mr-1" href="index.php">Admin Dolentok</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">

    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      
      <li class="nav-item dropdown no-arrow">
        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-user-circle fa-fw"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
          <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Logout</a>
        </div>
      </li>
    </ul>

  </nav>

  <div id="wrapper">

<!-- Sidebar -->
    <ul class="sidebar navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span>
        </a>        

      <li class="nav-item">
        <a class="nav-link" href="datauser.php">
            <i class="fas fa-fw fa-users"></i>
            <span>Data User</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="komentar.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Komentar</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="wisata.php">
          <i class="fas fa-fw fa-plus"></i>
          <span>Wisata</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="upload_wisata.php">
          <i class="fas fa-fw fa-shopping-cart"></i>
          <span>Upload Wisata</span></a>
      </li>
    </ul>

    <div id="content-wrapper">

      <div class="container-fluid">

<?php
include 'koneksi.php';
	$ambil = $connect->query("SELECT * FROM tb_wisata WHERE id = '$_GET[id]'");
	$data = $ambil->fetch_assoc();
?>

<div class="container">
    <div class="card login mx-auto mt-5">
      <div class="card-header" align="center" >Tambah Wisata</div>
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
			<input type="text" name="tautan" class="form-control" placeholder="Tautan Maps">
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

		$connect->query("UPDATE tb_wisata SET image = '$namafoto', judul = '$_POST[judul]', deskripsi = '$_POST[deskripsi]', tautan = '$_POST[tautan]', status = '1' WHERE id = '$_GET[id]' ");
	}else{
		$connect->query("UPDATE tb_wisata SET judul = '$_POST[judul]', deskripsi = '$_POST[deskripsi]', tautan = '$_POST[tautan]', status = '1' WHERE id = '$_GET[id]' ");
	}
	echo "<script type='text/javascript'>window.alert('Data Wisata Telah Diterima !!');
		window.location.href='upload_wisata.php';</script>";
}
?>

<!-- Sticky Footer -->
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright ©AdminDolentok.</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Tekan "Logout" untuk memutuskan untuk Logout.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="logout.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="vendor/datatables/jquery.dataTables.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="js/demo/datatables-demo.js"></script>

</body>

</html>

<?php
}
?>