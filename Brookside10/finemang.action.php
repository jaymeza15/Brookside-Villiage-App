<?php
if(isset($_POST['finemang-submit'])){
	require 'DatabaseConn.php';
	
	$desc = $_POST['desc'];
	$price = $_POST['price'];
	$first = $_POST['first'];
	$last = $_POST['last'];
	$tenant = $first . " " . $last;
	
	if(empty($desc) || empty($price) || empty($tenant)){
		header("Location: Finemang.php?error=emptyfeilds");
		exit();
		
	}
	else{
		/*$sql = "SELECT * FROM users WHERE username =" */
		$sql = "SELECT userID 
				  FROM users 
				 WHERE firstname = '$first' 
				   AND lastname = '$last' ";
		//$username = "jsmith";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: Finemang.php?error=sqlerror");
			exit();
		}
		else{
			
			mysqli_stmt_bind_param($stmt, "s", $tenant);
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if($row = mysqli_fetch_assoc($result)){
				
				$tenantid = $row['userID'];
				session_start();
				$employeeid = $_SESSION['ID'];
				$state = 0;
				$num1=1;
				$num2=2;
				$sql= "INSERT INTO fines ( description, price, state, tenantID, employeeID) VALUES (?,?,?,?,?)";
				$stmt = mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: Finemang.php?error=sqlerror");
					exit();
				}
				else{
					mysqli_stmt_bind_param($stmt, "sisii", $desc, $price, $state, $tenantid, $employeeid);
					mysqli_stmt_execute($stmt);
					header("Location: Finemang.php?register=success");
					exit();
				}
				
			}
			else{
				
				header("Location: Finemang.php?error=nousers");
					exit();
			}
			
			
		}
	}
}
else{
	header("Location: Finemang.php");
	exit();	
	
}
?>