<?php
$em=$_GET["em"];
$em=strtolower($em);
header('Cache-Control: no-Cache, must-revalidate');
require('connection.php');
$check=0;	

$sql="SELECT * FROM users Where email = :email";
$rs=$db->prepare($sql);
$rs->bindParam(':email',$em);
$rs->execute();
foreach ($rs as $value)
{
  if($value[4]==$em)
    {
      echo "emnotvalid";
      $check=1;
    }
 }
 if($check==0)
 {
   echo "emvalid";
 }
?>