<?php
session_start();
$idnum = $_SESSION['ID'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Add Complaint</title>
		<link rel="stylesheet" type="text/css" href="CSS/TheBestCss4.css">
		<link rel="stylesheet" href="CSS/template1.css">
		<meta charset="utf-8">
	</head>
	<?php
	//$firstnum = substr($idnum, 0, 1);
	//if($firstnum == 1){
	if($idnum[0] == 1)
	{
		require "header1.php";
		//require "body1.php";
	
	}
	//else if($firstnum == 2){
	else if($idnum[0] == 2 || $idnum[0] == 3)
	{	
		require "header2.php";
		//require "body2.php";
	}
	?>
	<body>
		<?php
			require "ComplaintHeader1.php";
		?>
		<center><div class="enjoy-css">
			<?php
				if(isset($_GET['error'])){
					if($_GET['error'] == "sqlerror"){
						echo '<p class="error"> Check with your administrator </p>';
						
					}
					
				}
			?>
			<form action="Complaints_Action.php" method="post">
					
					Subject:<br>
					<select name = "sub">
						<option value="">                    </option>
						<option value="Heating">   Heating   </option>
						<option value="Cooling">   Cooling   </option>
						<option value="Plumbing">  Plumbing  </option>
						<option value="Repairing"> Repairing </option>
					</select><br>
					
					Description: <br>
					<input type="text" name="des"><br>
					
					<br>
					<input type="submit" name = "Complaints-submit" value="Submit">
			</form>
		</div>
	</body>
</html>