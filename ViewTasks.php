<?php
	include("config.php");
	session_start();
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Task View</title>
		<link rel="stylesheet" type="text/css" href="TheBestCss4.css">
		<meta charset="utf-8">
	</head>
	<body>
		<header>
			<h1><i>Brookside Village</i></h1>
		<center>
		<font size="6">
			<table class="table1" style="width:80%", frame="box", align=right>
				<tr>
					<td><a href="addingTaskView.php">Create Task</a></td>
				</tr>
			</table>
			<table>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Description</th>
					<th>Priority</th>
					<th>Submit Date</th>
				</tr>
			<?php
				$sql = "SELECT taskID, Name, Description, Priority, SubmitDate FROM tasktable";
				$result = mysqli_query($db, $sql);

				if (mysqli_num_rows($result) > 0) {
				// output data of each row
					while($row = mysqli_fetch_assoc($result)) {
						//echo "id: " . $row["taskID"]. " - Name: " . $row["Name"]. " - Description: " . $row["Description"]. " - Priority: " . $row["Priority"]. " - Date: " . $row["SubmitDate"]. "<br>";
						echo "<tr><td>" . $row["taskID"] . "</td><td>" . $row["Name"] . "</td><td>" . $row["Description"] . "</td><td>" . $row["Priority"] . "</td><td>" . $row["SubmitDate"] . "</td><tr>";
					}
				} 
				else {
					echo "0 results";
				}
   
			?>
			</table>
		</font>
		
		
		</header>
	</body>
</html>