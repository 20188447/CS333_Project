<?php
session_start();
if (!isset($_SESSION['activeUser'])) {
  header("location:emplogin.php");
}
if ($_SESSION['usertype']!="admin") {
  header("location:error-page.php");
}
$del="";
extract($_POST);
if (!empty($del)) {
	require("connection.php");
  $sql="update items set active=0 where id='$id'";
	//$sql="delete from items where id='$id'";
	$rs=$db->exec($sql);
	header("location:viewmenu.php");
}

?>
<!DOCTYPE html>
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
	<?php 
	require ('connection.php');
	$sql="select * from items where id ='$id'";
	$rs=$db->query($sql);
	while ($row=$rs->fetch(PDO::FETCH_OBJ)){
	?>
    <div class="container" style="padding-top: 30px; padding-bottom: 15px; margin-top: 200px;">
    <div class="row">
    <div class="col-md-2"></div>
    <div class="col-md-8">
    <div class="single-menu">
      <div class="row">
      	<div class="col-md-1"></div>
        <div class="col-md-10">
          <h3>Are you sure you want to delete item</h3>
          <h3>Name: <span style="color: #b68834;"><?php echo $row->name; ?></span> ?</h3>
        </div>
      </div>
      <div class="row" style="margin-top: 20px;">
      	<div class="col-md-8"></div>
      	<div class="col-md-2" align="right" >
      		<form method="post" >
      		<input type="submit" name="del" value="Delete" class="genric-btn primary-border radius">
      		<input type="hidden" name="id" value="<?php echo $id; ?>">
      		</form>
      	</div>
      	<div class="col-md-2">
      		<form method="post" action="viewmenu.php">
      		<input type="submit" name="cancel" value="Cancel" class="genric-btn primary-border radius">
      		</form>
      	</div>
      </div>
     </div>
     </div>
     </div>

    </div>
  <br>


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