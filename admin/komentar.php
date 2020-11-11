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
            Data Komentar</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Wisata</th>
                    <th>Username</th>                    
                    <th>Komentar</th>                                
                    <th>Opsi</th>
                  </tr>
                </thead>
   <tbody>
    <?php
    include "koneksi.php";
    $query = "SELECT a.* ,b.judul AS judul FROM tb_komentar a INNER JOIN tb_wisata b ON a.id_wisata = b.id";
    $hasil = mysqli_query($connect,$query);
    $no = 1;

    while ($data=mysqli_fetch_array($hasil)){
        ?>
        <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo $data['judul']; ?></td>
        <td><?php echo $data['nama']; ?></td>
        <td><?php echo $data['komentar']; ?></td>
        <td><a style="text-decoration : none; color: red;" class="fas fa-fw fa-trash-alt fa-lg" href ="delete_komentar.php?id=<?php echo $data['id'];?>"onclick="return confirm('apakah anda yakin ingin menghapus?')"></a></td>                 
        </tr>
        <?php
    }
    ?>
                </tbody>      
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