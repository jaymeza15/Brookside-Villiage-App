<?php
	require 'DatabaseConn.php';
	session_start();
	$idnum = $_SESSION['ID'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Tasks Home</title>
		<link rel="stylesheet" type="text/css" href="CSS/TheBestCss4.css">
		<link rel="stylesheet" type="text/css" href="CSS/template1.css">
		<meta charset="utf-8">
	</head>
	<h1>Enter what your searching </h1>
	<div class = "enjoy-css">
		<form action="Task_Search_Action.php" method="post">
			Task ID: <br>
        	<input type="number" name="taskID">
        		
        		<br><br> -- OR -- <br><br>

        	Creator ID: <br>
        	<input type="number" name="creatorID">
        		
        		<br><br> -- OR -- <br><br>

        	Full Name: <br>
        	<input type="text"   name="fullName">
        		
        		<br><br> -- OR -- <br><br>

        	Priority: <br>
        	<input type="number" name="priority">
        		
        		<br><br> -- OR -- <br><br>

        	Subject: <br>
        	<input type="text"   name="subject">
        		
        		<br><br> -- OR -- <br><br>

        	Status: <br>
        	<input type="text"   name="status">
        		
        		<br><br> -- OR -- <br><br>

        	Submit Date: <br>
        	<input type="date"   name="submitDate">
        		
        		<br><br> -- OR -- <br><br>

        	Completion Date: <br>
        	<input type="date"   name="compDate">
        	<br><br>
        	<input type="submit" name="Search" value="Search">
    	</form>
	</div>
</html>
