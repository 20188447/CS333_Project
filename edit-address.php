<!DOCTYPE html>
<?php
session_start();
if (!isset($_SESSION['activeUser'])) {
  header("location:emplogin.php");
}
if ($_SESSION['usertype']!="customer") {
  header("location:error-page.php");
}
extract($_POST);
require("connection.php");
$sql="select * from address where id='$aid'";
$rs=$db->query($sql);
$row=$rs->fetch(PDO::FETCH_OBJ);
?>

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
	<div class="generic-banner">
		<div class="container" style="padding-top: 30px; padding-bottom: 15px;">
			<div class="row">
				<div class="col-md-3">
					<h2 class="text-white">Edit Address</h2>
				</div>
			</div>	
		</div>
	</div>

	<form method="post" action="action.php">
	<div class="container" style="margin-top: 50px;">
		<div class="single-menu">
		<div class="row">
		<div class="col-md-1"></div>
		<div class="col-md-10">
			<div class="row" style="margin-bottom: 20px;">
				<div class="col-md-12">
					<hr><h4>Contact Details</h4><hr>
				</div>			
			</div>
			<div class="row" style="margin-bottom: 20px;">
				<div class="col-md-3">
					<h6 style="margin-top: 5px;">Mobile Number:</h6>
				</div>
				<div class="col-md-3">
					<input type="" name="mob" value="<?php echo $row->mobile;?>" class="form-control">
				</div>
				<div class="col-md-3">
					<h6 style="margin-top: 5px;">LandLine(Optional):</h6>
				</div>
				<div class="col-md-3">
					<input type="" name="landline" value="<?php echo $row->landline;?>" class="form-control">
				</div>
			</div>

			<div class="row" style="margin-bottom: 20px;">
				<div class="col-md-12">
					<hr><h4>Address Details</h4><hr>
				</div>			
			</div>
			<div class="row" style="margin-bottom: 20px;">
				<div class="col-md-3">
					<h6 style="margin-top: 5px;">Address Title (Optional):</h6>
				</div>
				<div class="col-md-3">
					<input type="" name="title" value="<?php echo $row->title;?>" class="form-control">
				</div>
			</div>

			<div class="row" style="margin-bottom: 20px;">
				<div class="col-md-3">
					<h6 style="margin-top: 5px;">Area:</h6>
				</div>
				<div class="col-md-3">
					<input list="areas" name="area" value="<?php echo $row->area;?>" class="form-control">
					<datalist id="areas">
						<option value="Hidd"></option>
						<option value="Manama"></option>
						<option value="Muharraq"></option>
						<option value="Isa-Town"></option>
						<option value="Sakhir"></option>
					</datalist>
				</div>
				<div class="col-md-3">
					<h6 style="margin-top: 5px;">Block:</h6>
				</div>
				<div class="col-md-3">
					<input type="" name="blk" value="<?php echo $row->block;?>" class="form-control">
				</div>
			</div>

			<div class="row" style="margin-bottom: 20px;">
				<div class="col-md-3">
					<h6 style="margin-top: 5px;">Place Type:</h6>
				</div>
				<div class="col-md-3">
					<?php if ($row->placetype=='House') { ?>
						<input type="radio" name="plc" value="House" checked> House<span style="margin-right: 20px;"></span>
						<input type="radio" name="plc" value="Office"> Office
					<?php } 
					elseif ($row->placetype=='Office') {?>
							<input type="radio" name="plc" value="House"> House<span style="margin-right: 20px;"></span>
							<input type="radio" name="plc" value="Office" checked> Office
					<?php	
					}
					?>
				</div>
				<div class="col-md-3">
					<h6 style="margin-top: 5px;">Road:</h6>
				</div>
				<div class="col-md-3">
					<input type="" name="rd" value="<?php echo $row->road;?>" class="form-control">
				</div>
			</div>

			<div class="row" style="margin-bottom: 20px;">
				<div class="col-md-3">
					<h6 style="margin-top: 5px;">Building:</h6>
				</div>
				<div class="col-md-3">
					<input type="" name="bldg" value="<?php echo $row->building;?>" class="form-control">
				</div>
				<div class="col-md-3">
					<h6 style="margin-top: 5px;">Floor:</h6>
				</div>
				<div class="col-md-3">
					<input type="" name="flr" value="<?php echo $row->floor;?>" class="form-control">
				</div>
			</div>

			<div class="row" style="margin-bottom: 50px;">
				<div class="col-md-3">
					<h6 style="margin-top: 5px;">Apartment No.:</h6>
				</div>
				<div class="col-md-3">
					<input type="" name="apt" value="<?php echo $row->apartment;?>" class="form-control">
				</div>
				<div class="col-md-3">
					<h6 style="margin-top: 5px;">Additional Directions:</h6>
				</div>
				<div class="col-md-3">
					<input type="" name="adir" value="<?php echo $row->additional_directions;?>" class="form-control">
				</div>
			</div>

			<div class="row" style="margin-bottom: 20px;">
				<div class="col-md-8"></div>
				<div class="col-md-4">
					<input type="submit" name="btn" value="CANCEL" class="genric-btn danger-border" style="margin-right: 10px;">
					<input type="submit" name="btn" value="SAVE ADDRESS" class="genric-btn success-border radius">
					<input type="hidden" name="type" value="edit-address">
					<input type="hidden" name="aid" value="<?php echo $row->id;?>">
				</div>
			</div>
		</div>
		</div>
	</div>
	</div>
	</form>
	





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

