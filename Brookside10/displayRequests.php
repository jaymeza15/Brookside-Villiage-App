<center><table class="table3">	
	<?php
		$header =  "<tr>
						<th> </th>
						<th>requestID</th>
						<th>tenantID</th>
						<th>tenantName</th>
						<th>Priority</th>
						<th>subject</th>
						<th>Description</th>
						<th>Status</th>
						<th>Submit Date</th>
					</tr>";
			
			if(isset($_POST['requestform-submit'])){
				$reqID = $_POST['rID'];
				$rSt = $_POST['rSt'];
				$sql = "SELECT *
						  FROM requests
						 WHERE requestID = $reqID";
								
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						echo "
							   <tr> <td>Request ID  </td><td> " . $row["requestID"] . "  </td> </tr>
							   <tr> <td>Tenant ID   </td><td> " . $row["tenantID"] . "   </td> </tr>
							   <tr> <td>Tenant Name </td><td> " . $row["tenantName"] . " </td> </tr>
							   <tr> <td>Priority    </td><td> " . $row["priority"] . "   </td> </tr>
							   <tr> <td>Subject     </td><td> " . $row["subject"] . "    </td> </tr>
							   <tr> <td>Description </td><td> " . $row["description"] . "</td> </tr>
							   <tr> <td>Status      </td><td> " . $row["status"] . "     </td> </tr>
							   <tr> <td>Submit Date </td><td> " . $row["submitDate"] . "</td> </tr>";
						
						if($idnum[0] == 1)
						{
							if($rSt == 0)
							{
								
							}
							else if($rSt == 1)
							{
								echo "<tr>
										<td></td>
										<td>
											<form action = 'Requests_Action.php' method = 'post'>
												<input type ='hidden' name = 'rID' value = " . $row["requestID"] . ">
												<input type ='hidden' name = 'rSt' value = " . $row["status"] . ">
												<input type ='submit' name = 'requestaction-submit' value = 'Complete'>
											</form>
										</td>
									</tr>";
							}
							else if($rSt == 2)
							{
								
							}
							else if($rSt == 3)
							{
								echo "<tr>
										<td>
											<form action = 'Requests_Action.php' method = 'post'>
												<input type ='hidden' name = 'rID' value = " . $row["requestID"] . ">
												<input type ='hidden' name = 'rSt' value = " . $row["status"] . ">
												<input type ='submit' name = 'requestaction-submit' value = 'Resubmit'>
											</form>
										</td>
										<td>
											<form action = 'Requests_Action.php' method = 'post'>
												<input type ='hidden' name = 'rID' value = " . $row["requestID"] . ">
												<input type ='hidden' name = 'rSt' value = " . $row["status"] . ">
												<input type ='submit' name = 'requestdelete-submit' value = 'Delete'>
											</form>
										</td>
									</tr>";
							}
							
						}
						else if($idnum[0] == 2 || $idnum[0] == 3)
						{
							if($rSt == 0)
							{
								echo "<tr>
										<td>
											<form action = 'Requests_Action.php' method = 'post'>
												<input type ='hidden' name = 'rID' value = " . $row["requestID"] . ">
												<input type ='hidden' name = 'rSt' value = " . $row["status"] . ">
												<input type ='submit' name = 'requestaction-submit' value = 'Accept'>
											</form>
										</td>
										<td>
											<form action = 'Requests_Action.php' method = 'post'>
												<input type ='hidden' name = 'rID' value = " . $row["requestID"] . ">
												<input type ='hidden' name = 'rSt' value = " . $row["status"] . ">
												<input type ='submit' name = 'requestdecline-submit' value = 'Decline'>
											</form>
										</td>
									</tr>";
							}
							else if($rSt == 1)
							{
								
							}
							else if($rSt == 2)
							{
								
							}
							
						}
					}
				} 
				
								
			}
			else if($idnum[0] == 1)
			{
				$sql = "SELECT *
						  FROM requests
						 WHERE tenantID = '$idnum'
						   AND status = '$stat' ";
						   
				$result = mysqli_query($conn, $sql);
				
				if (mysqli_num_rows($result) > 0) {
				echo " '$header' ";
				while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>
								<td>
									<form action = 'Requests_Form.php' method = 'post'>
											<input type ='hidden' name = 'rID' value = " . $row["requestID"] . ">
											<input type ='hidden' name = 'rSt' value = " . $row["status"] . ">
											<input type ='submit' name = 'requestform-submit' value = 'View'>
											</form>
								</td>
								<td>" . $row["requestID"] . "</td>
								<td>" . $row["tenantID"] . "</td>
								<td>" . $row["tenantName"] . "</td>
								<td>" . $row["priority"] . "</td>
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
						  FROM requests
						 WHERE status = '$stat'";
						 
				$result = mysqli_query($conn, $sql);
						 
				if (mysqli_num_rows($result) > 0) {
					echo " '$header' ";
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>
								<td>
									<form action = 'Requests_Form.php' method = 'post'>
										<input type ='hidden' name = 'rID' value = " . $row["requestID"] . ">
										<input type ='hidden' name = 'rSt' value = " . $row["status"] . ">
										<input type ='submit' name = 'requestform-submit' value = 'View'>
									</form>
								</td>
								<td>" . $row["requestID"] . "</td>
								<td>" . $row["tenantID"] . "</td>
								<td>" . $row["tenantName"] . "</td>
								<td>" . $row["priority"] . "</td>
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
</html>