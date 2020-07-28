<?php
session_start();
?>
<!--
if (!isset($_SESSION['activeUser'])) {
	header("location:login.php?error=nologin");
}
require("connection.php");
$sql="select * from items";
$rs=$db->query($sql);
?-->

<!DOCTYPE html>
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="codepixer">
		<!-- Meta Description -->
		<meta name="description" content="">
		<!-- Meta Keyword -->
		<meta name="keywords" content="">
		<!-- meta character set -->
		<meta charset="UTF-8">
		<!-- Site Title -->
		<title>Coffee</title>

		<link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet"> 
			<!--
			CSS
			============================================= -->
			<link rel="stylesheet" href="css/linearicons.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/nice-select.css">					
			<link rel="stylesheet" href="css/animate.min.css">
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>

			  <header id="header" id="home" >
				<div class="header-top">
		  			<div class="container">
				  		<div class="row justify-content-end">
				  			<div class="col-lg-8 col-sm-4 col-8 header-top-right no-padding">
				  				<ul>
				  					<li>
				  						Mon-Fri: 8am to 2pm
				  					</li>
				  					<li>
				  						Sat-Sun: 11am to 4pm
				  					</li>
				  					<li>
				  						<a href="tel:(012) 6985 236 7512">(012) 6985 236 7512</a>
				  					</li>				  					
				  				</ul>
				  			</div>
				  		</div>			  					
		  			</div>
				</div>			  	
			    <div class="container">
			    	<div class="row align-items-center justify-content-between d-flex">
				      <div id="logo">
				        <a href="#"><img src="img/logo1.png" alt="" title="" /><h4 class="text-white">Choco 'n Chuckle</h4></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="index.php">Home</a></li>
				          <li><a href="menu.php">Menu</a></li>
				          <?php if(!isset($_SESSION['activeUser'])){ ?>
				          <li><a href="emplogin.php">Login</a></li>
				          <?php }
				          else{ ?>
				          	<li class="menu-has-children"><a href="account-info.php">My Account</a>
				            <ul>
				              <li><a href="account-info.php">Account Info</a></li>
				              <li><a href="myorders.php">My Orders</a></li>
				              <li><a href="saved-addresses.php">My Addresses</a></li>
				            </ul>
				          </li>
				          <li><a href="cart.php">My Cart</a></li>
				          	<li><a href="emplogin.php?btn=logout">Logout</a></li>
				          	<?php } ?>
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header>
			  <!-- #header -->
			  <!-- start banner Area -->
			<section class="banner-area" id="home">	
				<div class="container">
					<div class="row fullscreen d-flex align-items-center justify-content-start">
						<!--div class="banner-content col-lg-7">
							<h6 class="text-white text-uppercase">Now you can feel the Energy</h6>
							<h1>
								Welcome <br>
								to Cafe				
							</h1>
							<?php if(!isset($_SESSION['activeUser'])){ ?>
							<a href="login.php" class="primary-btn text-uppercase">Buy Now</a>
						<?php } ?>
						</div-->											
					</div>
				</div>
			</section>
			<!-- End banner Area -->
			<!-- Start video-sec Area -->
			<section class="video-sec-area pb-100 pt-40" id="about">
				<div class="container">
					<div class="row justify-content-start align-items-center">
						<div class="col-lg-6 video-right justify-content-center align-items-center d-flex">
							<div class="overlay overlay-bg"></div>
							<a class="play-btn" href="https://www.youtube.com/watch?v=tJlzIJaokVY"><img class="img-fluid" src="img/play-icon.png" alt=""></a>
						</div>						
						<div class="col-lg-6 video-left">
							
							<h1>We Take Pride in Whatever We Do</h1>
							<p><span>We are here to listen from you deliver exellence</span></p>
							<p>
								We make Real food, from best ingredents around the word and by hand with love, passion and dedication.
							</p>
							<img class="img-fluid" src="img/signature.png" alt="">
						</div>
					</div>
				</div>	
			</section>
			<!-- End video-sec Area -->
			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>About Us</h6>
								<p>
									We are group of four students ( Mohamad Zafar, Abdulla Safdar,Syed Maaz and Hamdan Babar) who created this website as course project for our course ITCS333. We would express our indebated gratitude and special thanks to DR. FAISAL ALQAED who guided us throughout the couse.
								</p>
								<p class="footer-text">
									<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright ©<script>document.write(new Date().getFullYear());</script> 2020 All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								</p>								
							</div>
						</div>
														<div class="col-lg-5  col-md-6 col-sm-6">
							<div class="single-footer-widget">

								</div>
							</div>			
						<div class="col-lg-2 col-md-6 col-sm-6 social-widget">
							<div class="single-footer-widget">
								<h6>Follow Us</h6>
								<p>Let us be social</p>
								<div class="footer-social d-flex align-items-center">
									<a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a>
									<a href="https://twitter.com/explore"><i class="fa fa-twitter"></i></a>
									<a href="https://dribbble.com/"><i class="fa fa-dribbble"></i></a>
									<a href="https://www.behance.net/"><i class="fa fa-behance"></i></a>
								</div>
							</div>
						</div>							
					</div>
				</div>
			</footer>
			 <script src="js/vendor/jquery-2.2.4.min.js"></script>
			<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
			<script src="js/vendor/bootstrap.min.js"></script>			
			<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
  			<script src="js/easing.min.js"></script>			
			<script src="js/hoverIntent.js"></script>
			<script src="js/superfish.min.js"></script>	
			<script src="js/jquery.ajaxchimp.min.js"></script>
			<script src="js/jquery.magnific-popup.min.js"></script>	
			<script src="js/owl.carousel.min.js"></script>			
			<script src="js/jquery.sticky.js"></script>
			<script src="js/jquery.nice-select.min.js"></script>			
			<script src="js/parallax.min.js"></script>	
			<script src="js/waypoints.min.js"></script>
			<script src="js/jquery.counterup.min.js"></script>					
			<script src="js/mail-script.js"></script>	
			<script src="js/main.js"></script>	
			</body>
			</html>