<?php
session_start();
if (!isset($_SESSION['activeUser'])) {
	header("location:emplogin.php");
}
if ($_SESSION['usertype']!="admin") {
	header("location:error-page.php");
}
if(!isset($_SESSION["admin"]))
{ echo "<font color='blue'> You are being redirected to employee Log-in page as you are not logged in </font> <br />";
   header('Refresh: 2; URL=emplogin.php');
    		  }
else{
?>

<html>
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

  <header id="header" class="header-scrolled">
<div class="header-top">
    <div class="container">
      <div class="row justify-content-end">
        <div class="col-lg-6 col-sm-4 col-8 header-top-right no-padding">
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
        <a href="index.php"><img src="img/logo1.png" alt="" title="" /><h4 class="text-white">Choco 'n Chuckle</h4></a>
      </div>
      <nav id="nav-menu-container">
        <ul class="nav-menu sf-js-enabled sf-arrows" style="touch-action: pan-y;">
 <li class="menu-active"><a href="admininterface.php">Admin Homepage</a></li>

                  <li class="menu-active"><a href="viewallemp.php" >View all Staff</a></li>
                      <li class="menu-active"><a href="managestaff.php">Manage Staff Roles </a></li>
                      <li class="menu-active"><a href="addnewemp.php">Add New Staff</a></li>
                                <li class="menu-active"><a href="logout.php">Sign-out</a></li>

        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </div>
</header>

      <div style="background-image: url('img/header-bg1.jpg'); width: 100%; height:100px;" ></div>


	<section class="generic-banner">
		<div class="container">
			<div class="row height align-items-center justify-content-center">
				<div class="generic-banner-content">
					<h1 class="text-white">MENU SETTING</h1>
          <p class="text-white">
            Please Select From Options Below, What You Wish To Do:
          </p>
				</div>
			</div>
		</div>
	</section>

	<div class="container" style="margin-bottom: 250px;" >
		<div class="row"style="margin-top: 100px;">
			<div class="col-md-1"></div>
			<div class="col-md-10" align="center" ><h3>Please select options:</h3></div>
		</div>
		<div class="row"style="margin-top: 50px;">
			<div class="col-md-2"></div>
			<div class="col-md-4">
				<a href="viewmenu.php" class="genric-btn primary-border radius" style="font-size: 16pt; width: 100%; ">View Menu Items</a>
			</div>
			<div class="col-md-4">
				<a href="add.php" class="genric-btn primary-border radius" style="font-size: 16pt; width: 100%;"> &nbsp Add New Item &nbsp</a>
			</div>
		</div>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">
				<a href="admininterface.php" class="genric-btn danger-border radius" style="font-size: 16pt; width: 100%;margin-top: 30px;">Go To Home Page</a> <br/>
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

</body>
</html>

<?php } ?>
