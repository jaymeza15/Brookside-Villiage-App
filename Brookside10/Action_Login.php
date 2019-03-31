<?php
if(isset($_POST['login-submit'])){
	require 'DatabaseConn.php';
	
	$username = $_POST['username'];
	$password = $_POST['pass'];
	
	if(empty($username) || empty($password)){
		header("Location: ../Index.php?error=emptyfeilds");
		exit();
		
	}
	else{
		$sql = "SELECT * FROM users Where username = '$username' ";
		$stmt = mysqli_stmt_init($conn);
		$result = mysqli_query($conn, $sql);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: index.php?error=sqlerror");
			exit();
		}
		else{
			
			//mysqli_stmt_bind_param($stmt, "s", $username);
			//mysqli_stmt_execute($stmt);
			//$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				
				$theID = $row["userID"];
				if($password == $row['password']){
					session_start();
					$_SESSION['ID']    = $row['userID'];
					$_SESSION['uname'] = $row['username'];
					$_SESSION['pwd']   = $row['password'];
					$_SESSION['utype'] = $row['usertype'];
					$_SESSION['first'] = $row['firstname'];
					$_SESSION['last']  = $row['lastname'];
					$_SESSION['bd']    = $row['birthday'];
					$_SESSION['rm']    = $row['room'];

					if($theID[0] == 1)     { header("Location: Home.php");}
					else if($theID[0] == 2){ header("Location: Home.php");}
					else if($theID[0] == 3){ header("Location: Home.php");}
					else
					{
						echo "Get rid of admin";
					}
					
					
					
					
				}
				else{
					header("Location: Index.php?error=wrongpassword");
					exit();
				}
				
			}
			else{
				header("Location: Index.php?error=usernotexist");
				exit();
			}
			
			
		}
	}
}
else{
	header("Location: ../Index.php");
	exit();	
	
}