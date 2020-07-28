<?php
session_start();
$changeid=0;
extract($_REQUEST);
if (!isset($_SESSION['activeUser'])) {
  header("location:emplogin.php");
}
if ($_SESSION['usertype']!="admin") {
  header("location:error-page.php");
}

else{

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
              <ul class="nav-menu">

 <li class="menu-active"><a href="admininterface.php">Admin Homepage</a></li>
                <li class="menu-active"><a href="a-menu.php">Manage Menu</a></li>
                  <li class="menu-active"><a href="viewallemp.php" >View all Staff</a></li>
                      <li class="menu-active"><a href="addnewemp.php">Add New Staff</a></li>
                                <li class="menu-active"><a href="logout.php">Sign-out</a></li>


              </ul>
			    	</div>
			    </div>
			  </header><!-- #header -->

        <div style="background-image: url('img/header-bg1.jpg'); width: 100%; height: 100px;" ></div>


			<section class="generic-banner relative">
				<div class="container">
					<div class="row height align-items-center justify-content-center">
						<div class="col-lg-10">
							<div class="generic-banner-content">
								<h2 class="text-white">Manage Staff Roles</h2>
								<p class="text-white">Below is The List of All Restaurent Admin, Staff and Users With The Option to Change Role.</p>
                <?php
                if($changeid==1)
                { echo "<p class='text-white'> <font color='blue'> Change Succussful!! </font></p>";}
                ?>
              </div>
						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->

		<!-- About Generic Start -->
		<div class="main-wrapper">



			<div class="main-wrapper">
			<div class="whole-wrap">
			<div class="container">
				<div class="section-top-border">
          <p> <center> <font size='4'> <b> List of Restaurent Admin</b> </font> </center> </p>

				<div class="progress-table-wrap">
					<div class="progress-table">

			<?php
			try{
			require('connection.php');

			$sql = "SELECT * FROM users WHERE type=:type";
			$r=$db->prepare($sql);
      $type="admin";
      $r->bindParam(':type',$type);
      $r->execute();
			?>


						<div class="table-head">
							<div class="serial">ID </div>
							<div class="serial"> </div>

							<div class="country">Name</div>
							<div class="serial"> </div>


							<div class="visit">Role</div>
              <div class="serial"> </div>

              <div class="visit">Change?</div>


						</div>


						<?php while($row = $r -> fetch())
						{
							?>
						<div class="table-row">
							<div class="serial"> <?php echo $row[0]; ?> </div>
							<div class="serial"> </div>


							<div class="country"> <?php echo $row[1]; echo" $row[2]"; ?> </div>
							<div class="serial"> </div>


							<div class="visit"> <?php echo $row[5]; ?> </div>
              <div class="serial"> </div>

              <div class="visit">
                <?php $id=$row[0];?>
                <form method='post' action='confirmmanage.php'>
                <input type='hidden' value='<?php echo $id; ?>' name='empid'>


                <h6 align='center'> <div class="button-group-area mt-10">
                <input type='submit' class="genric-btn primary-border circle arrow" value='Edit'>
              </div> </h6>
              </form>

            </div>


							</div>
						<?php } ?>

			<?php
							$db=null;
						}

						catch(PDOException $ex)
						 {
								 die ("Error Message ".$ex->getMessage());
						 }
			?>
						</div>


  <p> <center> <font size='4'> <b> List of Restaurent Staff</b> </font> </center> </p>

            <div class="progress-table">

        <?php
        try{
        require('connection.php');

        $sql = "SELECT * FROM users WHERE type=:type";
        $r=$db->prepare($sql);
        $type="staff";
        $r->bindParam(':type',$type);
        $r->execute();
        ?>


              <div class="table-head">
                <div class="serial">ID </div>
                <div class="serial"> </div>

                <div class="country">Name</div>
                <div class="serial"> </div>

                <div class="visit">Role</div>
                <div class="serial"> </div>

                <div class="visit">Change?</div>


              </div>


              <?php while($row = $r -> fetch())
              {
                ?>
              <div class="table-row">
                <div class="serial"> <?php echo $row[0]; ?> </div>
                <div class="serial"> </div>


                <div class="country"> <?php echo $row[1]; echo" $row[2]"; ?> </div>
                <div class="serial"> </div>

                <div class="visit"> <?php echo $row[5]; ?> </div>
                <div class="serial"> </div>

                <div class="visit">
                  <?php $id=$row[0];?>
                  <form method='post' action='confirmmanage.php'>

                  <input type='hidden' value='<?php echo $id; ?>' name='empid'>


                  <h6 align='center'> <div class="button-group-area mt-10">
                  <input type='submit' class="genric-btn primary-border circle arrow" value='Edit'>


                </div> </h6>
                </form>

              </div>


                </div>
              <?php } ?>

        <?php
                $db=null;
              }

              catch(PDOException $ex)
               {
                   die ("Error Message ".$ex->getMessage());
               }
        ?>
              </div>








              <p> <center> <font size='4'> <b> List of Restaurent Customer / User</b> </font> </center> </p>

                        <div class="progress-table">

                    <?php
                    try{
                    require('connection.php');

                    $sql = "SELECT * FROM users WHERE type=:type";
                    $r=$db->prepare($sql);
                    $type="customer";
                    $r->bindParam(':type',$type);
                    $r->execute();
                    ?>


                          <div class="table-head">
                            <div class="serial">ID </div>
                            <div class="serial"> </div>

                            <div class="country">Name</div>
                            <div class="serial"> </div>

                            

                            <div class="visit">Role</div>
                            <div class="serial"> </div>

                            <div class="visit">Change?</div>


                          </div>


                          <?php while($row = $r -> fetch())
                          {
                            ?>
                          <div class="table-row">
                            <div class="serial"> <?php echo $row[0]; ?> </div>
                            <div class="serial"> </div>


                            <div class="country"> <?php echo $row[1]; echo" $row[2]"; ?> </div>
                            <div class="serial"> </div>


                            


                            <div class="visit"> <?php echo $row[5]; ?> </div>
                            <div class="serial"> </div>

                            <div class="visit">
                              <?php $id=$row[0];?>
                              <form method='post' action='confirmmanage.php'>

                              <input type='hidden' value='<?php echo $id; ?>' name='empid'>


                              <h6 align='center'> <div class="button-group-area mt-10">
                              <input type='submit' class="genric-btn primary-border circle arrow" value='Edit'>
                            </div> </h6>
                            </form>

                          </div>


                            </div>
                          <?php } ?>

                    <?php
                            $db=null;
                          }

                          catch(PDOException $ex)
                           {
                               die ("Error Message ".$ex->getMessage());
                           }
                    ?>
                          </div>







						<section class="about-generic-area section-gap">
							<div class="container border-top-generic">
								<h6 align='center' class="about-title mb-30">
									<div class="button-group-area mt-10">
										<a href="admininterface.php" class="genric-btn primary-border radius">Go to Admin Homepage</a>
										<a href="viewallemp.php" class="genric-btn primary-border radius">List of All Restaurent Staff</a>
                    <a href="addnewemp.php" class="genric-btn primary-border radius"> &nbsp &nbsp &nbsp Add New Staff &nbsp &nbsp &nbsp</a>

									</div>

								</h6>
											</div>
										</section>

							</div>
						</section>







						</div>
					</div>
				</div>
			</div>
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
			<script src="js/mail-script.js"></script>
			<script src="js/main.js"></script>
		</body>
	</html>

<?php } ?>
