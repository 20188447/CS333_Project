<?php
session_start();
extract($_POST); 
if (isset($un)) {
	require('connection.php');
	if($un=="" || $pw==""){
		header("location:login.php?error=mf");
	}
	else{
		$sql="select * from users where username= '$un'";
		$rs = $db->query($sql);
		$row = $rs->fetch(PDO::FETCH_OBJ);
		if ($row==null) {
			header("location:login.php?error=userError");
		}
		else{
			$uid = $row->id;
			$pwd = $row->password;
			$db = null;
			if($pw!=$pwd) {
				header("location:login.php?error=passError");
			}
			else{
				$_SESSION['activeUser']=$uid;
				header("location:mainpage.php");
			}

		}
			
	}
	
	
	}
?>