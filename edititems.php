<?php
session_start();

if ($_SESSION['usertype']!="admin") {
  header("location:error-page.php");
}

if(!isset($_SESSION["admin"]))
{ echo "<font color='blue'> You are being redirected to employee Log-in page <br /> you are not logged in </font> <br />";
   header('Refresh: 2; URL=emplogin.php');
}

else{
?>

<html>
<body>
<h1 align="center"> YOU ARE GOING TO EDIT FROM MENU</h1> <br />


<table align="center" border='0' width='200'>
  <caption>Please Select Option: </caption> <br />
<tr>

<td align="center">
<form method="post" action='add.php'>
<input type="submit"  value="Add Item" name="add">
</form>
</td>

<td align="center">
<form method="post" action='remove.php'>
<input type="submit"  value="Remove Item" name="remove">
</form>
</td>

<td align="center">
<form method="post" action='edit.php'>
<input type="submit"  value="Edit Item" name="edit">
</form>
</td>
</tr>
</table>

<a href="menu.php">Go To Menu Setting Page</a> <br/>
<a href="admininterface.php">Go To Welcome Page</a> <br/>

</body>
</html>
<?php
}
?>
