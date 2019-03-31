<?php
	require 'DatabaseConn.php';
	session_start();
	$idnum = $_SESSION['ID'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Messages Home</title>
		<link rel="stylesheet" type="text/css" href="CSS/TheBestCss4.css">
		<meta charset="utf-8">
	</head>
	<?php
	if($idnum[0] == 1)
	{
		require "header1.php";
		echo "<br>
				<form action = 'Messages_All.php'>
					<input type = 'submit' value = 'All Messages'>
				</form>
				<br>
				<form action = 'Messages_Add.php'>
					<input type = 'submit' value = 'NEW Message'>
				</form>
				<br>";
		echo "<h3> These are UNread Messages</h3>";
		$stat = 0;
		require "displayMessages.php";
	
	}
	else if($idnum[0] == 2 || $idnum[0] == 3)
	{	
		require "header2.php";
		echo "<br>
				<form action = 'Messages_All.php'>
					<input type = 'submit' value = 'All Messages'>
				</form>
				<br>
				<form action = 'Messages_Add.php'>
					<input type = 'submit' value = 'NEW Message'>
				</form>
				<br>";
		echo "<h3> These are UNread Messages</h3>";
		$stat = 0;
		require "displayMessages.php";
	}
	?>
	
</html>