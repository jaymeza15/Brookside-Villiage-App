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
		<meta charset="utf-8">
	</head>
	<?php
	//$firstnum = substr($idnum, 0, 1);
	//if($firstnum == 1){
	if($idnum[0] == 1)
	{
		require "header1.php";
		require "ComplaintHeader1.php";
		require "displayComplaints.php";
		
	
	}
	//else if($firstnum == 2){
	else if($idnum[0] == 2 || $idnum[0] == 3)
	{	
		require "header2.php";
		require "ComplaintHeader1.php";
		require "displayComplaints.php";
	}
	?>
	
</html>