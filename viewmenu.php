<?php
session_start();
extract($_POST);

if (!isset($_SESSION['activeUser'])) {
  header("location:emplogin.php");
}
if ($_SESSION['usertype']!="admin") {
  header("location:error-page.php");
}

else {
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
			    $("#myTable #tr").filter(function() {
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
                <li class="menu-active"><a href="a-menu.php">Manage Menu</a></li>
                  <li class="menu-active"><a href="viewallemp.php" >View all Staff</a></li>
                      <li class="menu-active"><a href="managestaff.php">Manage Staff Roles </a></li>
                      <li class="menu-active"><a href="addnewemp.php">Add New Staff</a></li>
                                <li class="menu-active"><a href="logout.php">Sign-out</a></li>
              </ul>
            </nav><!-- #nav-menu-container -->
          </div>
        </div>
      </header>
			  <!-- #header -->
			  <div style="background-image: url('img/header-bg1.jpg'); width: 100%; height: 200px;" ></div>

<style type="text/css">
						a:hover{
							color:#ff2989; ;
						}
						a{
							color:#b68834;
						}
</style>
			<!-- Start menu Area -->
<section class="section-gap" id="coffee">
					<div class="row d-flex justify-content-center">
						<div class="menu-content pb-60 col-lg-10">
							<div class="title text-center">
								<h1 class="mb-10">What kind of Coffee we serve for you</h1>
								<p>Who are in extremely love with eco friendly system.</p>

							</div>
						</div>
					</div>
					<div class="col-md-12">
								<h3 style="color: #b68834; font-weight: bold; margin-left: 10px;">CATEGORIES:</h3>
							</div>
					<div class="single-menu" style="padding: 10px 50px 5px 50px; margin-left: 10px; width: 99%;" >
						<div class="row" style=" padding: 10px;">
							<div class="col-md-12" style="padding: 0px;">
								<a href="javascript:;" id="All" style="width: 100%; font-size: 15pt; font-weight: bolder; margin-right: 20px;">All</a>
								<a href="javascript:;" id="Pancake" style="width: 100%; font-size: 15pt; font-weight: bolder; margin-right: 20px;">Pancake</a>
								<a href="javascript:;" id="Waffle" style="width: 100%; font-size: 15pt; font-weight: bolder; margin-right: 20px;">Waffle</a>
								<a href="javascript:;" id="Milkshake" style="width: 100%; font-size: 15pt; font-weight: bolder; margin-right: 20px;">Milkshake</a>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-md-1">
						</div>
						<div class="col-md-10">
							<input type="" name="search" id="myInput" class="form-control" placeholder="Search menu item . . .">
						</div>
					</div>
					<div class="row" style="margin-left: 100px; margin-top: 50px;" >

						<table class="progress-table" style="width: 100%; margin-right: 100px; ">
								<tr>
									<th colspan="10"><hr></th>
								</tr>
								<tr>
									<th class="country" style="width: 150px; padding-left: 10px;">PICTURE</th>
									<th class="country" style="width: 150px;">NAME</th>
									<th class="country" style="width: 150px;">CATEGORY</th>
									<th class="country" style="width: 400px; padding-right: 20px;">DESCRIPTION</th>
									<th class="country" style="width: 100px;">PRICE(BHD)</th>
									<th class="country" style="width: 150px;">DISCOUNT(%)</th>
									<th class="country" style="width: 190px;">TOTAL PRICE(BHD)</th>
									<th class="country" style="width: 110px;">EDIT ITEM</th>
									<th class="country" style="width: 150px;">ADD DISCOUNT</th>
									<th class="country" style="width: 150px;">REMOVE</th>
								</tr>
								<tr>
									<th colspan="10"><hr></th>
								</tr>
								<tbody id="myTable">
						<?php
						$count=0;
						 while($row=$rs->fetch(PDO::FETCH_OBJ)){ ?>
						 	<tr id="tr" style="border-bottom: 0.5px solid #c7c5c5;" class="<?php echo $row->category;?>">
						 		<td class="country" style="width: 150px; padding: 10px;"><img src="<?php echo $row->picUrl?>" style="width: 100px; height: 100px;" ></div>
								<td class="country"style="width: 150px;"><h5><?php echo $row->name?></h5></td>
								<td class="country"style="width: 150px;"><h5><?php echo $row->category?></h5></td>
								<td class="country"style="width: 400px; padding-right: 20px;"><h6><?php echo $row->description?></h6></td>
								<td class="country"style="width: 100px; padding-left: 4px;"><h5><?php echo $row->price?></h5></td>
								<td class="country"style="width: 150px; padding-left: 20px;"><h5><?php echo $row->discount?></h5></td>
								<?php
								$total_price=$row->price*(1-($row->discount/100));
								?>
								<td class="country"style="width: 190px; padding-left: 20px;"><h5><?php echo $total_price?></h5></td>
								<td class="country"style="width: 110px;">
									<form method="post" action="editconfirm.php">
										<input type="hidden" value="<?php echo $row->id;?>" name="id" >
       									<input type="submit" value="Edit Item" style="padding: 10px; font-size: 10pt;" class="genric-btn primary-border radius small">
									</form>
								</td>
								<link rel="stylesheet" type="text/css" href="overlay.css">
								<td class="country"style="width: 150px;">
									<?php require("add-discount.php");?>
										<input type="hidden" value="<?php echo $row->id;?>" name="id" >
       									<input type="submit"  name="ad" onclick="on(<?php echo $count ?>)" value="Add Discount" style="padding: 10px; font-size: 10pt;" class="genric-btn primary-border radius small">

								</td>
								<td class="country"style="width: 150px;">
									<form method="post" action="remove-item.php">
										<input type="hidden" value="<?php echo $row->id;?>" name="id" >
       									<input type="submit"  name="remove" value="Remove" style="padding: 10px; font-size: 10pt;" class="genric-btn primary-border radius small">
									</form>
								</td>
							</tr>
							</div>
						<?php $count++;} ?>
						</tbody>
						</table>


					</div>
          <center>
          <section class="about-generic-area section-gap">
            <div class="container border-top-generic">
              <h6 align='center' class="about-title mb-30">
                <div class="button-group-area mt-10">
                  <a href="admininterface.php" class="genric-btn primary-border radius">Go To Admin Homepage</a>
                  <a href="menu.php" class="genric-btn primary-border radius">Go To Menu Setting</a>
                  <a href="add.php" class="genric-btn primary-border radius">&nbsp &nbsp &nbsp &nbsp Add New Item &nbsp &nbsp &nbsp &nbsp</a>

                </div>

              </h6>
                    </div>
                  </section>
                </center>
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
		<?php }?>
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
