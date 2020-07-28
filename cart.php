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
  <script type="text/javascript" src="incrementDecrement.js"></script>
  <script type="text/javascript">
  	function sub_total() {
  		var qty = document.getElementsByClassName('quantity');
	  	var price = document.getElementsByClassName('price');
	  	var sub = document.getElementById('total').innerHTML;
	  	var total=0;
	  	for (var i = 0; i<qty.length;i++) {
	  		total += (parseFloat(price[i].value)*parseFloat(qty[i].value));
	  		}	
	  	document.getElementById('total').innerHTML= total.toFixed(3);
	  	document.getElementById('st').value= total.toFixed(3);
  	}
  	
  </script>
			<script type="text/javascript" src="overlay.js"></script>
			<link rel="stylesheet" type="text/css" href="overlay.css">
</head>
<body onload="sub_total()">
	<?php
	session_start();
	if (!isset($_SESSION['activeUser'])) {
  header("location:emplogin.php");
}
if ($_SESSION['usertype']!="customer") {
  header("location:error-page.php");
}
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
			  
			
<?php
$sql="select items.picUrl, items.price, items.description, orders.id, orders.total_price, orders.quantity, items.name from items, orders where uid = ".$_SESSION['activeUser']." and confirmed=0 and orders.iid=items.id";
$rs= $db->query($sql);

?>
<div class="container">	
	<div class="row">
		<div class="col-md-2"></div>
		<div class="col-md-8">
		<form method="post" action="selectaddressorder.php">
	<?php
	$count=0;
	$row=$rs->fetch(PDO::FETCH_OBJ);
	if($row==NULL){?>
		<div class="container" style="margin-top: 50px; margin-bottom: 50px;">
			<div class="row">
				<div class="col-md-5"></div>
				<div class="col-md-4">
					<h3 style="color: red">Cart is Empty</h3>	
				</div>
			</div>
		</div>

	<?php }
	$rs= $db->query($sql);
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
					<div class="row" style="margin-top: 8px;">
						<div class="col-md-12">
							<h4> BHD <?php echo $row->total_price ?></h4>
						</div>
					</div>
					<div class="row" style="margin-top: 8px;">
						<div class="col-md-12">
							<h5>Description:</h5>
						</div>
						<div class="col-md-6" style="border-top: 1px solid #dbdbdb; margin-left: 15px; margin-top: 5px;"></div>
					</div>
					<div class="row" style="margin-top: 10px; margin-bottom: 10px;">
						<div class="col-md-12">
							<h6><?php echo $row->description ?></h6>
						</div>
					</div>
				</div>
				<div class="col-md-4" align="right">
					<div class="row">
						<a onclick="decrementValue('number<?php echo $count?>'); sub_total();" class="genric-btn primary-border radius" style="padding: 10px; line-height: 1.5;float: left;" href="javascript:;">-</a>
						<input name="qty[]" class="quantity"  onchange="sub_total()" readonly value="<?php echo $row->quantity?>" size="3" max="100" min="1" maxlength="3" style="text-align: center;width: 50%; float: left; height: 38px;" class="form-control" id="number<?php echo $count?>">
						<input type="hidden" name="price" value="<?php echo $row->total_price?>" class="price" >
						<a onclick="incrementValue('number<?php echo $count?>'); sub_total();"  class="genric-btn primary-border radius" style="padding: 10px;line-height: 1.5;float: left;" href="javascript:;">+</a>
						<?php $iid[]=$row->id;?>
					</div>
					<div class="row" style="margin-top: 50px;">
							<div class="col-md-12" align="right" style="padding-right: 40px;">
								<a style="width: 100%" href="removeitem.php?removeid=<?php echo $row->id?>" class="genric-btn danger-border radius">REMOVE</a>
							</div>
					</div>
				</div>
			</div>			
		</div>
	</div>
	</div>
	
	<?php
	$count++;
}
	?>
	</div>
	</div>
	<div class="container" style="margin-top: 20px;">
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-10">
				<h3>Sub Total: <span style="color: #b68834" >BHD <span style="color: #b68834" id="total"></span></span></h3>
			</div>
		</div>
		
		<div class="row" style="margin-top: 10px;">
			<div class="col-md-2"></div>
			<div class="col-md-10">
				<?php foreach ($iid as $key ) {?>
					<input type='hidden' name='iid[]' value='<?php echo $key ?>'>
				<?php } ?>
				
				<input type="submit" name="btn" value="Confirm Order" style="float: left;" class="genric-btn danger-border radius">
				<input type="hidden" name="sub_total" id="st" value="">
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