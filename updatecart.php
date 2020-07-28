<?php
require("connection.php");
extract($_REQUEST);
$sql="update orders set quantity=$qty where id=$id";
$rs = $db->exec($sql);
header("location:cart.php");
?>