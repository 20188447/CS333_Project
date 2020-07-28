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

if (isset($apply))
{
  if(empty(trim($discount)))
    {
     $errorMsg[]="please enter name";
    }


  elseif(empty($errorMsg))
  {
      try
      {
        require('connection.php');

    	    if(empty($errorMsg))
          {

           $sql="UPDATE food SET discount='$discount' WHERE fid=$id;";
           $r=$db->exec($sql);   //sql insert query

           if($r>0)
            {
                $check1 = 1;
                $label1="Task Successfull..... ";
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


<html>
<body>

  <h2>Please fill this form to Apply or Remove Discount or offer</h2>
  <br />

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
      header('Refresh: 1; URL=discount.php');
      }


      try
      {
        require('connection.php');
            $sql = "SELECT * FROM food WHERE fid=$id;";
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
<form method="post">

<input type="hidden" value= "<?php echo $id;?>" name="id">


<label>Name: </label> <?php echo $row[1]; ?> <br />

<label>Price: </label> <?php echo $row[2]; ?> BHD <br />


<label>Category: </label> <?php echo $row[4]; ?> <br />

<label>Discount: </label>
<input type="input" name="discount"> <br /> <br />

<input type="submit"  value="Apply or Remove Discount" name="apply"> <br /> <br />

</form>
<?php
}
?>


</body>
</html>
<?php
}
?>
