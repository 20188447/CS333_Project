<?php
session_start();
if (!isset($_SESSION['activeUser'])) {
  header("location:emplogin.php");
}
if ($_SESSION['usertype']!="admin") {
  header("location:error-page.php");
}
else{
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
            <nav id="nav-menu-container">
              <ul class="nav-menu">
                <li class="menu-active"><a href="a-menu.php">Manage Menu</a></li>
                  <li class="menu-active"><a href="viewallemp.php" >View all Staff</a></li>
                    <li class="menu-active"><a href="addnewemp.php">Add New Staff</a></li>
                      <li class="menu-active"><a href="managestaff.php">Manage Staff Roles </a></li>
                                <li class="menu-active"><a href="logout.php">Sign-out</a></li>
              </ul>
            </nav><!-- #nav-menu-container -->

          </div>
        </div>
      </header><!-- #header -->

      <div style="background-image: url('img/header-bg1.jpg'); width: 100%; height: 100px;" ></div>

    <section class="generic-banner relative">
      <div class="container">
        <div class="row height align-items-center justify-content-center">
          <div class="col-lg-10">
            <div class="generic-banner-content">
              <h1 class="text-white">Welcome <?php echo $_SESSION['admin'];?> </h1>
              <p class="text-white">
                Please Scroll down and Select From Options Below, What You Wish To Do:
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
        <h1 align='center' class="about-title mb-30">Options</h1>
        <h3 align='center' class="about-title mb-30">
          <div class="button-group-area mt-10">
            <a href="a-menu.php" class="genric-btn primary-border radius">&nbsp &nbsp &nbsp  Manage Menu &nbsp &nbsp &nbsp </a>
            <a href="viewallemp.php" class="genric-btn primary-border radius">&nbsp &nbsp &nbsp &nbsp View all Staff &nbsp &nbsp &nbsp &nbsp</a><br>
            <a href="addnewemp.php" class="genric-btn primary-border radius">&nbsp &nbsp &nbsp  Add New Staff  &nbsp &nbsp &nbsp</a>
            <a href="managestaff.php" class="genric-btn primary-border radius"> &nbsp Manage Staff Roles &nbsp </a>
          </div>

        </h3>

<h3 align='center' class="about-title mb-30">
        <div class="button-group-area mt-10">
          <a href="logout.php" class="genric-btn danger-border radius">Sign-out</a>
        </div>
</h3>
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


<?php
}
?>
