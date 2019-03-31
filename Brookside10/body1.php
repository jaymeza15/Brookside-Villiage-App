<?php
require 'DatabaseConn.php';
//session_start();
//$idnum = $_SESSION['ID'];
?>
<!DOCTYPE html>
<html lang="en">
	<div>
	<?php
		echo "<h1>Welcome : " . $_SESSION["first"] . " " . $_SESSION["last"] . "    ID: " . $_SESSION["ID"] . "</h1>";
		//echo "<h1>Welcome TenantID:    " . $_SESSION["ID"] . "</h1><br>"; 
		//echo "Firstname " . $_SESSION["first"] . ".<br>";
		//echo "Lastname: " . $_SESSION["last"] . ".<br>";
		//echo "Birthday: " . $_SESSION["bd"] . ".<br>";
		//echo "Room: " . $_SESSION["rm"] . ".<br>";
	?>
	</div>
	
	<br>
	
	<h1> DASHBOARD </h1>
		<table class = "table3", style="width:40%", frame="box", align="center">
			<?php
				$sql1 = "SELECT * FROM tasks WHERE creatorID = " . $_SESSION['ID'] . "";
				$sql2 = "SELECT * FROM requests WHERE tenantID = " . $_SESSION['ID'] . "";
				$sql3 = "SELECT * FROM complaints WHERE senderID = " . $_SESSION['ID'] . "";
				$sql4 = "SELECT * FROM vehicles WHERE userID = " . $_SESSION['ID'] ." ";
				$sql5 = "SELECT * FROM fines WHERE tenantID = " . $_SESSION['ID'] . "";
				$sql6 = "SELECT * FROM messages WHERE senderID = " . $_SESSION['ID'] . "";
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
					
					echo "<tr>
							<td> <a href = 'Tasks_View.php'> Tasks: </a> </td> 
							<td> $count1 </td>
						  </tr>";
					echo "<tr>
							<td> <a href = 'Requests_View.php'> Requests: </a> </td> 
							<td> $count2 </td>
						  </tr>";
					echo "<tr>
							<td> <a href = 'Complaints_View.php'> Complaints: </a> </td> 
							<td> $count3 </td>
						  </tr>";
				    echo "<tr>
							<td> <a href = 'Vehicles_View).php'> Vehicles: </a> </td> 
							<td> $count4 </td>
						  </tr>";
					echo "<tr>
							<td> <a href = 'Fines_View.php'> Fines: </a> </td> 
							<td> $count5 </td>
						  </tr>";
					echo "<tr>
							<td> <a href = 'Messages_View.php'> Messages: </a> </td> 
							<td> $count6 </td>
						  </tr>";
				
			?>
		</table>
</html>
		