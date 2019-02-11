<!DOCTYPE html>
<html>
	<head>
		<title> Login </title>
		<link rel="stylesheet" href="template1.css">
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
	</head>
	
	<body>
		<H1> Welcome to the Brookside Villiage Application</H1>
		<p> </p>
		<H2> Please login below </H2>
		<p> </p>
		<div class = "enjoy-css">
			<?php
				if(isset($_GET['error'])){
					if($_GET['error'] == "emptyfeilds"){
						echo '<p class="error"> One or more of the following feilds was left empty </p>';
						
					}
					else if($_GET['error'] == "sqlerror"){
						echo '<p> There was an SQL error, please contact you admimistrator for assistance </p>';
						
					}
					else if($_GET['error'] == "wrongpassword"){
						echo '<p> Password is incorrect</p>';
						
					}
					else if($_GET['error'] == "usernotexist"){
						echo '<p> Username is incorrect or doest not exist in our records</p>';
						
					}
				
				
				}
			
			
			?>
			<form action ="php files/login.action.php" method = "post">
				<input type = "text" name = "username" placeholder = "Username" size="35">
				<input type = "password" name = "pass" placeholder = "Password">
				<button type = "submit" name = "login-submit"> Login </button>
			</form>
		</div>	
	
	</body>
	
</html>