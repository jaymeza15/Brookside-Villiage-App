<!DOCTYPE html>
<html>
	<head>
		<title> Adding User </title>
		<link rel="stylesheet" href="CSS/template1.css">
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
	</head>
	
	<body>
		<H1> Welcome to the Brookside Villiage Application</H1>
		<p> </p>
		<H2> Please enter info </H2>
		
			<div class="enjoy-css">
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
					else if($_GET['error'] == "username"){
						echo '<p> Username exists</p>';
						
					}
					else if($_GET['error'] == "usertype"){
						echo '<p> User field empty</p>';
						
					}
					else if($_GET['error'] == "rowerror"){
						echo '<p> Row error</p>';
						
					}
				}
			?>
				<form action ="Action_AddUser.php" method = "post">
					You Are?:<br>
					<select name = "ut">
						<option value="">                </option>
						<option value="Tenant">  Tenant  </option>
						<option value="Manager"> Manager </option>
						<option value="Board">   Board   </option>
					</select><br>
				
					<div id="UserInfo" class="Inputfield">
						<input type = "text"     name = "uname"    placeholder = "Username"   size="35">
						<input type = "password" name = "pass"     placeholder = "Password">
						<input type = "password" name = "pass2"    placeholder = "ConfirmPassword">
					</div>
				
					<div id="BasicInfo" class="Inputfield">
						<input type = "text"     name = "first"    placeholder = "First Name" size="35">
						<input type = "text"     name = "last"     placeholder = "Last Name">
				<center><input type = "date"     name = "bday">
						<input type = "text"     name = "room"     placeholder = "Room">
					</div>
					<br>
					<center><button type = "submit" name = "User-submit"> Submit </button>
				</form>	
			</div>
	
	</body>
	
</html>