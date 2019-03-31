<?php
session_start();
$idnum = $_SESSION['ID'];
//$firstnum = substr($idnum, 0, 1);
//if($firstnum == 1){
if($idnum[0] == 1)
{
	require "header1.php";
	require "body1.php";
	
}
//else if($firstnum == 2){
else if($idnum[0] == 2 || $idnum[0] == 3)
{	
	require "header2.php";
	require "body2.php";
}
?>