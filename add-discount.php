<!DOCTYPE html>
<html>
<head>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="incrementDecrement.js"></script>
</head>
<body>
	<?php
	
	if (!isset($_SESSION['activeUser'])) {
		header("location:emplogin.php");
	}
	if ($_SESSION['usertype']!="admin") {
		header("location:error-page.php");
	}?>
	<div class="overlay" id="overlay">
	<?php
	require ('connection.php');
	$add="";
	extract($_POST);
	if(!empty($add)){
		$sql="UPDATE items SET discount='$discount' WHERE id='$id'";
        $r=$db->exec($sql);
        header("location:viewmenu.php");
	}
	extract($_POST);
	?>

	<div class="generic-banner">
	    <div class="container" style="padding-top: 30px; padding-bottom: 15px;">
	      <div class="row">
	        <div class="col-md-3">
	          <h2 class="text-white">Add Discount</h2>
	        </div>
	      </div>  
	    </div>
	 </div>

	 <br>
	 <div class="container" style="margin-top: 150px;">
	 	<div class="row">
	 		<div class="col-md-2"></div>
	 		<div class="col-md-8">
	 			<div class="single-menu">
	 				<div class="generic-banner">
	    <div class="container" style="padding-top: 30px; padding-bottom: 15px; margin-bottom: 50px;">
	      <div class="row">
	        <div class="col-md-5">
	          <h2 class="text-white">Add Discount</h2>
	        </div>
	      </div>  
	    </div>
	 </div>
	 				<form method="post" action="add-discount.php">
	 				<div class="row">
	 					<div class="col-md-1"></div>
	 					<div class="col-md-2" style="margin-top: 15px;">
	 						<h4>Discount:</h4>
	 					</div>
	 					<div class="col-md-3">
	 						<input type="" name="discount" class="form-control">
	 					</div>
	 					<div class="col-md-1" style="margin-top: 15px;">
	 						<h4>%</h4>
	 					</div>
	 				</div>
	 				<div class="row">
	 					<div class="col-md-8"></div>
	 					<div class="col-md-2">
	 						<input type="submit" name="add" value="Add" class="genric-btn primary-border radius">
	 						<input type="hidden" name="id" value="<?php echo $row->id;?>">
	 					</div>
	 					<div class="col-md-2">
	 						<a href="viewmenu.php" class="genric-btn primary-border radius">Cancel</a>
	 					</div>
	 				</div>
	 				</form>
	 			</div>
	 		</div>
	 	</div>
	 </div>

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
  </div>
</body>
</html>