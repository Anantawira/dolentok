<?php
session_start();
if (!isset($_SESSION['username']) AND !isset($_SESSION['status'])) {
	echo "<script type='text/javascript'>window.alert('Anda Belum Login!!');history.go(-1);</script>";
	exit;
}elseif ($_SESSION['status']!="user") {
	echo "<script type='text/javascript'>window.alert('Anda Tidak Berhak Mengakses!!');history.go(-1);</script>";
}else{
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Selamat Datang</title>
    <link rel="icon" href="images/icon.png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700" rel="stylesheet">

    <link rel="stylesheet" href="css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">

    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/ionicons.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/jquery.timepicker.css">

    
    <link rel="stylesheet" href="css/flaticon.css">
    <link rel="stylesheet" href="css/icomoon.css">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>

	<div id="colorlib-page">
		<a href="#" class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
			<h1 id="colorlib-logo">DOLENTOK.</a></h1>
			<nav id="colorlib-main-menu" role="navigation">
				<ul>
					<li class="colorlib"><a href="hal_user.php">Home</a></li>
					<li><a href="upload_wisata.php">Upload Wisata</a></li>
				</ul>
			</nav>
			<div class="colorlib-footer">
		
			</div>
			<div class="colorlib-footer">
				<ul>
					<li><h3>Hello <?php echo $_SESSION['email']; ?></h3></li>
					<li><a href="logout.php">LogOut</li></a>
				</ul>
			</div>
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
<br>
			 <!-- isi web dolentok -->	
<?php
include "koneksi.php";
$id = $_GET['id'];
$query = "SELECT * FROM tb_wisata WHERE id='$id'";
$hasil = mysqli_query($connect,$query);
$data = mysqli_fetch_array($hasil);
?>
 <div class="col-md-12">
  <div class="blog-entry ftco-animate">
    <div class="img" style="background-image: url(images/images/<?php echo $data['image'];?>)"></div>
      <div class="text pt-2 mt-3">
        <h3 align="center" class="mb-4"><?php echo $data['judul']; ?></h3>
            <p class="col-md-12" style="text-align: justify; text-indent: 1in"><?php echo $data['deskripsi']; ?></p>
              <div class="author mb-4 d-flex align-items-center">
                <div class="ml-3 info">                       
                  </div>
                    </div>
                      <div class="meta-wrap d-md-flex align-items-center">
                        <div class="half order-md-last text-md-right">                        
                         </div>
                         <div class="half order-md-last text-md-right">                          
                         <a style="color: black;"><?php echo $data['nama']; ?></a>, <span style="color: black;"><?php echo $data['tgl']; ?></span></div>
                        <div class="half">
                        <p><a href="<?php echo $data['tautan']; ?>" class="btn btn-primary p-3 px-xl-4 py-xl-3">Telusuri Maps</a></p> 
                    </div>
                  </div>                    
                 </div>
               </div>
             </div>
                   
<?php include "komentar.php"; ?>
		   

  <script src="js/jquery.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.1.3.js"></script>
  <script src="js/jquery.waypoints.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/aos.js"></script>
  <script src="js/jquery.animateNumber.min.js"></script>
  <script src="js/bootstrap-datepicker.js"></script>
  <script src="js/jquery.timepicker.min.js"></script>
  <script src="js/scrollax.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="js/google-map.js"></script>
  <script src="js/main.js"></script>
   
  
  </body>
</html>
<?php 
}
?>