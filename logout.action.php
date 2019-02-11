<?php

if(isset($_POST['logout-submit'])){
	
session_start();
session_unset();
session_destroy();
header("Location: ../Index.php");
}
else{
	
	header("Location: Home.php");
}

?>