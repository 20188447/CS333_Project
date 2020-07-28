<?php
session_start();

extract($_POST);

if (!isset($_SESSION['activeUser'])) {
  echo "<font color='blue'> You are being redirected to employee Log-in page <br /> you are not logged in </font> <br />";
   header('Refresh: 2; URL=emplogin.php');
}
if ($_SESSION['usertype']!="admin") {
  header("location:error-page.php");
}

else
{
  try{

  	require('connection.php');

  	$sql="select * from food";
  	$rs=$db->query($sql);

  	$db=null;
  }

  catch(PDOException $ex)
  {
      die ("Error Message ".$ex->getMessage());
  }
?>

<html>
<body>
<table border='1' align='center' width='500'>
  <tr>
    <th>Name</th>
    <th>Price</th>
	<th>Category</th>
  <th>Remove?</th>
  </tr>
  <form method='post' action='confirm.php'>
<?php
  foreach($rs as $row){

	echo "<tr>";

    echo "<td>$row[1]</td>";
    echo "<td>$row[2]</td>";
    echo "<td>$row[4]</td>";
	$foodid=$row[0];
	 ?>
	<td> <input type="checkbox" value= <?php echo $foodid;?> name="stu[]"> Delete? </td>
<?php

    echo "</tr>";
  }
 ?>
<tr>
    <th colspan='4'> <input type='submit' value='Delete Selected Items' /> </th>
  </tr>
 </form>
</table>

<br/>
<a href="menu.php">Go To Menu Setting Page</a> <br/>
<a href="admininterface.php">Go To Welcome Page</a> <br/>

</body>
</html>


<?php
}
?>
