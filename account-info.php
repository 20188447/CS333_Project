<!DOCTYPE html>
<?php  
session_start();
if (!isset($_SESSION['activeUser'])) {
	header("location:emplogin.php");
}
if ($_SESSION['usertype']!="customer") {
	header("location:error-page.php");
}
require("connection.php");
$sql="select * from users where id='". $_SESSION['activeUser'] ."'";
$rs = $db->query($sql);
$row = $rs->fetch(PDO::FETCH_OBJ);
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
			 <script type="text/javascript">
    	var lnFlag=fnFlag=false;

        function checkFN(fn){
          var nameExp=/^[a-z]{2,15}$/i;
          if (fn.length==0){
            m="";
            fnFlag=false;
          }
          else if (!nameExp.test(fn)){
              m="Invalid Name";
              c="red";
              fnFlag=false;
            }
          else{
              m="Valid Name";
              c="green";
              fnFlag=true;
            }
          document.getElementById('fnmsg').style.color=c;
          document.getElementById('fnmsg').innerHTML=m;
        }
        function checkLN(ln){
          var nameExp=/^[a-z]{2,15}$/i;
          if (ln.length==0){
            m="";
            lnFlag=false;
          }
          else if (!nameExp.test(ln)){
              m="Invalid Name";
              c="red";
              lnFlag=false;
            }
          else{
              m="Valid Name";
              c="green";
              lnFlag=true;
            }
          document.getElementById('lnmsg').style.color=c;
          document.getElementById('lnmsg').innerHTML=m;
        }
       function checkEM(em){
          var nameExp=/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+\.[a-zA-Z]{2,4}/i;
          if (em.length==0){
            m="";
            emFlag=false;
          }
          else if (!nameExp.test(em)){
              m="Incorrect Email";
              c="red";
              emFlag=false;
            }
          else{
              m="Valid Email";
              c="green";
              emFlag=true;
            }
          document.getElementById('emmsg').style.color=c;
          document.getElementById('emmsg').innerHTML=m;
        }
    </script>
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

			  <section class="generic-banner" style="width: 100%; height: 150px; text-align: left;">
			  <div class="container">
			  <div id="logo" style="padding-top: 20px;">
				        <a href="index.php"><img src="img/logo1.png" alt="" title="" /></a>
              <span style="padding-left: 15px;"><h5 class="text-white">Choco 'n Chuckle</h5></span>				
				<div style="padding-top: 30px;">
					<h2 class="text-white">My Account</h2>
				</div>
			</div>
			</section>
			<div style="background-color: #3b3631; padding: 15px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
				<div class="container" >
				<table>
					<tr>
						<td style="padding-right: 30px;"><h4 ><a href="account-info.php" class="text-white">Account Info</a></h4></td>
						<td style="padding-right: 30px;"><h4><a href="saved-addresses.php" class="text-white">Saved Addresses</a></h4></td>
						<td style="padding-right: 30px;"><h4><a href="myorders.php" class="text-white">My Orders</a></h4></td>
						<td style="padding-right: 30px;"><h4><a href="#" class="text-white">Saved Cards</a></h4></td>
						<td style="padding-right: 30px;" align="right" width="500px"><h4><a href="emplogin.php?btn=logout" class="text-white">Log Out</a></h4></td>
					</tr>
				</table>
			</div>
			</div>
			<div class="container" style="margin-top: 20px; margin-bottom: 50px;">
				<p><a href="index.php" style="color: #b68834;">Home</a> > <a href="account-info.php" style="color: #b68834;">My Account</a></p>
			</div>
			<div class="container" >
				<div class="single-menu" >
				<div class="row" style="margin-top: 30px;">
					<div class="col-md-4">
						<?php echo "<img class='img-fluid' src='". $row->picUrl ."'style='border-radius: 10%;width:200px;'>" ?>
						<form action="upload.php" method="post" enctype="multipart/form-data">
							<h5 style="margin-top: 10px;">Select image to upload:</h5>
							<input type="file" name="fileToUpload" id="fileToUpload">
							<input type="submit" value="Upload Image" name="submit" class="genric-btn info-border circle" style="margin-top: 10px;">
						</form>
					</div>
				</div>
				<form action="action.php" method="post">
				<div class="row" style="margin-top: 50px;">
					<div class="col-md-3">
						<h5 style="text-align: right; margin-top: 10px;">Email:</h5>
					</div>
					<div class="col-md-5 ">
						<input type="" name="email" class="form-control" value="<?php echo $row->email;?>" disabled>
					</div>
					<style type="text/css">
						a:hover{
							color:#f44a40; ;
						}
						a{
							color:#b68834;
						}
						
						

					</style>
					<div class="col-md-2" >
						<h5 style="margin-left: 40px;"><a href="change-email.php" >CHANGE<br>EMAIL</a></h5> 
					</div>
					<div class="col-md-2">
						<h5><a href="change-password.php">CHANGE<br>PASSWORD</a></h5> 
					</div>
				</div>
				<div class="row" style="margin-top: 50px;">
					<div class="col-md-3">
						<h5 style="text-align: right; margin-top: 10px;">First Name:</h5>
					</div>
					<div class="col-md-5 ">
						<input type="" name="fname" class="form-control" onkeyup="checkFN(this.value)" value="<?php echo $row->firstname;?>">
					</div>
					<div class="col-md-2" style="margin-top: 10px"><h5 id="fnmsg"></h5></div>
				</div>
				<div class="row" style="margin-top: 50px;">
					<div class="col-md-3">
						<h5 style="text-align: right; margin-top: 10px;">Last Name:</h5>
					</div>
					<div class="col-md-5 ">
						<input type="" name="lname" class="form-control" onkeyup="checkLN(this.value)" value="<?php echo $row->lastname;?>">
					</div>
					<div class="col-md-2" style="margin-top: 10px"><h5 id="lnmsg"></h5></div>
				</div>
				<div class="row" style="margin-top: 50px;">
					<div class="col-md-3">
						<h5 style="text-align: right; margin-top: 10px;">Gender:</h5>
					</div>
					<?php 
					if ($row->gender=="M") { ?>
					<div class="col-md-5 ">
						<div style="width: 50%; float: left; text-align: center;"><input type="radio" name="gender" value="Male" checked><h5>Male</h5></div>
						<div style="width: 50%; float: right; "><input type="radio" name="gender" value="Female"><h5>Female</h5></div>
					</div>
					<?php }
					else{ ?>
					<div class="col-md-5 ">
						<div style="width: 50%; float: left; text-align: center;"><input type="radio" name="gender" value="Male" ><h5>Male</h5></div>
						<div style="width: 50%; float: right; "><input type="radio" name="gender" value="Female" checked><h5>Female</h5></div>
					</div>
					<?php }
					?>
				</div>
				<div class="row" style="margin-top: 50px;">
					<div class="col-md-3">
						<h5 style="text-align: right; margin-top: 10px;">Date Of Birth: </h5>
					</div>
					<div class="col-md-5 ">
						<input type="Date" name="dob" class="form-control" value="<?php echo $row->dob;?>">
					</div>
				</div>
				<div class="row" style="margin-top: 50px;">
					<div class="col-md-8 " align="right">
						<input class="genric-btn danger-border radius" type="submit" name="btn" value="UPDATE" style="margin-left: 70px; width: 100px;">
					</div>
				</div>
				</form>
			</div>
		</div>
		
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
			