    
        <div class="text-center" style="margin-bottom: 30px;">
          <h2 class="mb-4">Komentar</h2>
        </div>
<?php 
  error_reporting(0);
  include 'koneksi.php';
  $id = $_GET['id'];
  $judul = $_GET['judul'];
  $query = "SELECT * FROM tb_komentar WHERE id_wisata ='$id'";
  $hasil = mysqli_query($connect,$query);
  while($data = mysqli_fetch_array($hasil)){
?>
  <div class="container">
    <table class="mosh-table">
      <tr>
          <td><p style="color: black;" class="col-md-12"><?php echo $data['nama']; ?>, <?php echo $data['tanggal']; ?> : <p class="col-md-12">"<?php echo $data['komentar']; ?>"</p></p></td>
      </tr>      
    </table>
    <hr>
  </div>
<?php 
} 
?>
<div class="komentar-row">
            <div class="komentar-col">
              <form method="post" action="">
              <input type="hidden" name="id_komentar">                
                <div class="form-group">
                  <textarea name="komentar" cols="10" rows="3" class="form-control" placeholder="Isikan Komentar Anda.."></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" name="kirim" value="Kirim" class="btn btn-primary py-2 px-4">
                </div>
              </form>
            </div>
<?php
 if (isset($_POST['kirim'])) { 
    $id_komentar = $_GET['id_komentar']; 
    $nama = $_SESSION['email'];
    $komen = $_POST['komentar'];
    $tanggal = date("d-m-y");


    $query = "INSERT INTO tb_komentar (id,nama,tanggal,komentar,id_wisata,judul)VALUES ('$id_komentar', '$nama', '$tanggal', '$komen', '$id', '$judul')";
    $hasil = mysqli_query($connect, $query);  
      echo "<script type='text/javascript'>window.location.href='detail_wisata.php?id=$id'; </script>";
  }

?> 