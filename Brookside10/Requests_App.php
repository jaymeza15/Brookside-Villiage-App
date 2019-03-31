<?php
require 'DatabaseConn.php';
session_start();
$idnum = $_SESSION['ID'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Requests Approved</title>
		<link rel="stylesheet" type="text/css" href="CSS/TheBestCss4.css">
		<meta charset="utf-8">
	</head>
	<?php
	if($idnum[0] == 1)
	{
		require "header1.php";
		require "RequestHeader1.php";
		echo "<h1> Here are all Approved Requests</h1>";
		$stat = 1;
		require "displayRequests.php";
	
	}
	else if($idnum[0] == 2 || $idnum[0] == 3)
	{	
		require "header2.php";
		require "RequestHeader2.php";
		echo "<h1> Here are all Approved Requests</h1>";
		$stat = 1;
		require "displayRequests.php";
	}
	?>
	
</html>