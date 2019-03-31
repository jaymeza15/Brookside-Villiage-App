<?php
	require 'DatabaseConn.php';
	session_start();
	$idnum = $_SESSION['ID'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Approved Tasks</title>
		<link rel="stylesheet" type="text/css" href="CSS/TheBestCss4.css">
		<meta charset="utf-8">
	</head>
	<?php
	if($idnum[0] == 1)
	{
		require "header1.php";
		require "TaskHeader1.php";
		echo "<h1> Here are all Approved tasks</h1>";
		$stat = 1;
		require "displayTasks.php";
	
	}
	else if($idnum[0] == 2 || $idnum[0] == 3)
	{	
		require "header2.php";
		require "TaskHeader1.php";
		echo "<h1> Here are all Approved tasks</h1>";
		$stat = 1;
		require "displayTasks.php";
	}
	?>
	
</html>