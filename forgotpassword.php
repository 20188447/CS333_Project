<html>
<body>
<?php
extract($_POST);

$label3 ='';
$check2 = 0;;

if (isset($reset))
{
  if(empty(trim($user)))
    {
     $errorMsg[]="please enter username";
    }

  else if(empty(trim($password)))
    {
        $errorMsg[]="please enter password";
    }

  else if(empty(trim($password1)))
    {
     $errorMsg[]="please enter password confirmation";
    }

  else if((trim($password1))!=(trim($password1)))
    {
      $errorMsg[]="Passwords do not match";
    }

  else if(empty(trim($security)))
    {
     $errorMsg[]="Please enter security answer";
    }

  elseif(empty($errorMsg))
  {
      try
      {
        require('connection.php');

         	$sql = "SELECT * FROM users";
          $rs=$db->query($sql);

          $new_password = password_hash($password, PASSWORD_DEFAULT);
          foreach($rs as $row)
          {

            if(($row[1]==$user)&&($row[3]==$security) )
            {
              if($user!='admin')
              {

                $sql = "UPDATE users SET password='$new_password' WHERE uid=$row[0]";
                $r=$db->exec($sql);

                if($r>0)
                {
                    $check2=1;
                  $label3="Password Changed";
                }

              }

            }
          }

          if($check2==0 && $user=='admin'){
          $errorMsg[]= "Not authorized";
        }
        elseif($check2==0)
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

      <h2>Password Reset</h2>
      <p>Please fill this form to reset/change your account password.</p>
      <br />

          <?php
          if(isset($errorMsg))
          {
             foreach($errorMsg as $error)
             { echo"<strong> <font color='red'> $error </font> </strong>";
               echo"<br />";
             }
          }

    		  if($check2==1)
    		  {echo "<label> <font color='blue'> $label3 <br /> </font> </label>";
    		  echo "<label'> <font color='blue'> You are being redirected to Log-in page </font> </label> <br />";
    		  header('Refresh: 2; URL=login.php');
    		  }
          ?>

                <br />
                <form method="post">
                <label>Username</label>
                <input type="input" name="user" > <br />

                <label>Password</label>
                <input type="password" name="password"> <br />

                <label>Confirm Password</label>
                <input type="password" name="password1"><br />

                <label>Security Question: what is your bestfriend name?</label>
                <input type="input" name="security"><br />

                <input type="submit"  value="Reset Password" name="reset"> <br />

        </form>

</body>
</html>
