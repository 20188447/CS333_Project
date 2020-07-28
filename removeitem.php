<?php
if (!isset($_SESSION['activeUser'])) {
  header("location:emplogin.php");
}
if ($_SESSION['usertype']!="customer") {
  header("location:error-page.php");
} 
require("connection.php");
session_start();
extract($_REQUEST);
	$sql="delete from orders where orders.id='$removeid' and uid='".$_SESSION['activeUser']."'";
	$rs=$db->exec($sql);
header("location:cart.php");
?>
