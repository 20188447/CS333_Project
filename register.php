<?php  
extract($_POST);
if (isset($un)) {

	$pattern = "/^[a-zA-Z ]$/";
	if(!preg_match($pattern, $fname))
    {
     echo "<h3>Incorrect First Name</h3>";
    }

	elseif(!preg_match($pattern, $lname))
	    {
	     echo "<h3>Incorrect last name</h3>";
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

	elseif(!preg_match("/[-0-9a-zA-Z.+_]+@[-0-9a-zA-Z.+_]+.[a-zA-Z]{2,4}/", $email))
	{
	 $errorMsg[]="please enter valid email";
	}

   elseif(preg_match('/^\s*$/', $password))
    {
     $errorMsg[]="please enter Password";
    }

		elseif(preg_match('/^\s*$/', $password1))
     {
      $errorMsg[]="please enter Password confirmation";
     }

		 else if(strcmp($password, $password1)!=0)
		 	{
		 		$errorMsg[]="Passwords do not match";
		 	}

		 elseif(strlen($password) > 20 )
		 {
		 $errorMsg[]= "Password too long!";
		 }

		 elseif(strlen($password) < 8 )
		 {
		 $errorMsg[]= "Password too short!";
		 }

		 elseif(!preg_match("#[0-9]+#", $password ))
		 {
		 $errorMsg[]= "Password must include at least one number!";
		 }

		 elseif( !preg_match("#[a-z]+#", $password ) )
		 {
		 $errorMsg[]= "Password must include at least one lower-case letter!";
		 }

		 elseif( !preg_match("#[A-Z]+#", $password ) )
		 {
		 $errorMsg[]= "Password must include at least one upper-case letter!";
		 }

	require("connection.php");
	/*if ($fname=="" || $lname=="" || $gender=="" || $email=="" || $day=="" || $month=="" || $year=="" || $un=="" || $pw=="" || $cpw=="") {
		die("Missing Information");
	}
	elseif ($pw!=$cpw) {
		die("Passwords does not match");
	}
	else{
		$hpw=password_hash($pw, PASSWORD_DEFAULT);
		$dob="$year-$month-$day";
		$sql="insert into users(firstname,lastname,gender,email,dob,username,password) values('$fname','$lname','$gender','$email','$dob','$un','$hpw')";
		$rs=$db->exec($sql);
		$db=null;
		echo "Registered Successfully";
	}**/
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="post">
		First Name: <input name="fname"><br>
		Last Name: <input name="lname"><br>
		Gender: <input name="gender"><br>
		Email: <input name="email"><br>
		Date Of Birth(DD-MM-YYYY):  <input name="day" size="2">-
		<input name="month" size="2">-
		<input name="year" size="4"><br>
		Username: <input name="un"><br>
		Password: <input type="password" name="pw"><br>
		Confirm Password:<input type="password" name="cpw"><br>
		<input type="submit" value="Register" >
	</form>
</body>
</html>