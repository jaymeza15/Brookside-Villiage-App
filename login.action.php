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
		$sql = "SELECT * FROM users Where username = ?;";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../Index.php?error=sqlerror");
			exit();
		}
		else{
			
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				
				
				if($password == $row['passwrd']){
					session_start();
					$_SESSION['userid']= $row['userid'];
					$_SESSION['username']= $row['username'];
					header("Location: ../Home.php");
					
					
				}
				else{
					header("Location: ../Index.php?error=wrongpassword");
					exit();
				}
				/*$passwordvalidate= password_verify($password, $row['passwrd']);
				if($passwwordvalidate == false){
					header("Location: ../Index.php?error=wrongpassword");
					exit();
					
					
				}
				else if($passwordvalidate = true){
					session_start();
					$_SESSION['userid']= $row['userid'];
					$_SESSION['username']= $row['username'];
					header("Location: ../Home.php");
				}
				else{
					header("Location: ../Index.php?error=wrongpassword");
					exit();
				}*/
				
			}
			else{
				header("Location: ../Index.php?error=usernotexist");
				exit();
			}
			
			
		}
	}



}
else{
	header("Location: ../Index.php");
	exit();	
	
}