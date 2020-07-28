<?php
session_start();
if (!isset($_SESSION['activeUser'])) {
  header("location:emplogin.php");
}
if ($_SESSION['usertype']!="customer") {
  header("location:error-page.php");
}
?>
<?php 
$err="";
extract($_REQUEST);
if ($err=="pw2_error") {
	echo "<h3 style='color: red;'>Incorrect Password.</h3>";
}
elseif ($err=="pw1_error") {
	echo "<h3 style='color: red;'>Passwords doesn't match.</h3>";
}
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
			pwFlag=cpwFlag=false; 
				function checkPW(pw){
          var numExp=/[0-9]/g;
          var lowerExp=/[a-z]/g;
          var upperExp=/[A-Z]/g;
          if (pw.length==0){
            m="";
            pwFlag=false;
          }
          else if (pw.length<8){
            m="Too Short";
            c="red";
            pwFlag=false;
          }
           else if (pw.length>20){
            m="Too Long";
            c="red";
            pwFlag=false;
          }
          else if (!numExp.test(pw)){
              m="Password must contain atleast one number.";
              c="red";
              pwFlag=false;
            }
          else if (!lowerExp.test(pw)){
              m="Password must contain atleast one lower-case letter.";
              c="red";
              pwFlag=false;
            }
          else if (!upperExp.test(pw)){
              m="Password must contain atleast one upper-case letter.";
              c="red";
              pwFlag=false;
            }
          else{
              m="Valid";
              c="green";
              pwFlag=true;
            }
          document.getElementById('pwmsg').style.color=c;
          document.getElementById('pwmsg').innerHTML=m;
        }
        function matchPW(cpw){
            if (cpw.length==0){
              m="";
              cpwFlag=false;
            }
            else if (cpw==document.getElementById('pwmatch').value) {
              m="Match";
              c="green";
              cpwFlag=true;
            }
            else {
                m="Password does not match.";
                c="red";
                cpwFlag=false;
            }
            document.getElementById('cpwmsg').style.color=c;
            document.getElementById('cpwmsg').innerHTML=m;
          }
			</script>
</head>
<body>
	<div class="generic-banner">
		<div class="container" style="padding-top: 30px; padding-bottom: 15px;">
			<div class="row">
				<div class="col-md-4">
					<h2 class="text-white">Change Password</h2>
				</div>
			</div>	
		</div>
	</div>

	<form method="post" action="action.php">
	<div class="container" style="margin-top: 50px;">
		<div class="row">
		<div class="col-md-3"></div>
		<div class="col-md-6">
		<div class="single-menu">
			<div class="row" style="margin-bottom: 20px; margin-top: 50px;">
				<div class="col-md-4">
					<h5 style="margin-top: 10px;">Current Password: </h5>
				</div>
				<div class="col-md-6">
					<input type="password" name="cpw" class="form-control">
				</div>
			</div>

			<div class="row" style="margin-bottom: 30px;">
				<div class="col-md-4">
					<h5 style="margin-top: 10px;">New Password: </h5>
				</div>
				<div class="col-md-6">
					<input type="password" name="npw" class="form-control" id="pwmatch" onkeyup="checkPW(this.value)">
				</div>
				<div class="col-md-2" style="margin-bottom: 10px; margin-top: 10px;"><h6 id="pwmsg"></h6></div>
			</div>

			<div class="row" style="margin-bottom: 50px;">
				<div class="col-md-4">
					<h5 style="margin-top: 10px;">Retype Password: </h5>
				</div>
				<div class="col-md-6">
					<input type="password" name="rpw" class="form-control" onkeyup="matchPW(this.value)">
				</div>
				<div class="col-md-2" ><h6 id="cpwmsg"></h6></div>
			</div>

			<div class="row" style="margin-bottom: 20px;">
				<div class="col-md-4"></div>
				<div class="col-md-7" align="right">
					<input type="submit" name="btn" value="CANCEL" class="genric-btn danger-border radius" style="margin-right: 20px;">
					<input type="submit" name="btn" value="SUBMIT" class="genric-btn success-border radius">
					<input type="hidden" name="type" value="password">
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
