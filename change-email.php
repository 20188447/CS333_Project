<!DOCTYPE html>
<?php 
session_start();
if (!isset($_SESSION['activeUser'])) {
  header("location:emplogin.php");
}
if ($_SESSION['usertype']!="customer") {
  header("location:error-page.php");
}
$err="";
extract($_REQUEST);
if ($err=="password_error") {
	echo "<h3 style='color: red;'>Incorrect Password.</h3>";
}
elseif ($err=="email_error") {
	echo "<h3 style='color: red;'>Email doesn't match.</h3>";
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
			<script type="text/javascript" src="input-validation.js"></script>
			 <script type="text/javascript">
    	var cemFlag= false;

        /*function checkEM(em){
          var nameExp=/^[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z]+\.[a-zA-Z]{2,4}/i;
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
        }*/
        function matchEM(cem){
          	if (cem.length==0){
            	m="";
            	cemFlag=false;
          	}
          	else if (cem==document.getElementById('match').value) {
          		m="Match";
            	c="green";
            	cemFlag=true;
          	}
          	else {
          		m="Email does not match.";
              	c="red";
              	cemFlag=false;
          	}
          	document.getElementById('cemmsg').style.color=c;
          	document.getElementById('cemmsg').innerHTML=m;
          }
    </script>
</head>
<body>
	<div class="generic-banner">
		<div class="container" style="padding-top: 30px; padding-bottom: 15px;">
			<div class="row">
				<div class="col-md-3">
					<h2 class="text-white">Change Email</h2>
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
				<div class="col-md-1"></div>
				<div class="col-md-3">
					<h5 style="margin-top: 10px;">Current Password: </h5>
				</div>
				<div class="col-md-6">
					<input name="pw" class="form-control">
				</div>
			</div>

			<div class="row" style="margin-bottom: 30px;">
				<div class="col-md-1"></div>
				<div class="col-md-3">
					<h5 style="margin-top: 10px;">New Email: </h5>
				</div>
				<div class="col-md-6">
					<input name="ne" onkeyup="checkEM(this.value)" class="form-control" id="match">
				</div>
				<div class="col-md-1"><h6 id="emmsg"></h6></div>
			</div>

			<div class="row" style="margin-bottom: 50px;">
				<div class="col-md-1"></div>
				<div class="col-md-3">
					<h5 style="margin-top: 10px;">Retype Email: </h5>
				</div>
				<div class="col-md-6">
					<input name="re" onkeyup="matchEM(this.value)" class="form-control">
				</div>
				<div class="col-md-1"><h6 id="cemmsg"></h6></div>
			</div>

			<div class="row" style="margin-bottom: 20px;">
				<div class="col-md-4"></div>
				<div class="col-md-7" align="right">
					<input type="submit" name="btn" value="CANCEL" class="genric-btn danger-border radius" style="margin-right: 20px;">
					<input type="submit" name="btn" value="SUBMIT" class="genric-btn success-border radius">
					<input type="hidden" name="type" value="email">
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
