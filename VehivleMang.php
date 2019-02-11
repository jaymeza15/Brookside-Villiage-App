<?php

require "header1.php";

?>

	<main>
		<table class="table2" frame="box" cellspacing = "0", align=right>
		<?php
		
		require 'phpfiles/DatabaseConn.php';
		
		$sql = "SELECT * FROM vehicles WHERE approved = 1;";
		$result = $conn-> query($sql);
		if($result-> num_rows > 0){
			$result = mysqli_stmt_get_result($stmt);
			while($row = $result-> fetch_assoc()){
				echo "<tr><th>".$row["Owner"]."</th><th>".$row["makemodel"]."</th><th>".$row["year"]."</th><th>.$row["license"]."</th></tr>
				
			}
			
		}
		
		
		?>
		</table>
	
	
	</main>
	
<?php


?>