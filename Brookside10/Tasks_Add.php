<?php
session_start();
$idnum = $_SESSION['ID'];
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Add Tasks</title>
		<link rel="stylesheet" type="text/css" href="CSS/TheBestCss4.css">
		<link rel="stylesheet" href="CSS/template1.css">
		<meta charset="utf-8">
	</head>
	<?php
	if($idnum[0] == 1)
	{
		require "header1.php";
	
	}
	else if($idnum[0] == 2)
	{	
		require "header2.php";
	}
	?>
	<body>
		<?php
			require "TaskHeader1.php";
		?>
		<center><div class="enjoy-css">
			<?php
				if(isset($_GET['error'])){
					if($_GET['error'] == "sqlerror"){
						echo '<p class="error"> Check with your administrator </p>';
						
					}
					
				}
			?>
			<form action="Tasks_Action.php" method="post">
					Priority: <br>
					<input type="number" name="pri"><br>
					
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
					<input type="submit" name = "Tasks-submit" value="Submit">
			</form>
		</div>
	</body>
</html>