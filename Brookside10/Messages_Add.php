<?php
session_start();
$idnum = $_SESSION['ID'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>New Message</title>
		<link rel="stylesheet" type="text/css" href="CSS/TheBestCss4.css">
		<link rel="stylesheet" href="CSS/template1.css">
		<meta charset="utf-8">
	</head>
	<body>
	<?php
	if($idnum[0] == 1)
	{
		require "header1.php";
	
	}
	else if($idnum[0] == 2 || $idnum[0] == 3)
	{	
		require "header2.php";
	}
	?>
		<center><div class="enjoy-css">
			<?php
				if(isset($_GET['error'])){
					if($_GET['error'] == "sqlerror"){
						echo '<p class="error"> Check with your administrator </p>';
						
					}
					
				}
			?>
			<form action="Messages_Action.php" method="post">
					To (First): <br>
					<input type="text" name="first"><br>
					
					To (Last): <br>
					<input type="text" name="last"><br>
					
					Subject: <br>
					<input type="text" name="sub"><br>
					
					Description: <br>
					<input type="text" name="des"><br>
					
					<br>
					<input type="submit" name = "Message-submit" value="Submit">
			</form>
		</div>
	</body>
</html>