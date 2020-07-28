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
<?php
session_start();

if (!isset($_SESSION['activeUser'])) {
	header("location:emplogin.php");
}
if ($_SESSION['usertype']!="customer") {
	header("location:error-page.php");
}
extract($_POST);
require('connection.php');
if ($btn=="Logout") {
	header("location:login.php?btn=logout");
}
elseif ($btn=="UPDATE") {
	$sql="update users set firstname='$fname', lastname='$lname', gender='$gender', dob='$dob' where id='". $_SESSION['activeUser'] ."'";
	$rs=$db->exec($sql);
	header("location:account-info.php");
}
elseif ($btn=="CANCEL" && ($type=="email" || $type=="password")) {
	header("location:account-info.php");
}
elseif ($btn=="SUBMIT" && $type=="email") {
	$sql="select * from users where id='". $_SESSION['activeUser'] ."'";
	$rs = $db->query($sql);
	$row = $rs->fetch(PDO::FETCH_OBJ);
	if ($pw=="") {
		header("location:change-email.php");
	}
	elseif ($pw==$row->password) {
		if ($ne==$re) {
			$sql="update users set email='$ne' where id='". $_SESSION['activeUser'] ."'";
			$rs=$db->exec($sql);
			header("location:account-info.php");
		}
		else{
			header("location:change-email.php?err=email_error");
		}		
	}
	else{
		header("location:change-email.php?err=password_error");
	}

}
elseif ($btn=="SUBMIT" && $type=="password") {
	$sql="select * from users where id='". $_SESSION['activeUser'] ."'";
	$rs = $db->query($sql);
	$row = $rs->fetch(PDO::FETCH_OBJ);
	if ($cpw=="") {
		header("location:change-email.php");
	}
	elseif ($cpw==$row->password) {
		if ($npw==$rpw) {
			$sql="update users set password='$npw' where id='". $_SESSION['activeUser'] ."'";
			$rs=$db->exec($sql);
			header("location:account-info.php");
		}
		else{
			header("location:change-password.php?err=pw1_error");
		}		
	}
	else{
		header("location:change-password.php?err=pw2_error");
	}
}
elseif ($btn=="CANCEL" && ($type=="new-address" || $type=="edit-address")) {
	header("location:saved-addresses.php");
}
elseif ($btn=="SAVE ADDRESS" && $type=="new-address") {
	$sql="insert into address(uid,title,mobile,landline,placetype,area,block,road,building,floor,apartment,additional_directions)values('". $_SESSION['activeUser'] ."','$title','$mob','$landline','$plc','$area','$blk','$rd','$bldg','$flr','$apt','$adir')";
	$rs=$db->exec($sql);
	header("location:saved-addresses.php");
}
elseif ($btn=="DELETE" && $type=="saved-address") { ?>
	<div class="container" style="margin-top: 250px;">
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
			<div class="single-menu"style="box-shadow: 0 8px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19); border-radius: 10px;">

				<div class="row">
					<div class="col-md-12" align="center">
						<h2>Are you sure you want to delete?</h2><hr>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12" align="center">
						<form method="post" action="confirm.php">
							<input type="submit" name="btn" value="OK" class="genric-btn danger-border radius">
							<input type="submit" name="btn" value="CANCEL" class="genric-btn primary-border radius">
							<input type="hidden" name="aid" value="<?php echo $aid ?>">
						</form>
					</div>
				</div>

			</div>
			</div>
		</div>
	</div>

	<?php
}
elseif ($btn=="CANCEL" && $type=="view") {
	header("location:menu.php");
}
?>






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