<?php
session_start();
if (!isset($_SESSION['activeUser'])) {
	header("location:emplogin.php?error=nologin");
}
if ($_SESSION['usertype']!="customer") {
  header("location:error-page.php");
}
$type="";
$arr=array();
$btn="";
require("connection.php");
$sql="select * from items where active=1";
$rs=$db->query($sql);
?>
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
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<script type="text/javascript" src="overlay.js"></script>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
			<link rel="stylesheet" type="text/css" href="overlay.css">
			<script>
			$(document).ready(function(){
			  $("#myInput").on("keyup", function() {
			    var value = $(this).val().toLowerCase();
			    $(".myDIV").filter(function() {
			      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
			    });
			  });
			});
			</script>
			<script type="text/javascript">
							$(document).ready(function(){
			  				$("#Pancake").click(function(){
			    				$(".Waffle").hide();
			    				$(".Milkshake").hide();
			    				$(".main").hide();
			    				$(".Pancake").show();
			  				});
			  				$("#Waffle").click(function(){
			    				$(".Waffle").show();
			    				$(".Milkshake").hide();
			    				$(".main").hide();
			    				$(".Pancake").hide();
			  				});
			  				$("#Milkshake").click(function(){
			    				$(".Waffle").hide();
			    				$(".Milkshake").show();
			    				$(".main").hide();
			    				$(".Pancake").hide();
			  				});
			  				$("#All").click(function(){
			    				$(".Waffle").show();
			    				$(".Milkshake").show();
			    				$(".main").show();
			    				$(".Pancake").show();
			  				});
							});
						</script>
						<script type="text/javascript" src="overlay.js"></script>
						<link rel="stylesheet" type="text/css" href="overlay.css">
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
				          <li class="menu-has-children"><a href="account-info.php">My Account</a>
				            <ul>
				              <li><a href="account-info.php">Account Info</a></li>
				              <li><a href="myorders.php">My Orders</a></li>
				              <li><a href="saved-addresses.php">My Addresses</a></li>
				            </ul>
				          </li>
				          <li><a href="cart.php">My Cart</a></li>
				          <?php if(!isset($_SESSION['activeUser'])){ ?>
				          <li><a href="emplogin.php">Login</a></li>
				          <?php }
				          else{ ?>
				          	<li><a href="emplogin.php?btn=logout">Logout</a></li>
				          	<?php } ?>
				        </ul>
				      </nav><!-- #nav-menu-container -->		    		
			    	</div>
			    </div>
			  </header>
			  <!-- #header -->
			  <div style="background-image: url('img/header-bg1.jpg'); width: 100%; height: 200px;" ></div>
			  
			<div style="width: 200px; height: 400px; float: left; margin-top: 400px; margin-left: 100px; background-color:#fff; padding: 50px;   box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">
			  	<div ><p style="font-size: 16pt; font-weight: bold; color: #b68834; " >Categories</p><hr></div>
			  	<div style="margin-top: 20px;"><a id="All" href="javascript:;"style="width: 50%;"><h4>All</h4></a></div>
				<div style="margin-top: 20px;"><a id="Pancake" href="javascript:;" style="width: 50%;"><h4>Pancakes</h4></a></div>
				<div style="margin-top: 20px;"><a id="Waffle" href="javascript:;"style="width: 50%;"><h4>Waffles</h4></a></div>
				<div style="margin-top: 20px;"><a id="Milkshake" href="javascript:;"style="width: 50%;"><h4>Milkshakes</h4></a></div>
			</div>

			<!-- Start menu Area -->
<section class="menu-area section-gap" id="coffee">
				<div class="container">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">What kind of Coffee we serve for you</h1>
								<p>Who are in extremely love with eco friendly system.</p>

							</div>
						</div>
					</div>
					<form method="post">
					<div class="row">
						<div class="col-md-1">
						</div>
						<div class="col-md-10">
							<input type="" name="search" id="myInput" class="form-control" placeholder="Search menu item . . .">
						</div>
					</div>
					</form>						
					<div class="row" style="margin-left: 100px; margin-top: 50px;" >

						<?php
						$count=0;
						 while($row=$rs->fetch(PDO::FETCH_OBJ)){ ?>
							
						<div class="col-lg-6 <?php echo $row->category?> myDIV">
							<div class="single-menu" style="height: 170px;" >
								<div class="row">
									<div class="col-md-3">
										<img src="<?php echo $row->picUrl ?>" width=100px; height=100px; >							
									</div>

									<div class="col-md-5 name" id="name">
										<h4><?php echo $row->name ?></h4>
									</div>
									<div class="col-md-4">
										<?php
										 $total_price=$row->price*(1-($row->discount/100));
										if ($row->discount > 0) { 
											
											?>
											<p class="price" align="right" >
											BHD <?php echo sprintf('%0.3f',$total_price);  ?></p>
											<div style="text-align: right;"><del style="color: #222222;">BHD <?php echo $row->price ?></del></div>
											<div style="color: red; text-align: right;">(<?php echo $row->discount;?>% off)</div>
										<?php 
										}else{
											?>
											<p class="price" align="right" >
											BHD <?php echo sprintf('%0.3f',$total_price);  ?></p>
										<?php }
										require ("view.php");
										?>
											<input type="submit" name="btn" onclick="on(<?php echo $count ?>)" value="VIEW" class="genric-btn info-border circle" style="margin-left: 35px; margin-top: 20px;">
											<input type="hidden" name="id" value="<?php echo $row->id; ?>">
											<input type="hidden" name="tp" value="<?php echo $total_price; ?>">
											
									</div>
								</div>									
							</div>
						</div>
						<?php $count++; } ?>										
					</div>
				</div>	
			</section>
			<!-- End menu Area -->

			<footer class="footer-area section-gap">
				<div class="container">
					<div class="row">
						<div class="col-lg-5 col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>About Us</h6>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
								</p>
								<p class="footer-text">
									<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright ©<script>document.write(new Date().getFullYear());</script>2020 All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
								</p>								
							</div>
						</div>
						<div class="col-lg-5  col-md-6 col-sm-6">
							<div class="single-footer-widget">
								<h6>Newsletter</h6>
								<p>Stay update with our latest</p>
								<div class="" id="mc_embed_signup">
									<form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
										<input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
			                            	<button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
			                            	<div style="position: absolute; left: -5000px;">
												<input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
											</div>

										<div class="info pt-20"></div>
									</form>
								</div>
							</div>
						</div>						
						<div class="col-lg-2 col-md-6 col-sm-6 social-widget">
							<div class="single-footer-widget">
								<h6>Follow Us</h6>
								<p>Let us be social</p>
								<div class="footer-social d-flex align-items-center">
									<a href="#"><i class="fa fa-facebook"></i></a>
									<a href="#"><i class="fa fa-twitter"></i></a>
									<a href="#"><i class="fa fa-dribbble"></i></a>
									<a href="#"><i class="fa fa-behance"></i></a>
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
<!--div class="topnav">
  <a href="mainpage.php">Home</a>
  <a class="active" href="menu.php">Menu</a>
  <a href="account-info.php">My Account</a></th>
  <a href="login.php?btn=logout">logout</a>
</div-->
<!-- Side navigation -->
<!--div class="sidenav">
  <a href="#pk">Pancakes</a>
  <a href="#">Fast Food</a>
  <a href="#">Indian Food</a>
  <a href="#">Sweets</a>
  <a href="#">Combo Meals</a>
  <a href="#">Drinks</a>
  <a href="#">Offers</a>
</div-->

<!-- Page content -->
<!--div class="main">
	<br>
<table border="1" align="center" >
	<tr>
		<th colspan="4">DISHES</th>
	</tr>
	<?php
//	while($row=$rs->fetch(PDO::FETCH_OBJ)){
	?>
	<tr>
		<td><?php// echo "<img src='". $row->picUrl ."' width='50px' height='50px'>"; ?></td>
		<td><?php// echo $row->name;?></td>
		<td><?php// echo $row->description; ?></td>
		<td><?php// echo $row->price; ?></td>
	</tr>
<?php  
//$db=null;?>
</table>
</div -->

