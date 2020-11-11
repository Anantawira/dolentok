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
			<section class="home-slider js-fullheight owl-carousel">
	      <div class="slider-item js-fullheight" style="background-image:url(images/Malang2.jpg);">
	      	<div class="overlay"></div>
	        <div class="container-fluid">
	          <div class="row no-gutters slider-text slider-text-2 js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
	          <div class="col-md-10 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
	            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">DOLENTOK.</h1>
	            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Malang penuh dengan wisata</p>
	          </div>
	        </div>
	        </div>
	      </div>

	      <div class="slider-item js-fullheight" style="background-image:url(images/Malang1.jpg);">
	      	<div class="overlay"></div>
	        <div class="container-fluid">
	          <div class="row no-gutters slider-text slider-text-2 js-fullheight align-items-center justify-content-center" data-scrollax-parent="true">
	          <div class="col-md-10 text-center ftco-animate" data-scrollax=" properties: { translateY: '70%' }">
	            <h1 class="mb-4" data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Explore Malangmu</h1>
	            <p data-scrollax="properties: { translateY: '30%', opacity: 1.6 }">Temukan wisata tujuanmu di sini</p>
	          </div>
	        </div>
	        </div>
	      </div>
	    </section>

			 <!-- isi web dolentok -->	
		    <br>
			 <div class="lg-4 ftco-animate">
	            <div class="box">
	              <form action="#" class="search-form">
	                <div class="form-group">
	                  <span class="icon icon-search"></span>
	                  <input type="text" class="form-control" placeholder="Search" name="cari">
	                </div>
	              </form>
	            </div>           
	        </div>

<?php
include 'koneksi.php';
$cari = @$_GET['cari'];
?>
<?php
 $query = "SELECT * from tb_wisata where  status ='1'AND judul like '%$cari%'";
        $result = mysqli_query($connect, $query);
 if (mysqli_num_rows($result) > 0) {
 while($data=$result->fetch_assoc()){
?>
 <div class="col-md-12">
  <div class="blog-entry ftco-animate">
    <a href="detail_wisata.php?id=<?php echo $data['id']; ?>"><div class="img" style="background-image: url(images/images/<?php echo $data['image'];?>)"></div></a>
      <div class="text pt-2 mt-3">
          <a href="detail_wisata.php?id=<?php echo $data['id']; ?>"><h3 align="center" class="mb-4"><?php echo $data['judul']; ?></a></h3>
            <p class="col-md-12" style="text-align: justify; text-indent: 1in"><?php echo $data['deskripsi']; ?></p>
              <div class="author mb-4 d-flex align-items-center">
                <div class="ml-3 info">                       
                  </div>
                    </div>
                      <div class="meta-wrap d-md-flex align-items-center">
                        <div class="half order-md-last text-md-right">                        
                         </div>
                        <div class="half">
                                             
                    </div>
                  </div>                    
                 </div>
               </div>
             </div>
    <?php
 }
      } else {
        echo "<h4 align='center'>Maaf Data tidak ditemukan !! 
        <br>
        <br>";

 }
 ?>



  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


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

