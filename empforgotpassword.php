
	<html lang="zxx" class="no-js">
	<head>
		<!-- Mobile Specific Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon-->
		<link rel="shortcut icon" href="img/elements/fav.png">
		<!-- Author Meta -->
		<meta name="author" content="colorlib">
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
			<link rel="stylesheet" href="css/owl.carousel.css">
			<link rel="stylesheet" href="css/font-awesome.min.css">
			<link rel="stylesheet" href="css/nice-select.css">
			<link rel="stylesheet" href="css/magnific-popup.css">
			<link rel="stylesheet" href="css/bootstrap.css">
			<link rel="stylesheet" href="css/main.css">
		</head>
		<body>
			<?php
			extract($_POST);

			$label3 ='';
			$check3 = 0;;

			if (isset($reset))
			{
			  if(preg_match('/^\s*$/', $user))
			    {
			     $errorMsg[]="please enter username";
			    }

			  else if(preg_match('/^\s*$/', $password))
			    {
			        $errorMsg[]="please enter password";
			    }

			  else if(preg_match('/^\s*$/', $password1))
			    {
			     $errorMsg[]="please enter password confirmation";
			    }

			  else if(strcmp($password, $password1)!=0)
			    {
			      $errorMsg[]="Passwords do not match";
			    }


			    elseif(strlen($password) > 20 )
			    {
			    $errorMsg[]= "Password too long!";
			    }

			    elseif(strlen($password) < 8 )
			    {
			    $errorMsg[]= "Password too short!";
			    }

			    elseif(!preg_match("#[0-9]+#", $password ))
			    {
			    $errorMsg[]= "Password must include at least one number!";
			    }

			    elseif( !preg_match("#[a-z]+#", $password ) )
			    {
			    $errorMsg[]= "Password must include at least one lower-case letter!";
			    }

			    elseif( !preg_match("#[A-Z]+#", $password ) )
			    {
			    $errorMsg[]= "Password must include at least one upper-case letter!";
			    }


			  elseif(empty($errorMsg))
			  {
			    try{
			    require('connection.php');

			    $sql = "SELECT * FROM users";
			    $r=$db->prepare($sql);
			    $r->execute();

			          $new_password = password_hash($password, PASSWORD_DEFAULT);

			          foreach($r as $row)
			          {

			            if($row[7]==$user)
			            {
			                $id=$row[0];
			                $stmt = $db->prepare("UPDATE users SET password=? WHERE id=?");
			                $stmt->execute(array($new_password, $id));
			                $affect=$stmt->rowCount();
			                echo $affect;

			                if($affect>0)
			                {
			                    $check3=1;
			                  $label3="Password Changed";
			                }



			            }
			          }

			        if($check3==0)
			        { $errorMsg[]= "Wrong Information"; }

			    		 $db=null;
			       }//endoftry

			        catch(PDOException $ex)
			         {
			             die ("Error Message ".$ex->getMessage());
			         }
			  }//end of elseif


			} //end of isset if
			?>

			  <header id="header" id="home">
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
				        <a href="#"><img src="img/logo1.png" alt="" title="" /><h4 class="text-white">Choco 'n Chuckle</h4></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
				          <li class="menu-active"><a href="emplogin.php">Login Page</a></li>
									<li class="menu-active"><a href="index.php">Home Page</a></li>


				        </ul>
				      </nav><!-- #nav-menu-container -->
			    	</div>
			    </div>
			  </header><!-- #header -->

			<section class="generic-banner relative">
				<div class="container">
					<div class="row height align-items-center justify-content-center">
						<div class="col-lg-10">
							<div class="generic-banner-content">
								<h2 class="text-white">Password Change</h2>
								<p class="text-white">

									<?php
									if(isset($errorMsg))
									{
										 foreach($errorMsg as $error)
										 { echo"<strong> <font color='red'> $error </font> </strong>";
											 echo"<br />";
										 }
									}

									if($check3==1)
									{echo "<label> <font color='blue'> $label3 <br /> </font> </label>";
									echo "<label'> <font color='blue'> You are being redirected to Log-in page </font> </label> <br />";
									header('Refresh: 2; URL=emplogin.php');
									}
									?>

							</p>
							</div>




							<form method="post">

								<div class="mt-10">
									<input type="text" name="user" placeholder="User Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'User Name'" required class="single-input">
								</div>


								<div class="mt-10">
									<input type="password" name="password" placeholder="New Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'New Password'" required class="single-input">
								</div>

								<div class="mt-10">
									<input type="password" name="password1" placeholder="Confirm New Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Confirm New Password'" required class="single-input">
								</div>



								<div class="button-group-area">
										<input type="submit" name="reset" class="genric-btn default" value='&nbsp &nbsp &nbsp &nbsp Change Password  &nbsp &nbsp &nbsp &nbsp' >
								</div>
							</form>

							<div class="button-group-area">
<a href="signup.php" class="genric-btn default">&nbsp &nbsp &nbsp &nbsp &nbsp Sign up &nbsp &nbsp &nbsp &nbsp &nbsp</a>
	              <a href="emplogin.php" class="genric-btn default">&nbsp &nbsp &nbsp &nbsp Go Back! &nbsp &nbsp &nbsp &nbsp</a>

	          </div>







						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->

		<!-- About Generic Start -->
		<div class="main-wrapper">



			<!-- Start Generic Area -->
			<section class="about-generic-area section-gap">
				<div class="container border-top-generic">
					<h3 align="center" class="about-title mb-30">Instructions</h3>
					<div class="row">

<center>
						<div class="col-lg-12">
							<p>Recently, the US Federal government banned online casinos from operating in America by making it illegal to transfer money to them through any US bank or payment system. As a result of this law, most of the popular online casino networks such as Party Gaming and PlayTech left the United States. Overnight, online casino players found themselves being chased by the Federal government. But, after a fortnight, the online casino industry came up with a solution and new online casinos started taking root. These began to operate under a different business umbrella, and by doing that, rendered the transfer of money to and from them legal. A major part of this was enlisting electronic banking systems that would accept this new clarification and start doing business with me. Listed in this article are the electronic banking systems that accept players from the United States that wish to play in online casinos.</p>
						</div>
</center>

					</div>
				</div>
			</section>
			<!-- End Generic Start -->



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
			<script src="js/mail-script.js"></script>
			<script src="js/main.js"></script>
		</body>
	</html>
