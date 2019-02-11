<?php

require "header1.php";

?>

	<main>
		<table class="table2" frame="box" cellspacing = "0", align=right>
		<form  action ="php files/vehreg.action.php" method = "post">
			<?php
				if(isset($_GET['error'])){
					if($_GET['error'] == "emptyfeilds"){
						echo '<p class="error"> One or more of the following feilds was left empty </p>';
						
					}
					else if($_GET['error'] == "sqlerror"){
						echo '<p class="error"> An SQL error has occured, Please contact you Administrator </p>';
						
					}
					else if($_GET['error'] == "taken"){
						echo '<p class="error"> This vehicle already exists in our records </p>';
						
					}
					else if($_GET['error'] == "emptyfeilds"){
						echo '<p class="error"> One or more of the following feilds was left empty </p>';
						
					}
				}
				else if(isset($_GET['error'])){
					
					if($_GET['register'] == "success"){
						echo '<p class="success"> Your vehicle registration was successfully submited. Now awaiting approval </p>';
						
					}
					
					
				}
			?>
			<tr>
				<th>Name of owner:   <input type = "text" name = "owner" placeholder = "First Last"></th>			
			</tr>
			<tr>
				<th>Make/Model:   <input type = "text" name = "makemodel" placeholder = "Make/Model"></th>
			</tr>
			<tr>
				<th>Year of Vehicle:   <input type = "text" name = "year" placeholder = "YYYY"></th>
			</tr>
			<tr>
				<th>License Plate:   <input type = "text" name = "license" placeholder = "########"></th>
			</tr>
			<tr>
				<th><button type = "submit" name = "vehicle-submit"> Submit </button></th>
			</tr>
		</form>
		</table>
	
	
	</main>
	
<?php


?>