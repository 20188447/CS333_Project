<?php
session_start();

extract($_POST);
if (!isset($_SESSION['activeUser'])) {
  header("location:emplogin.php");
}
if ($_SESSION['usertype']!="admin") {
  header("location:error-page.php");
}
else{

$label1 = '';
$check1 = $taken = 0;

if (isset($additem))
{
  if(empty(trim($name)))
    {
     $errorMsg[]="please enter name";
    }

    elseif(!preg_match("/^[a-zA-Z ]*$/",$name))
        {
          $errorMsg[] = "Only letters and spaces allowed for name";
        }

  else if(empty(trim($price)))
    {
     $errorMsg[]="please enter Price";
    }

    elseif(!preg_match("/^[0-9\.]*$/",$price))
        {
          $errorMsg[] = "Only number allowed for price";
        }


  else if(empty(trim($description)))
    {
     $errorMsg[]="please enter description";
    }

    else if(empty(trim($Category)))
      {
       $errorMsg[]="please enter Category";
      }

  elseif(empty($errorMsg))
  {
      try
      {
        require('connection.php');

    	    if(empty($errorMsg))
          {

           $sql="insert into items(id,name,description,price,category) values(NULL, '$name', '$description', '$price', '$Category')";
           $r=$db->exec($sql);   //sql insert query

           if($r>0)
            {
                $check1 = 1;
                $label1="Added Successfull..... ";
                header("location:a-menu.php");
            }
          }

    		 $db=null;
       }//endoftry

        catch(PDOException $ex)
         {
             die ("Error Message ".$ex->getMessage());
         }
  }//end of elseif


} //end of isset if
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
</head>
<body>
  <div class="generic-banner">
    <div class="container" style="padding-top: 30px; padding-bottom: 15px;">
      <div class="row">
        <div class="col-md-3">
          <h2 class="text-white">Add New Item</h2>
        </div>
      </div>
    </div>
  </div>
  <br>

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

  <div class="container" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="single-menu">
          <div class="row">
            <form method="post">
          </div>
          <div class="row" style="margin-bottom: 20px; margin-top: 50px;">
            <div class="col-md-1"></div>
            <div class="col-md-4">
              <h5 style="margin-top: 10px;">Name: </h5>
            </div>
            <div class="col-md-6">
              <input type="hidden"  name="id">
              <input type="input"  name="name" >
            </div>
          </div>
          <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-1"></div>
            <div class="col-md-4">
              <h5 style="margin-top: 10px;">Price: </h5>
            </div>
            <div class="col-md-6">
              <input type="input"   name="price">
            </div>
          </div>
          <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-1"></div>
            <div class="col-md-4">
              <h5 style="margin-top: 10px;">Description: </h5>
            </div>
            <div class="col-md-6">
              <textarea name="description" rows="4" cols="35" style="resize: none;">

              </textarea>
            </div>
          </div>
          <div class="row" style="margin-bottom: 50px;">
            <div class="col-md-1"></div>
            <div class="col-md-4">
              <h5 style="margin-top: 10px;">Category: </h5>
            </div>
            <div class="col-md-6">
              <select name="Category">
                <option value="" selected> Please Select</option>
                <option value="Pancake">Pancake</option>
                <option value="Waffle">Waffles</option>
                <option value="Milkshake">Milkshakes</option>
              </select>
            </div>
          </div>
          <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-4"></div>
            <div class="col-md-7" align="right">
              <input type="submit"  value="ADD" name="additem" class="genric-btn primary-border radius" >
              <a href="a-menu.php"class="genric-btn primary-border radius">CANCEL</a>
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
<?php
}
?>
