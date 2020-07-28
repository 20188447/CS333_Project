<?php
$error="";
extract($_REQUEST);
if ($error=="mf") {
	echo "<h3>Missing Fields</h3>";
}
elseif ($error=="userError") {
	echo "<h3>Incorrect Login Info.</h3>";
}
elseif ($error=="passError") {
	echo "<h3>Incorrect Password.</h3>";
}
elseif ($error=="nologin") {
	echo "<h3>Please Login First.</h3>";
}
session_start();
$btn="";
extract($_REQUEST);
if ($btn=="logout") {
	session_destroy();
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="verify.php" method="post">
		Username: <input name="un"><br>
		Password: <input type="password" name="pw"><br>
		<input type="submit" value="Login" >
	</form>
	<h2 ><a href="register.php" style="color: #ff6112">REGISTER</a></h2>
</body>
</html>