<?php
session_start();
if (!isset($_SESSION['activeUser'])) {
  header("location:emplogin.php");
}
if ($_SESSION['usertype']!="customer") {
  header("location:error-page.php");
}
extract($_POST);
require('connection.php');
$sql="select * from orders where uid='".$_SESSION['activeUser']."' and iid=$id and confirmed=0";
$rs=$db->query($sql);
$row=$rs->fetch(PDO::FETCH_OBJ);
if($row==NULL)
{
	$sql="INSERT INTO orders (uid, iid, quantity, total_price)
	VALUES ('".$_SESSION['activeUser']."','$id','$qty','$tp')";
	$rs=$db->exec($sql);
}
else
{
	$total_qty = $qty+$row->quantity;
	$sql="update orders set quantity=$total_qty where uid='".$_SESSION['activeUser']."' and iid=$id and confirmed=0";
	$rs=$db->exec($sql);
}
	header("location:menu.php");
?>