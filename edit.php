<?php
session_start();
extract($_POST);
if (!isset($_SESSION['activeUser'])) {
  header("location:emplogin.php");
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
  <h1 align='center'> Edit Menu</h1>
<table width='1000' border='1' align='center'>
<tr>
  <th width='100'>Image</th>
  <th width='200'>Name</th>
  <th>Description</th>
  <th width='100'>Category</th>
  <th width='100'>Price</th>
  <th width='100'>Edit?</th>
</tr>

    <?php
      foreach($rs as $row){

  echo "<form method='post' action='editconfirm.php'>";
    	echo "<tr>";
      echo "<td><img src='$row[5]' height='100' width='100'></td>"; //img
      echo "<td align='center'>$row[1]</td>";
      echo "<td align='center'>$row[3]</td>";
      echo "<td align='center'>$row[4]</td>";
      echo "<td align='center'>$row[2] BHD</td>";

    	$foodid=$row[0];
      $name=$row[1];
      $description=$row[3];
      $Category=$row[4];
    	 ?>

    	<td align='center'>
        <input type="hidden" value= <?php echo $foodid;?> name="id">
        <input type='submit' value='Edit Item' />
      </td>
    <?php

        echo "</tr>";
        echo "</form>";
      }
     ?>


    </table>

    <br/>
    <a href="menu.php">Go To Menu Setting Page</a> <br/>
    <a href="welcome2.php">Go To Welcome Page</a> <br/>

    </body>
    </html>


<?php
}
?>
