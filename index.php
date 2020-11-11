<?php
include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Dolentok</title>
    <link rel="icon" href="images/icon.png">

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
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
    <link rel="stylesheet" type="text/css" href="css/search.css">
  </head>
  <body>

	<div id="colorlib-page">
		<a class="js-colorlib-nav-toggle colorlib-nav-toggle"><i></i></a>
		<aside id="colorlib-aside" role="complementary" class="js-fullheight text-center">
			<h1 id="colorlib-logo">DOLENTOK.</a></h1>
			<nav id="colorlib-main-menu" role="navigation">
			</nav>

			<div class="colorlib-footer">
				<h5><a href="login/login.php">Login</h5></a>
			</div>
		</aside> <!-- END COLORLIB-ASIDE -->
		<div id="colorlib-main">
			<div class="hero-wrap js-fullheight" style="background-image: url(images/bg_1.jpg);" data-stellar-background-ratio="0.5">
				<div class="overlay"></div>
				<div class="js-fullheight d-flex justify-content-center align-items-center">
					<div class="col-md-8 text text-center">
						<div class="img mb-4" style="background-image: url(images/logomalang.jpg);"></div>
						<div class="desc">
							<h2 class="subheading">About</h2>
							<h1 class="mb-4">Kota Malang</h1>
							<p class="mb-4">Kota Malang dikenal baik karena dicap sebagai Kota Pendidikan. Kota ini memiliki berbagai perguruan tinggi terbaik seperti Universitas Brawijaya dan Universitas Negeri Malang. Selain itu, kota ini merupakan Kota Pariwisata karena alamnya yang menawan yang dikelilingi oleh pegunungan serta udaranya yang sejuk.</p>							
						</div>
					</div>
				</div>
			</div>
			

          <div class="lg-4 ftco-animate">
              <div class="box">
                <form action="" method="GET" class="search-form">
                  <div class="form-group">
                    <span class="icon icon-search"></span>
                    <input type="text" class="form-control" placeholder="Search" name="cari">
                  </div>
                </form>
              </div>           
          </div>


<?php
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
    <div class="img" style="background-image: url(images/images/<?php echo $data['image'];?>)"></div>
      <div class="text pt-2 mt-3">
          <h3 align="center" class="mb-4"><?php echo $data['judul']; ?></a></h3>
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
    
<script type="text/javascript">
  $(document).ready(function() {
      window.history.pushState(null, "", window.location.href);        
      window.onpopstate = function() {
          window.history.pushState(null, "", window.location.href);
      };
  });
</script>

  </body>
</html>