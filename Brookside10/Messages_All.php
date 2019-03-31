<?php
	require 'DatabaseConn.php';
	session_start();
	$idnum = $_SESSION['ID'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>All Messages</title>
		<link rel="stylesheet" type="text/css" href="CSS/TheBestCss4.css">
		<meta charset="utf-8">
	</head>
	<?php
	if($idnum[0] == 1)
	{
		require "header1.php";
		echo "<h3> These are ALL the Messages: </h3>";
		$stat = 0;
		require "displayMessages.php";
		$stat = 1;
		require "displayMessages.php";
	
	}
	else if($idnum[0] == 2 || $idnum[0] == 3)
	{	
		require "header2.php";
		echo "<h3> These are ALL the Messages: </h3>";
		$stat = 0;
		require "displayMessages.php";
		$stat = 1;
		require "displayMessages.php";
	}
	?>
	
</html>