
<?php
require ('connection.php');
extract($_POST);

if(isset($btn)){
$hpw=(password_hash($pw, PASSWORD_DEFAULT));
$sql="update users set password= '$hpw' where username= '$un'";
$rs=$db->exec($sql);
header("location:reg.php?msg=y");}

extract($_REQUEST);
if ($msg=="y") {
	echo "<h3>Password Changed Successfully</h3>";
}
?>

<form method="post">
	<input name="un">
	<input type="password" name="pw">
	<input type="submit" name="btn" value="Submit">
</form>