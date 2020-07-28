<?php
session_start();
$id='';
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

if($id=='')
{
  header('Location: viewmenu.php');
}

elseif(isset($cancel))
{
  header('Location: viewmenu.php');
}

elseif (isset($edit))
{
  if(empty(trim($name)))
    {
     $errorMsg[]="please enter name";
    }

  else if(empty(trim($price)))
    {
     $errorMsg[]="please enter Price";
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

           $sql="UPDATE items SET name='$name',price='$price',description='$description',category='$Category' WHERE id=$id;";
           $r=$db->exec($sql);   //sql insert query

           if($r>0)
            {
                $check1 = 1;
                $label1="Edit Successfull..... ";
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
          <h2 class="text-white">Edit Menu</h2>
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
      header('Refresh: 1; URL=viewmenu.php');
      echo "<br />";
      }


      try
      {
        require('connection.php');
            $sql = "SELECT * FROM items WHERE id=$id;";
            $rs=$db->query($sql);  //sql insert query

         $db=null;
       }//endoftry

        catch(PDOException $ex)
         {
             die ("Error Message ".$ex->getMessage());
         }

  if ($row = $rs->fetch())
  {
?>

  <div class="container" style="margin-top: 50px;">
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <div class="single-menu">
          <div class="row">
            <div class="col-md-6">
              <?php echo "<img class='img-fluid' src='". $row[5] ."'style='border-radius: 10%;width:200px;'>"; ?>
            <form action="upload.php" method="post" enctype="multipart/form-data">
              <h5 style="margin-top: 10px;">Select image to upload:</h5>
              <input type="file" name="fileToUpload" id="fileToUpload">
              <input type="hidden" name="id" value="<?php echo $row[0];?>">
              <input type="submit" value="Upload Image" name="submit" class="genric-btn info-border circle" style="margin-top: 10px;">
            </form>
            <form method="post">
            </div>
          </div>
          <div class="row" style="margin-bottom: 20px; margin-top: 50px;">
            <div class="col-md-1"></div>
            <div class="col-md-2">
              <h5 style="margin-top: 10px;">Name: </h5>
            </div>
            <div class="col-md-8">
              <input type="hidden" value= "<?php echo $id;?>" name="id">
              <input type="input" value="<?php echo $row[1]; ?>" name="name" class="single-input" >
            </div>
          </div>
          <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-1"></div>
            <div class="col-md-2">
              <h5 style="margin-top: 10px;">Price: </h5>
            </div>
            <div class="col-md-8">
              <input type="input"  value="<?php echo $row[3]; ?>" name="price" class="single-input">
            </div>
          </div>
          <div class="row" style="margin-bottom: 30px;">
            <div class="col-md-1"></div>
            <div class="col-md-2">
              <h5 style="margin-top: 10px;">Description: </h5>
            </div>
            <div class="col-md-8">
              <textarea name="description" rows="4" cols="35" style="resize: none;" class="single-input">
              <?php echo $row[2]; ?>
              </textarea>
            </div>
          </div>
          <div class="row" style="margin-bottom: 50px;">
            <div class="col-md-1"></div>
            <div class="col-md-2">
              <h5 style="margin-top: 10px;">Category: </h5>
            </div>
            <div class="col-md-8">
              <select name="Category" class="nice-select">
                <option > Please Select</option>
                <option <?php if($row[4]=="Pancake") {echo "selected";} ?> value="Pancake">Pancake</option>
                <option <?php if($row[4]=="Waffle") {echo "selected";} ?> value="Waffle">Waffles</option>
                <option <?php if($row[4]=="Milkshake") {echo "selected";} ?> value="Milkshake">Milkshakes</option>
              </select>
            </div>
          </div>
          <div class="row" style="margin-bottom: 20px;">
            <div class="col-md-4"></div>
            <div class="col-md-7" align="right">
              <input type="submit"  value="EDIT" name="edit" class="genric-btn primary-border radius" >
              <input type="submit"  value="CANCEL" name="cancel" class="genric-btn primary-border radius">
              <input type="hidden" name="type" value="email">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
 <br /> <br />
 <br /> <br />
<?php
}
  }
?>

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

