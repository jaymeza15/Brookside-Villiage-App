<?php
if(isset($_POST['Vehicle-submit'])){
	require 'DatabaseConn.php';
	
	session_start();
	$uID = $_SESSION['ID'];
	$owner = $_POST['owner'];
	$Make = $_POST['make'];
	$Model = $_POST['model'];
	$year = $_POST['year'];
	$license = $_POST['license'];
	$status = 0;
	$date = date("Y-m-d H:i:s");
	
	if(empty($owner) || empty($Make) || empty($Model) || empty($year) || empty($license)){
		header("Location: View_AddVeh.php?error=emptyfeilds");
		exit();
		
	}
	else{
		$sql = "SELECT * FROM vehicles WHERE License = '$license'";
		$stmt = mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql))
		{
			header("Location: View_AddVeh.php?error=sqlerror");
			exit();
		}
		else
		{
			$result = mysqli_query($conn,$sql);
			$count = mysqli_num_rows($result);
			if($count == 1) 
			{ 
				header("Location: View_AddVeh.php?error=licenseexists");
				exit();
			}
			else
			{
				$sql2 = "INSERT INTO vehicles (userID, 
											   Owner, 
											   Make, 
											   Model, 
											   Year, 
											   License,
											   Status,
											   submitDate) 
									   VALUES ('$uID', 
											   '$owner', 
											   '$Make', 
											   '$Model', 
											   '$year', 
											   '$license',
											   '$status',
											   '$date')";
											   
				if(!mysqli_query($conn, $sql2)){echo "Not inserted";}
				else{header("Location: Vehicles_View.php");}
		
			}
		}
			
			
		
	}
}
else if(isset($_POST['vehicleaccept-submit'])){
	require 'DatabaseConn.php';
	$id = $_POST["vID"];
	
	$sql = "UPDATE vehicles
			SET status = 1
			WHERE vehicleID = '$id' ";
			
	if(!mysqli_query($conn, $sql)){echo "Not inserted";}
	else{header("Location: Vehicles_View.php");}
			
	
}
else if(isset($_POST['vehicledecline-submit'])){
	require 'DatabaseConn.php';
	
	$id = $_POST["vID"];
	
	$sql = "UPDATE vehicles
			SET status = 3
			WHERE vehicleID = '$id' ";
			
	if(!mysqli_query($conn, $sql)){echo "Not inserted";}
	else{header("Location: Vehicles_View.php");}
	
}
else{
	header("Location: Home_View.php");
	exit();	
	
}
?>