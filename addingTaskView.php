<?php
	include("config.php");
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Task View</title>
		<link rel="stylesheet" type="text/css" href="TheBestCss4.css">
		<meta charset="utf-8">
	</head>
	<body>
		<header>
			<h1><i>Brookside Village</i></h1>
		<center>
		<font size="6">
			<form action="addingtask.php" method="post">
					Name: 
					<input type="text" name="name"><br>
					Description: 
					<input type="text" name="description"><br>
					Priority: 
					<input type="text" name="priority"><br>
					<br>
					<input type="submit" value="Submit">
			</form>
		</font>
		
		
		</header>
	</body>
</html>