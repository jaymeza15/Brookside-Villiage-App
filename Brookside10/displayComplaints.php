<center><table class="table3">	
	<?php
		$header="<tr>
					<th> </th>
					<th>complaintID</th>
					<th>senderID</th>
					<th>sender</th>
					<th>subject</th>
					<th>Description</th>
					<th>Status</th>
					<th>Submit Date</th>
				</tr>";
			
			if(isset($_POST['complaintform-submit'])){
				$compID = $_POST['compID'];
				$cSt = $_POST["cSt"];
				
				$sql = "SELECT *
						  FROM complaints
						 WHERE complaintID = $compID";
						 $result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						echo "
							   <tr> <td>Request ID  </td><td> " . $row["complaintID"] . "  </td> </tr>
							   <tr> <td>Tenant ID   </td><td> " . $row["senderID"] . "   </td> </tr>
							   <tr> <td>Tenant Name </td><td> " . $row["sender"] . " </td> </tr>
							   <tr> <td>Subject     </td><td> " . $row["subject"] . "    </td> </tr>
							   <tr> <td>Description </td><td> " . $row["description"] . "</td> </tr>
							   <tr> <td>Status      </td><td> " . $row["status"] . "     </td> </tr>
							   <tr> <td>Submit Date </td><td> " . $row["submitDate"] . "</td> </tr>";
						if($idnum[0] == 1)
						{
							if($cSt == 2)
							{
								echo"<td>
										<form action = 'Complaints_Action.php' method = 'post'>
											<input type ='hidden' name = 'compID' value = " . $row["complaintID"] . ">
											<input type ='hidden' name = 'cSt' value = " . $row["status"] . ">
											<input type ='submit' name = 'complaintdelete-submit' value = 'Delete'>
										</form> 
									</td>";
							}
						}
						else if($idnum[0] == 2 || $idnum[0] == 3)
						{
							if($cSt == 0)
							{
								echo"<td>
										</td><td>
										<form action = 'Complaints_Action.php' method = 'post'>
											<input type ='hidden' name = 'compID' value = " . $row["complaintID"] . ">
											<input type ='hidden' name = 'cSt' value = " . $row["status"] . ">
											<input type ='submit' name = 'complaintaction-submit' value = 'Acknowledge'>
										</form> 
									</td>";
							}
							else if($cSt == 1)
							{
								echo"<td>
									 </td><td>
										<form action = 'Complaints_Action.php' method = 'post'>
											<input type ='hidden' name = 'compID' value = " . $row["complaintID"] . ">
											<input type ='hidden' name = 'cSt' value = " . $row["status"] . ">
											<input type ='submit' name = 'complaintaction-submit' value = 'Resolved'>
										</form> 
									</td>";
							}
						}
					}
				}
			}
			else if($idnum[0] == 1)
			{
				$sql = "SELECT *
					      FROM complaints
						 WHERE senderID = '$idnum' 
						   AND status = '$stat'";
						   
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
					echo " '$header' ";
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>
								<td>
									<form action = 'Complaints_Form.php' method = 'post'>
										<input type ='hidden' name = 'compID' value = " . $row["complaintID"] . ">
										<input type ='hidden' name = 'cSt' value = " . $row["status"] . ">
										<input type ='submit' name = 'complaintform-submit' value = 'View'>
									</form> 
								</td>
								<td>" . $row["complaintID"] . "</td>
								<td>" . $row["senderID"] . "</td>
								<td>" . $row["sender"] . "</td>
								<td>" . $row["subject"] . "</td>
								<td>" . $row["description"] . "</td>
								<td>" . $row["status"] . "</td>
								<td>" . $row["submitDate"] . "</td>
							 </tr>";
					}
				}
			}	
			else if($idnum[0] == 2 || $idnum[0] == 3)
			{
				$sql = "SELECT *
					      FROM complaints
						 WHERE status = '$stat'";
						 $result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
				echo " '$header' ";
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>
								<td>
									<form action = 'Complaints_Form.php' method = 'post'>
										<input type ='hidden' name = 'compID' value = " . $row["complaintID"] . ">
										<input type ='hidden' name = 'cSt' value = " . $row["status"] . ">
										<input type ='submit' name = 'complaintform-submit' value = 'View'>
									</form> 
								</td>
								<td>" . $row["complaintID"] . "</td>
								<td>" . $row["senderID"] . "</td>
								<td>" . $row["sender"] . "</td>
								<td>" . $row["subject"] . "</td>
								<td>" . $row["description"] . "</td>
								<td>" . $row["status"] . "</td>
								<td>" . $row["submitDate"] . "</td>
							 </tr>";
					}
				}
			}
				
				
			?>
			</table>