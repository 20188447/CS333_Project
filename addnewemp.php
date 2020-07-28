<?php
session_start();
if (!isset($_SESSION['activeUser'])) {
  header("location:emplogin.php");
}
if ($_SESSION['usertype']!="admin") {
  header("location:error-page.php");
}

else{
$check1=0;
$taken=0;

extract($_POST);

if(isset($add))
{
			if(empty(trim($fname)))
					{
					 $errorMsg[]="please enter first name";
					}

					elseif(empty(trim($lname)))
							{
							 $errorMsg[]="please enter last name";
							}

			elseif(!preg_match("/^[a-zA-Z]*$/",$fname))
					{
						$errorMsg[] = "Only letters  allowed for first name";
					}

					elseif(!preg_match("/^[a-zA-Z]*$/",$lname))
							{
								$errorMsg[] = "Only letters  allowed for last name";
							}

			else if(empty(trim($cpr)))
				{
				 $errorMsg[]="please enter CPR number";
				}


			elseif(!preg_match("/^[0-9]{9}$/", $cpr)) {
				    $errorMsg[]="Invalid CPR number";
				}

				elseif(preg_match('/^\s*$/', $day))
				 {
						 $errorMsg[]="please enter day of birth";
				 }

				elseif(preg_match('/^\s*$/', $month))
			 {
					 $errorMsg[]="please enter month of birth";
				}
				elseif(preg_match('/^\s*$/', $year))
				{
					$errorMsg[]="please enter year of birth";
				}

				elseif(preg_match('/^\s*$/', $email))
					{
					 $errorMsg[]="please enter email";
					}

					elseif(!preg_match("/^[0-9]{1,2}$/",$day))
							{
								$errorMsg[] = "Only number allowed for day";
							}
							elseif(!preg_match("/^[0-9]{1,2}$/",$month))
									{
										$errorMsg[] = "Only number allowed for month";
									}
									elseif(!preg_match("/^[0-9]{2,4}$/",$year))
											{
												$errorMsg[] = "Only number allowed for year";
											}

				elseif(!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", $email))
				{
				 $errorMsg[]="please enter valid email";
				}

			else{

					try
					{
						require('connection.php');

								$sql = "SELECT * FROM users";
							 $r=$db->query($sql);

							 foreach ($r as $value)
									{
										if($value[10]==$cpr)
										{
											if(($value[5]=='admin')||($value[5]=='staff'))
												{$errorMsg[]="Staff Memembr is Already Added";}

												elseif($value[5]=='customer')
													{$errorMsg[]="Memembr is normal user!! You can change role in Manage Role Section";}

											$taken=1;
											}
								 }

								if(empty($errorMsg) && $taken==0)
								 {
									$new_password = password_hash($cpr, PASSWORD_DEFAULT);

									$last4 = substr($cpr,-4);
									$arr = array($fname,$last4);
									$username= join("",$arr);

									$sql="insert into users values(:uid, :fname, :lname, :gender, :email, :type, :dob, :username, :password,:picurl, :cpr)";
									$stmt=$db->prepare($sql);
									$null=NULL;
									$stmt->bindParam(':uid',$null);
									$stmt->bindParam(':fname',$fname);
									$stmt->bindParam(':lname',$lname);
									$stmt->bindParam(':gender',$gender);
									$stmt->bindParam(':email',$email);
									$stmt->bindParam(':type',$roles);
									$birth="$year-$month-$day";
									$stmt->bindParam(':dob',$birth);


									$stmt->bindParam(':username',$username); //-----
									$stmt->bindParam(':password',$new_password);
									$stmt->bindParam(':picurl',$null);
									$stmt->bindParam(':cpr',$cpr);

									$stmt->execute();
									$r=$stmt->rowCount();

									if($r>0)
									 {
											 $check1 = 1;
											 $label1="Added Successfully..... Username is $username and Password is Selected as default (CPR Number) ";
									 }
								 }

							 $db=null;



						}

							catch(PDOException $ex)
							 {
									 die ("Error Message ".$ex->getMessage());
							 }
		}
}


?>
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
				        <a href="index.php"><img src="img/logo1.png" alt="" title="" /><h4 class="text-white">Choco 'n Chuckle</h4></a>
				      </div>
				      <nav id="nav-menu-container">
				        <ul class="nav-menu">
 <li class="menu-active"><a href="admininterface.php">Admin Homepage</a></li>
                <li class="menu-active"><a href="a-menu.php">Manage Menu</a></li>
                  <li class="menu-active"><a href="viewallemp.php" >View all Staff</a></li>
                      <li class="menu-active"><a href="managestaff.php">Manage Staff Roles </a></li>
                      
                                <li class="menu-active"><a href="logout.php">Sign-out</a></li>
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
								<h2 class="text-white">Add New Staff</h2>
								<p class="text-white"> Please Fill The Form Below To Add New Staff  </p>
								<p class="text-white">
															<?php
														  if(isset($errorMsg))
														  {
														     foreach($errorMsg as $error)
														     { echo"<strong> <font color='red'> $error  </font> </strong>";
														       echo"<br />";
														     }
														  }

														if( $check1==1)
														{echo "<label> <font color='blue'> $label1 <br /> </font> </label>";
														}
														?>
								</p>
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
					<center>
					<h3 class="about-title mb-30">New Staff Form</h3>
					<div class="row">

						<div class="col-lg-12">

<!-- form -->
							<form method="post">


								<div class="mt-10">
									<input type="text" name="fname" placeholder="First Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'First Name'" required class="single-input">
								</div>

								<div class="mt-10">
									<input type="text" name="lname" placeholder="Last Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Last Name'" required class="single-input">
								</div>

								<br>


									<div class="switch-wrap d-flex justify-content-between">
									<p><label>Gender : MALE &nbsp</label> <input type="radio" checked name="gender" value="M"><br>
											<label>&nbsp &nbsp  Gender : FEMALE &nbsp</label> <input type="radio" name="gender" value="F"><br>

									</p>
								</div> </center>
&nbsp &nbsp Date of Birth: <center>
									<div class="mt-10">

										<div class="form-select" id="default-select">
																			<select name = "day">
													<option selected value=" " >Day</option>
													<?php
														for($day = 1; $day <= 31; $day++){
														 echo "<option value = '".$day."'>".$day."</option>";
											}
										?>
									</select>
										</div>
									</div>

									<div class="mt-10">
										<div class="form-select" id="default-select" >
										<select name = "month">
											<option selected value=" " >Month</option>
											<?php
												for($month = 1; $month <= 12; $month++)
												echo"<option value = '".$month."'>".$month."</option>";
											?>
										</select>
										</div>
									</div>

									<div class="mt-10">
										<div class="form-select" id="default-select" name="year">
											<select name = "year">
					<option selected value="" >Year</option>
					<?php
					$y = date("Y", strtotime("+8 HOURS"));
					for($year = 1950; $y >= $year; $y--){
						echo "<option value = '".$y."'>".$y."</option>";
					}
					?>
					</select>
										</div>
									</div>

									<div class="mt-10">
										<input type="text" name="email" placeholder="Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email'" required class="single-input">
									</div>

								<div class="mt-10">
									<input type="text" name="cpr" placeholder="CPR Number" onfocus="this.placeholder = ''" onblur="this.placeholder = 'CPR Number'" required class="single-input">
								</div>

								<br>

<div class="default-select" id="default-select" >

	<select name="roles">
		<option selected value="staff">Staff</option>
		<option value="admin">Admin</option>
	</select>
</div>
<br>





								<h3 align='center' class="about-title mb-30">
												<div class="button-group-area mt-10">
													<input type="submit" name="add" class="genric-btn danger-border radius" value='&nbsp &nbsp &nbsp &nbsp &nbsp ADD &nbsp  &nbsp &nbsp &nbsp &nbsp' >
											</div>
								</h3>
							</form>
<!-- form end -->
					</div>
</center>
				</div>
				<h3 align='center' class="about-title mb-30">
					<div class="button-group-area mt-10">
						<a href="admininterface.php" class="genric-btn primary-border radius">Go To Admin Homepage</a>
							<a href="viewallemp.php" class="genric-btn primary-border radius">&nbsp View All Employees &nbsp</a>
					</div>
				</h3>
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

<?php } ?>
