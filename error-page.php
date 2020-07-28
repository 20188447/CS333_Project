<!DOCTYPE html>
<html>
<head>
	<title></title>
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
	<div class="generic-banner" style="margin-top: 250px;height: 300px;">
		<div class="container">
			<div class="row">
				<div class="col-md-3"></div>
				<div class="col-md-6">
					<h3 class="text-white" style="font-size: 35pt;margin-top: 90px;">PAGE DOES NOT EXIST</h3>
					<h5>Redirecting...</h5>
				</div>
			</div>
		</div>
	</div>
	<?php
	session_start();
	if (!isset($_SESSION['activeUser'])) {
		header("location:emplogin.php");
	}

	if ($_SESSION['usertype']=="customer") {
		header("Refresh:3; url=index.php");
	}elseif ($_SESSION['usertype']=="admin") {
		header("Refresh:3; url=admininterface.php");
	}elseif ($_SESSION['usertype']=="staff") {
		header("Refresh:3; url=staff-orders.php");
	}
	?>
</body>
</html>