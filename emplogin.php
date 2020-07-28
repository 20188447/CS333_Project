<?php
session_start();
$btn="";
extract($_REQUEST);
if ($btn=="logout") {
  session_unset();
}
extract($_POST);



$label = $lable2 = $notwrong1 = " ";

if (isset($login))
{

  if(preg_match('/^\s*$/', $user))
    {
     $errorMsg[]="please enter username";
    }

  else if(preg_match('/^\s*$/', $password))
    {
     $errorMsg[]="please enter Password";
    }

    elseif(empty($errorMsg))
    {

    try{

      require('connection.php');
      $sql = "SELECT * FROM users";
      $rs=$db->prepare($sql);
      $rs->execute();

      $db=null;
    }

    catch(PDOException $ex)
    {
        die ("Error Message ".$ex->getMessage());
    }

    $directed='NOT';

    foreach($rs as $row)
    {

        if(($row[7]==$user)&&(password_verify($password, $row[8])))
        {


          if($row[5]=='admin')
          {
          $directed='directed';
          $arr = array($row[1],$row[2]);
          $username = strtoupper(join(" ",$arr));
          $_SESSION["admin"] = $username;
          $_SESSION["activeUser"] = $row[0];
          $_SESSION["usertype"] = $row[5];
          header("location: admininterface.php");
          }

          if($row[5]=='customer')
          {
          $directed='directed';
          $arr = array($row[1],$row[2]);
          $username = strtoupper(join(" ",$arr));
          $_SESSION["admin"] = $username;
          $_SESSION["activeUser"] = $row[0];
          $_SESSION["usertype"] = $row[5];
          header("location: index.php");
          }

          if($row[5]=='staff')
          {
          $directed='directed';
          $arr = array($row[1],$row[2]);
          $username = strtoupper(join(" ",$arr));
          $_SESSION["staff"] = $username;
          $_SESSION["activeUser"] = $row[0];
          $_SESSION["usertype"] = $row[5];
          header("location: staff-orders.php");
          }


        }
    }

    if($directed=='NOT')
      {
        $errorMsg[]="Invalid Login Information. Please Try-Again !! <br /> ";
      }


}
} //end of isset if
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
  <body style="background-image: url('img/menu-bg.jpg');">

      <header style="padding-top: 10px; padding-bottom: 10px;" class="generic-banner">
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
          <div class="row  justify-content-between d-flex">
            <div id="logo" style="text-align: left">
              <a href="#"><img src="img/logo1.png" alt="" title="" /></a>
              <h4 style="padding-top: 10px;"class="text-white">Choco 'n Chuckle</h4>
            </div>
            <nav id="nav-menu-container" style="margin-top: 20px;" >
                <ul class="nav-menu sf-js-enabled sf-arrows" style="touch-action: pan-y;">
                  <li class="menu-active"><a href="signup2.php">Sign Up</a></li>
                  <li class="menu-active"><a href="index.php">Homepage</a></li>
                </ul>
              </nav>

          </div>
        </div>
      </header><!-- #header -->


    <section style="margin-top: 30px;">
      <div class="container" style="padding-top:40px;">
        <div class="row">
          <div class="col-lg-3"></div>
          <div class="col-lg-6">
            <div class="single-menu generic-banner">
              <div class="row" style="margin-bottom: 30px; padding-top: 80px;">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                  <h2 class="text-white">Login Page</h2><br>
                  <p class="text-white">Welcome back! Login to access the sweet marketplace</p>

                  <p class="text-white">
                              <?php
                              if(isset($errorMsg))
                              {
                                 foreach($errorMsg as $error)
                                 { echo"<strong> <font color='red'> $error </font> </strong>";
                                   echo"<br />";
                                 }
                              }
                              ?>
                  </p>

                </div>
              </div>
              <form method="post">
              <div class="row"style="margin-bottom: 20px;">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                  <input type="text" name="user" placeholder="User Name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'User Name'" required class="single-input">
                </div>
              </div>
              <div class="row" style="margin-bottom: 150px;">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                  <input type="password" name="password" placeholder="Password" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Password'" required class="single-input">
                </div>
              </div>
              <div class="row" style="margin-bottom: 20px;">
                <div class="col-lg-1"></div>
                <style type="text/css">
                  #fp{
                    font-size: 12pt;
                    font-weight: bold;
                    color: white;
                  }
                  #fp:hover{
                    color: #f44a40;
                  }
                </style>
                <div class="col-lg-5"><a id="fp" href="empforgotpassword.php">Forgot Password ?</a></div>
                <div class="col-lg-5"><input style="font-size: 10pt;" type="submit" name="login" class="genric-btn success-border" value='&nbsp &nbsp &nbsp &nbsp &nbsp Sign-in &nbsp  &nbsp &nbsp &nbsp &nbsp' ></div>
              </div>
            </form>
            </div>
          </div>
        </div>
    </section>


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
