<?php
	if(isset($_POST['User-submit'])){
		require 'DatabaseConn.php';
		
		
		$ut = $_POST["ut"];
		$fd = 0;
		$rest = rand(0,9999999);
		
		if($ut == 'Tenant')      {$fd = 1;}
		else if($ut == 'Manager'){$fd = 2;}
		else if($ut == 'Board')  {$fd = 3;}
		else
		{ 
			header("Location: View_AddUser.php?error=usertype");
			exit();
		}
		
		$theID = $fd.$rest;
		//echo "ID: '$theID'";
		$uname = $_POST["uname"];
		$pass  = $_POST["pass"];
		$pass2 = $_POST["pass2"];
		$first = $_POST["first"];
		$last  = $_POST["last"];
		$bd    = $_POST["bday"];
		$rm    = $_POST["room"];
		
		
		$sql1 = "SELECT * FROM users WHERE userID = '$theID' ";
		$sql2 = "SELECT * FROM users WHERE username = '$uname'";
		$result1 = mysqli_query($conn, $sql1);
		$result2 = mysqli_query($conn, $sql2);
		$count1 = mysqli_num_rows($result1);
		$count2 = mysqli_num_rows($result2);
		if($count1 == 1) 
		{ 
			$rest = rand(0,9999999); 
			$theID = $fd.$rest;
		}
		
		if($count2 == 1)
		{
			header("Location: View_AddUser.php?error=username");
			exit();
		}
		else
		{
			$sql3 = "INSERT INTO users (userID,
								        username, 
									    password, 
										usertype,
										firstname,
										lastname,
										birthday,
										room) 
                                VALUES ('$theID',
										'$uname', 
										'$pass', 
										'$ut',
										'$first',
										'$last',
										'$bd',
										'$rm')";
		
		
			if(!mysqli_query($conn, $sql3)){echo "Not inserted";}
			else{header("Location: index.php");}
		}
		
		
	}
	else
	{
		header("Location: Index.php");
		exit();	
	}
?>