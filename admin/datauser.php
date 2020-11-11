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

        <!-- Breadcrumbs-->
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="index.php">Dashboard</a>
          </li>
          <li class="breadcrumb-item active">Index</li>
        </ol>

        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header">
            <i class="fas fa-table"></i>
            Data User</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Status</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Opsi</th>
                  </tr>
                </thead>
                
                <?php
include 'koneksi.php';
$query = "SELECT * FROM tb_login";
$hasil = mysqli_query($connect,$query);
$no=1;


while ($data=mysqli_fetch_array($hasil)) {
?>

      <tr>
        <td><?php echo $no++;?></td>
        <td><?php echo $data['status'];?></td>        
        <td><?php echo $data['username'];?></td>
        <td><?php echo $data['email'];?></td>
        <td><?php echo $data['password'];?></td>
        
      
        <td><a style="text-decoration : none;" class="fas fa-fw fa-edit fa-lg" href ="update_status.php?email=<?php echo $data['email'];?>"></a>
        <a style="text-decoration : none; color: red;" class="fas fa-fw fa-trash-alt fa-lg" href ="delete_akun.php?email=<?php echo $data['email'];?>"onclick="return confirm('apakah anda yakin ingin menghapus?')"></a></td>
        </tr>
      <?php


}
?>                

              </table>
            </div>
          </div>
          
        </div>

      </div>
      <!-- /.container-fluid -->
<?php include ('templates/admin_footer.php'); ?>

<?php
}
?>