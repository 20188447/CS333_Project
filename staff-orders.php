<?php
session_start();
if (!isset($_SESSION['activeUser'])) {
  header("location:emplogin.php");
}
if ($_SESSION['usertype']!="staff") {
  header("location:error-page.php");
}
extract($_POST);
require("connection.php");

if (isset($btn)) {
	if ($status=="In Process") {
		$st="ip";
	}elseif ($status=="In Transit") {
		$st="it";
	}elseif ($status=="Delivered") {
		$st="dl";
	}
	$sql="update confirmed_orders set status='$st' where id='$id'";
	$rs=$db->exec($sql);
	header("staff-orders.php");
}
$sql="select * from confirmed_orders";
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
			
			<script type="text/javascript">
							$(document).ready(function(){
			  				$("#dl").click(function(){
			    				$(".ip").hide();
			    				$(".it").hide();
			    				$(".dl").show();
			    				
			  				});
			  				$("#ip").click(function(){
			    				$(".ip").show();
			    				$(".it").hide();
			    				$(".dl").hide();
			    				
			  				});
			  				$("#it").click(function(){
			    				$(".ip").hide();
			    				$(".it").show();
			    				$(".dl").hide();
			    				
			  				});
			  				$("#All").click(function(){
			    				$(".ip").show();
			    				$(".it").show();
			    				$(".dl").show();
			    				
			  				});
							});
						</script>
						<script type="text/javascript" src="overlay.js"></script>
						<link rel="stylesheet" type="text/css" href="overlay.css">
		</head>
		<body>
			  <div class="generic-banner" style="width: 100%; height: 80px;">
			  	<div class="container" >
			  		<div class="row" >
			  			<div class="col-md-3" style="margin-top: 40px;"><h3 class="text-white">Choco 'n Chuckle</h3></div>
			  			<div class="col-md-6"></div>
			  			<div class="col-md-3"style="margin-top: 50px;">
			  				<a href="emplogin.php?btn=logout"><h5 class="text-white">LOGOUT</h5></a>
			  			</div>
			  		</div>
			  	</div>
			  </div>

<style type="text/css">
						a:hover{
							color:#ff2989; ;
						}
						a{
							color:#b68834;
						}
</style>
			<!-- Start menu Area -->
<section id="coffee">
					<div class="single-menu" style="padding: 10px 50px 5px 50px; margin-left: 10px; width: 99%;" >
						<div class="container">
						<div class="row" style=" padding: 10px;">
							<div class="col-md-1"></div>
							<div class="col-md-11" style="padding: 0px;">
								<a href="javascript:;" id="All" style="width: 100%; font-size: 15pt; font-weight: bolder; margin-right: 50px; font-weight: bold;">All</a>
								<a href="javascript:;" id="ip" style="width: 100%; font-size: 15pt; font-weight: bolder; margin-right: 50px; font-weight: bold;">In Process</a>
								<a href="javascript:;" id="it" style="width: 100%; font-size: 15pt; font-weight: bolder; margin-right: 50px; font-weight: bold;">In Transit</a>
								<a href="javascript:;" id="dl" style="width: 100%; font-size: 15pt; font-weight: bolder; margin-right: 50px; font-weight: bold;">Delivered</a>
							</div>
						</div>
						</div>
					</div>
					
					<div class="container">	
					<div class="row" style=" margin-top: 50px;" >
						<table class="progress-table" style="width: 100%; ">
								<tr>
									<th colspan="10"><hr></th>
								</tr>
								<tr>
									<th class="country" style="width: 100px; padding-left: 10px;">ORDER ID</th>
									<th class="country" style="width: 200px; padding-left: 40px;">CREATED</th>
									<th class="country" style="width: 150px; padding-left: 10px;">Total(BHD)</th>
									<th class="country" style="width: 150px;padding-left: 40px;">STATUS</th>
									<th class="country" style="width: 100px;padding-left: 35px;">OK</th>
									<th class="country" style="width: 100px;padding-left: 25px;">VIEW</th>
									
								</tr>
								<tr>
									<th colspan="10"><hr></th>
								</tr>
								<tbody id="myTable">
						<?php
						$count=0;
						 while($row=$rs->fetch(PDO::FETCH_OBJ)){ ?>
						 	<tr id="tr" style="border-bottom: 0.5px solid #c7c5c5;" class="<?php echo $row->status;?>">
								<td class="country"style="width: 100px; padding-left: 30px; padding-top: 25px;padding-bottom: 25px;"><h5><?php echo $row->id?></h5></td>
								<td class="country"style="width: 200px;padding-top: 25px;padding-bottom: 25px;"><h5><?php echo $row->created?></h5></td>
								<td class="country"style="width: 150px; padding-left: 30px;padding-top: 25px;padding-bottom: 25px;"><h5><?php echo sprintf("%0.3f",$row->sub_total+$row->delivery_fee)?></h5></td>
								<form method="post">
								<td class="country"style="width: 150px;padding-top: 25px;padding-bottom: 25px;">
									<select name="status" class="nice-select">
						                <option  <?php if($row->status=="ip") {echo "selected";} ?> >In Process</option>
						                <option <?php if($row->status=="it") {echo "selected";} ?> >In Transit</option>
						                <option <?php if($row->status=="dl") {echo "selected";} ?> >Delivered</option>
					              	</select>
					          	</td>
								<td class="country"style="width: 100px;padding-top: 25px;padding-bottom: 25px;">
									<input type="submit" name="btn" value="OK" class="genric-btn danger-border radius" style="font-size: 12pt;width: 100px;">
									<input type="hidden" name="id" value="<?php echo $row->id;?>">
								</td>
								</form>
								<td class="country"style="width: 100px;padding-top: 25px;padding-bottom: 25px;">
									<a href="view-staff-orders.php?coid=<?php echo $row->id?>" class="genric-btn danger-border radius" style="font-size: 12pt;width: 100px;">VIEW</a>
								</td>
							</tr>
							</div>
						<?php } ?>
						</tbody>
						</table>										
					</div>
					</div>	
			</section>
			<!-- End menu Area -->

			

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
