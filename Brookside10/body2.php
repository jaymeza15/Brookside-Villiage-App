<?php
	require 'DatabaseConn.php';
?>
<!DOCTYPE html>
<html lang="en">
	<div>
		<?php
			echo "<h1>Welcome : " . $_SESSION["first"] . " " . $_SESSION["last"] . "</h1>";
			echo "<h3>ID: " . $_SESSION["ID"] . "</h3><br>"; 
			//echo "firstname " . $_SESSION["fname"] . ".<br>";
			//echo "lastname: " . $_SESSION["lname"] . ".<br>";
			//echo "bday: " . $_SESSION["bday"] . ".<br>";
			//echo "room: " . $_SESSION["rm"] . ".<br>";
		?>
	</div>
	
	<br>
		
	<table class = "table1", style="width:40%", frame="box", align="center">
		<?php
			$sql1 = "SELECT * FROM tasks WHERE status = 0";
			$sql2 = "SELECT * FROM requests WHERE status = 0";
			$sql3 = "SELECT * FROM complaints WHERE status = 0";
			$sql4 = "SELECT * FROM vehicles WHERE status = 0";
			$sql5 = "SELECT * FROM fines WHERE state = 0";
			$sql6 = "SELECT * FROM messages WHERE targetID = " . $_SESSION['ID'] . "";
			$result1 = mysqli_query($conn,$sql1); 
			$result2 = mysqli_query($conn,$sql2);
			$result3 = mysqli_query($conn,$sql3);
			$result4 = mysqli_query($conn,$sql4);
			$result5 = mysqli_query($conn,$sql5);
			$result6 = mysqli_query($conn,$sql6);
			$count1 = mysqli_num_rows($result1);
			$count2 = mysqli_num_rows($result2);
			$count3 = mysqli_num_rows($result3);
			$count4 = mysqli_num_rows($result4);
			$count5 = mysqli_num_rows($result5);
			$count6 = mysqli_num_rows($result6);
					
					echo "<tr><td>Tasks: </td><td> ";
						 printf("%d",$count1);
					echo "</td></tr>";
					echo "<tr><td>Requests: </td><td>";
						 printf("%d",$count2);
					echo "</td></tr>";
					echo "<tr><td>Complaints: </td><td>";
						 printf("%d",$count3);
					echo "</td></tr>";
					echo "<tr><td>Vehicles: </td><td>";
						 printf("%d",$count4);
					echo "</td></tr>";
					echo "<tr><td>Fines: </td><td>";
						 printf("%d",$count5);
					echo "</td></tr>";
					echo "<tr><td>Messages: </td><td>";
						 printf("%d",$count6);
					echo "</td></tr>";
	
		?>
	</table>
</html>