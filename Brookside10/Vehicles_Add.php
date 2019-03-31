<?php
session_start();
$idnum = $_SESSION['ID'];
//$firstnum = substr($idnum, 0, 1);
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Add Vehicles</title>
		<link rel="stylesheet" type="text/css" href="CSS/TheBestCss4.css">
		<meta charset="utf-8">
	</head>
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

	<main>
		<table class="table2" frame="box" cellspacing = "0", align=right>
		<form  action ="Action_AddVeh.php" method = "post">
			<?php
				if(isset($_GET['error'])){
					if($_GET['error'] == "emptyfeilds"){
						echo '<p class="error"> One or more of the following feilds was left empty </p>';
						
					}
					else if($_GET['error'] == "sqlerror"){
						echo '<p class="error"> An SQL error has occured, Please contact you Administrator </p>';
						
					}
					else if($_GET['error'] == "licenseexists"){
						echo '<p class="error"> License already in system </p>';
						
					}
					else if($_GET['error'] == "taken"){
						echo '<p class="error"> This vehicle already exists in our records </p>';
						
					}
					else if($_GET['error'] == "emptyfeilds"){
						echo '<p class="error"> One or more of the following feilds was left empty </p>';
						
					}
				}
				else if(isset($_GET['register'])){
					
					if($_GET['register'] == "success"){
						echo '<p class="success"> Your vehicle registration was successfully submited. Now awaiting approval </p>';
						
					}
					
					
				}
			?>
			<tr>
				<th>Name of Owner:   <input type = "text" name = "owner" placeholder = "First Last"></th>			
			</tr>
			<tr>
				<th>Make:   <input type = "text" name = "make" placeholder = "Make"></th>
			</tr>
			<tr>
				<th>Model:   <input type = "text" name = "model" placeholder = "Model"></th>
			</tr>
			<tr>
				<th>Year of Vehicle:   <input type = "text" name = "year" placeholder = "YYYY"></th>
			</tr>
			<tr>
				<th>License Plate:   <input type = "text" name = "license" placeholder = "########"></th>
			</tr>
			<tr>
				<th><button type = "submit" name = "Vehicle-submit"> Submit </button></th>
			</tr>
		</form>
		</table>
	
	
	</main>
	
<?php
?>