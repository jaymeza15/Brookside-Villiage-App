<center><table class="table3">	
				<tr>
					<th> </th>
					<th>VehicleID</th>
					<th>UserID</th>
					<th>Owner</th>
					<th>Make</th>
					<th>Model</th>
					<th>Year</th>
					<th>License</th>
					<th>Status</th>
					<th>Submit Date</th>
				</tr>
		<?php
		
			if($idnum[0] == 1)
			{
				$sql = "SELECT *
					      FROM vehicles
						 WHERE userID = '$idnum'
						   AND status = '$stat'";
			}	
			else if($idnum[0] == 2 || $idnum[0] == 3)
			{
				$sql = "SELECT *
					      FROM vehicles
						 WHERE status = '$stat'";
			}			
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
				
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>";
							if($idnum[0] == 1)
							{
								echo "<td></td>";
							}
							else{
							echo"<td>
									<form action = 'Action_AddVeh.php'>
										<input type ='hidden' name = 'vID' value = " . $row["vehicleID"] . ">
										<input type ='submit' name = 'vehicleaccept-submit' value = 'Accept'>
									</form> 
									
									<form action = 'Action_AddVeh.php'>
										<input type ='hidden' name = 'vID' value = " . $row["vehicleID"] . ">
										<input type ='submit' name = 'vehicledecline-submit' value = 'Decline'>
									</form>
								</td>";
							}
							echo"<td>" . $row["vehicleID"] . "</td>
								<td>" . $row["userID"] . "</td>
								<td>" . $row["Owner"] . "</td>
								<td>" . $row["Make"] . "</td>
								<td>" . $row["Model"] . "</td>
								<td>" . $row["Year"] . "</td>
								<td>" . $row["License"] . "</td>
								<td>" . $row["Status"] . "</td>
								<td>" . $row["submitDate"] . "</td>
							 </tr>";
					}
				} 
		
				
			?>
			</table>