<?php
session_start();
$empid='';
extract($_POST);
if(!isset($_SESSION["admin"]))
{
   header('location: emplogin.php');
}

else{


	$label1 = '';
	$check1 = $taken = 0;

	if($empid=='')
	{
	  header('Location: managestaff.php');
	}

	elseif(isset($cancel))
	{
	  header('Location: managestaff.php');
	}

	elseif (isset($change))
	{
	      try
	      {
	        require('connection.php');

	    	    if(empty($errorMsg))
	          {

	           $sql="UPDATE users SET type='$Roles' WHERE id= :empid";
	           $r=$db->prepare($sql);
						 $r->bindparam(':empid',$empid);
						 $r->execute();
						 $affect=$r->rowCount();



	           if($affect>0)
	            {
	                $check1 = 1;

	                header('Refresh: 0; URL=managestaff.php?changeid=1');
	            }
	          }

	    		 $db=null;
	       }//endoftry

	        catch(PDOException $ex)
	         {
	             die ("Error Message ".$ex->getMessage());
	         }


	} //end of isset if
?>

	<!DOCTYPE html>
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

			    	</div>
			    </div>
			  </header><!-- #header -->

        <div style="background-image: url('img/header-bg1.jpg'); width: 100%; height: 100px;" ></div>


			<section class="generic-banner relative">
				<div class="container">
					<div class="row height align-items-center justify-content-center">
						<div class="col-lg-10">
							<div class="generic-banner-content">
								<h1 class="text-white">Staff Role Change</h1>
								<p class="text-white"> Select the Role For The Staff </p>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- End banner Area -->

		<!-- About Generic Start -->
		<div class="main-wrapper">

<!-- form start ---------------------------------------------------------------------------------->

			<!-- Start Generic Area -->
			<section class="about-generic-area section-gap">
				<div class="container border-top-generic">
					<h3 align="left" class="about-title mb-30"> Employee Infomation </h3>
					<div class="row">

						<div class="col-lg-12">


							<?php

							if(isset($errorMsg))
							{
								 foreach($errorMsg as $error)
								 { echo"<strong> <font color='red'> $error  </font> </strong>";
									 echo"<br />";
								 }
							}



							try
							{
								require('connection.php');
										$sql = "SELECT * FROM users WHERE id=:empid;";
										$rs=$db->prepare($sql);
										$rs->bindparam(':empid',$empid);
										$rs->execute();

								 $db=null;
							 }//endoftry

								catch(PDOException $ex)
								 {
										 die ("Error Message ".$ex->getMessage());
								 }

							while ($rows = $rs->fetch())
							{
							?>
							<form method="post">

<div align="left">
<div class="split left">

							<input type="hidden" value= "<?php echo $empid;?>" name="empid">

							<label>Employee ID: </label> <?php echo " $rows[0]"; ?> <br />

							<label>Name: </label> <?php echo " $rows[1] "; echo $rows[2]; ?> <br />

							<label>Username: </label> <?php echo " $rows[7]"; ?> <br /> <br />


<!-- search for admin -->

							<?php
							try{
							require('connection.php');
							$sql = "SELECT * FROM users WHERE type=:admin;";

							$rs=$db->prepare($sql);
							$search="admin";
							$rs->bindparam(':admin',$search);
							$rs->execute();

							$count=0;
							foreach($rs as $row1){ $count=$count+1;}
							$db=null;
							}//endoftry

							catch(PDOException $ex)
							{
							 die ("Error Message ".$ex->getMessage());
							}

// end search for admin -->

//    for staff

							if($rows[5]=="staff"){
							?>

							<labal>Please select Role to change: </labal>

							<div class="default-select" id="default-select" >
								<select name="Roles">
									<option  value="staff" selected>Staff</option>
									<option value="admin">Admin</option>
                  <option value="customer">Customer</option>
								</select>
							</div>



<br />
<h6 align='left'> <div class="button-group-area mt-10">
<input type='submit' class="genric-btn primary-border circle arrow" value="CHANGE" name="change">
<input type='submit' class="genric-btn primary-border circle arrow" value="CANCEL" name="cancel">
</div> </h6>

							<?php
							}
//   end  for staff

//   for one admin
							elseif(($count<=1)&&($rows[5]=="admin"))
							{echo"There is only one Admin! <br />";
                echo"<h6 align='left' > <div class='button-group-area mt-10'>";
                echo"<input type='submit' class='genric-btn primary-border circle arrow' value='CANCEL' name='cancel'>";
                echo"</div> </h6>";
              }

//  end for one admin


//  for admin
							elseif(($count>1)&&($rows[5]=="admin"))
							{?>

							<p>Please select Role to change: </p>

<div  class="default-select" id="default-select" >
								<select align="center" name="Roles">
									<option  value="staff">Staff</option>
									<option selected value="admin">Admin</option>
                  <option value="customer">Customer</option>
								</select>
</div>

<br />
							<h6 align='left'> <div class="button-group-area mt-10">
						  <input type='submit' class="genric-btn primary-border circle arrow" value="CHANGE" name="change">
							<input type='submit' class="genric-btn primary-border circle arrow" value="CANCEL" name="cancel">
						</div> </h6>



							<?php
							}
  //   end  for admininterface

  //   for customer
              elseif($rows[5]=="customer")
              {?>

              <p>Please select Role to change: </p>

<div  class="default-select" id="default-select" >
                <select align="center" name="Roles">
                  <option  value="staff">Staff</option>
                  <option  value="admin">Admin</option>
                  <option selected value="customer">Customer</option>
                </select>
</div>

<br />
              <h6 align='left'> <div class="button-group-area mt-10">
              <input type='submit' class="genric-btn primary-border circle arrow" value="CHANGE" name="change">
              <input type='submit' class="genric-btn primary-border circle arrow" value="CANCEL" name="cancel">
            </div> </h6>



              <?php
            }?>



</div>
</div>
							</form>

<div class="split right">
	<h6 align="right">“Change will not come if we wait for some other person,or if we <br>wait for some other time. We are the ones we've been waiting <br>for. We are the change that we seek.”
	― Barack Obama </h6>
</div>

							<?php
							}
							?>



							  </div>


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

<?php } ?>
