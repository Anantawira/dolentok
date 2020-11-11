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
	$ambil = $connect->query("SELECT * FROM tb_login WHERE email = '$_GET[email]'");
	$data = $ambil->fetch_assoc();
?>

<div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header" align="center" >Update Status User</div>
      	<div class="card-body">
		<form align="center" method="post" action="proses_status.php">
	<div class="form-group">
		<div>
			<label>Status</label>
			<select class="form-control" name="status">
          <option><?php echo $data['status']; ?></option>
          <option>admin</option>
          <option>user</option>   
      </select>
		</div>
	</div>
	<div class="form-group">
		<div>
			<label>Username</label>
			<input type="text" name="username" class="form-control" readonly value="<?php echo $data['username']; ?>">
		</div>
	</div>
	<div class="form-group">
		<div>
			<label>Email</label>
			<input type="text" name="email" class="form-control" readonly value="<?php echo $data['email']; ?>">
		</div>
	</div>
	<div>
		<label>Password(md5)</label>
			<input type="text" name="password" class="form-control" readonly value="<?php echo $data['password']; ?>">
	</div>
	<div>
		<br>
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

<?php include ('templates/admin_footer.php'); ?>

<?php
}
?>