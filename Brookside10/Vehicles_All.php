<?php
	require 'DatabaseConn.php';
	session_start();
	$idnum = $_SESSION['ID'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Vehicles Home</title>
		<link rel="stylesheet" type="text/css" href="CSS/TheBestCss4.css">
		<meta charset="utf-8">
	</head>
	<?php
	if($idnum[0] == 1)
	{
		require "header1.php";
		require "VehiclesHeader.php";
		echo "<center><h3>These are all Approved vehicles: </h3>";
		$stat = 1;
		require "displayVehicles.php";
	
	}
	else if($idnum[0] == 2 || $idnum[0] == 3)
	{	
		require "header2.php";
		require "VehiclesHeader.php";
		echo "<center><h3>These are all Approved vehicles: </h3>";
		$stat = 1;
		require "displayVehicles.php";
		
	}
	?>
	
</html>