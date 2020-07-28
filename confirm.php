<?php 
require("connection.php");
session_start();
if (!isset($_SESSION['activeUser'])) {
  header("location:emplogin.php");
}
if ($_SESSION['usertype']!="customer") {
  header("location:error-page.php");
}
extract($_POST);
if ($btn=="OK") {
	$sql="update confirmedorders set aid = NULL where aid='$aid'";
	$rs=$db->exec($sql);
	$sql="Delete from address where id='$aid'";
	$rs=$db->exec($sql);
	header("location:saved-addresses.php");
}
elseif ($btn=="CANCEL") {
	header("location:saved-addresses.php");
}
?>
