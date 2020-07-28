<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
			<script type="text/javascript" src="overlay.js"></script>
			<link rel="stylesheet" type="text/css" href="overlay.css">
</head>
<body>
	<?php
	session_start();
	require ('connection.php');
	$qty="";
	$iid=array();
	?>
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
				        <a href="mainpage.php"><img src="img/logo.png" alt="" title="" /></a>
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
			  
			
<?php
$sql="select items.picUrl, items.price, items.description, orders.id, orders.total_price, orders.quantity, items.name from items, orders where uid = ".$_SESSION['activeUser']." and confirmed=0 and orders.iid=items.id";
$rs= $db->query($sql);

?>
<div class="container">
	<?php
	$msg="";
	extract($_REQUEST);
	if ($msg=="none") {?>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<h5 style="color: red;">Please Select an Item to Proceed.</h5>
				</div>
			</div>
		</div>
		
	<?php }?>
	
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">

	<?php
	$count=0;
	while ($row=$rs->fetch(PDO::FETCH_OBJ) ) {	
	?>
	<div class="single-menu" style="margin-top: 40px;">
	<div class="row" style="padding:5px;">
		<div class="col-md-3"> <img src="<?php echo $row->picUrl ?>"  style="width: 150px; height: 150px; padding: 10px;"  > </div>
		<div class= "col-md-9" style="margin-top: 10px;"> 
			<div class="row"> 
				<div class="col-md-8">
					<div class="row">
						<div class="col-md-12">
							<h4> <?php echo $row->name ?></h4>
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<h4> BHD <?php echo $row->total_price ?> x <?php echo $row->quantity?></h4>
						</div>
					</div>
				</div>
				<div class="col-md-4" align="right">
						<?php $iid[]=$row->id;?>
						
				</div>
			</div>
			<form method="post" action="selectaddressorder.php">
			<?php require ("editquantity.php");?>
			<div class="row" style="margin-top: 50px;">
				<div class="col-md-12" align="right">
					<a href="removeitem.php?removeid=<?php echo $row->id?>" class="genric-btn danger-border radius">REMOVE</a>
					<a onclick="on(<?php echo $count ?>)" href="javascript:;" class="genric-btn danger-border radius">EDIT QUANTITY</a>
									
				</div>
			</div>
			</form>
		</div>
	</div>
	</div>
	
	<?php
	$count++;
}
	?>
	</div>
	</div>
	<?php $sql="Select SUM(quantity*total_price) AS PRICE from orders where uid=".$_SESSION['activeUser']." and confirmed=0"; 
	$rw= $db->query($sql);
	$rwo=$rw->fetch(PDO::FETCH_OBJ)
	?>
	<div class="container" style="margin-top: 20px;">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-10">
				<h3>Sub Total: <span style="color: #b68834">BHD <?php echo($rwo-> PRICE)?></span></h3>
			</div>
		</div>
		<form method="post" action="selectaddressorder.php">
		<div class="row" style="margin-top: 10px;">
			<div class="col-md-2"></div>
			<div class="col-md-10">
				<?php foreach ($iid as $key ) {?>
					<input type='hidden' name='iid[]' value='<?php echo $key ?>'>
				<?php } ?>
				
				<input type="submit" name="btn" value="Confirm Order" style="float: left;" class="genric-btn danger-border radius">
				<input type="hidden" name="sub_total" value="<?php echo($rwo-> PRICE)?>">
			</div>
		</div>
		</form>
	</div>
	
	
</div>

<footer class="footer-area section-gap" >
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