<?php
session_start();
if (!isset($_SESSION['activeUser'])) {
  header("location:emplogin.php");
}
if ($_SESSION['usertype']!="customer") {
  header("location:error-page.php");
}
require("connection.php");
extract($_POST);
$sql="Select * from confirmed_orders where id='$coid'";
$rs= $db->query($sql);
$row=$rs->fetch(PDO::FETCH_OBJ);
$oids=explode(',',$row->oids);
$lid=array();
$st=0;

//$coids=explode(',', $row->oids);
$check=1;
foreach ($oids as $key ) {
 	$sql="select orders.id,items.id,items.active from items, orders where orders.id='$key' and orders.iid=items.id";
 	$rs=$db->query($sql);
 	$row=$rs->fetch(PDO::FETCH_OBJ);
 	if ($row->active==0) {
 		$check=0;
 	}
 }

 if ($check==0) {
  	header("location:itemsnotexist.php");
  }else{

foreach ($oids as $key) {
	$sql="Select orders.iid, orders.quantity, items.price from orders,items where orders.id='$key' and orders.iid=items.id";
	$rs= $db->query($sql);
	$row=$rs->fetch(PDO::FETCH_OBJ);
	$sql="insert into orders(uid,iid,quantity,total_price, confirmed)values('". $_SESSION['activeUser'] ."','$row->iid','$row->quantity','$row->price','1')";
	$rs=$db->exec($sql);
	$lid[]=$db->lastInsertId();
	$st += $row->price*$row->quantity;
}
$coids=implode(",", $lid);
$sql="insert into confirmed_orders(uid,oids,aid,sub_total)values('". $_SESSION['activeUser'] ."','$coids',NULL,'$st')";
$rs=$db->exec($sql);
$lid = $db->lastInsertId();
header("location:selectaddressorder.php?coid=$lid&type=reorder");}
?>