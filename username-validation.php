<?php
$q=$_GET["q"];
$q=strtolower($q);
header('Cache-Control: no-Cache, must-revalidate');
require('connection.php');
$check=0;
$sql="SELECT * FROM users Where username = :name";
$rs=$db->prepare($sql);
$rs->bindParam(':name',$q);
$rs->execute();
foreach ($rs as $value)
{
  if($value[7]==$q)
    {
      echo "notvalid";
      $check=1;
    }
 }
 if($check==0)
 {
   echo "valid";
 }?>