	<center><table class="table3">	
			<?php
			$header = "<tr>
							<th> </th>
							<th>taskID</th>
							<th>creatorID</th>
							<th>fullName</th>
							<th>Priority</th>
							<th>subject</th>
							<th>Description</th>
							<th>Status</th>
							<th>Submit Date</th>
						</tr>";
			
			if(isset($_POST['taskform-submit']))
			{
				$taskid = $_POST['tID'];
				$tSt = $_POST['tSt'];
				
				$sql = "SELECT *
					      FROM tasks
						 WHERE taskID = '$taskid' ";
				
				$result = mysqli_query($conn, $sql);
					
					if (mysqli_num_rows($result) == 1) 
					{
						while($row = mysqli_fetch_assoc($result)) 
						{
							echo "<table class = 'table2'>
									<tr> <td>Task ID        </td> <td> " . $row["taskID"]. "     </td> </tr>
									<tr> <td>Creator ID 	</td> <td> " . $row["creatorID"]. "  </td> </tr>
									<tr> <td>Full Name  	</td> <td> " . $row["fullName"]. "   </td> </tr>
									<tr> <td>Priorty        </td> <td> " . $row["priority"]. "   </td> </tr>
									<tr> <td>Subject        </td> <td> " . $row["subject"]. "    </td> </tr>
									<tr> <td>Description    </td> <td> " . $row["description"]. "</td> </tr>
									<tr> <td>Status         </td> <td> " . $row["status"]. "     </td> </tr>
									<tr> <td>Submitted Date </td> <td> " . $row["submitDate"]. " </td> </tr> ";
							
							if($idnum[0] == 1)
							{
								if($tSt == 3)
								{
									echo "<td>
											<form action = 'Tasks_Action.php' method = 'post'>
												<input type ='hidden' name = 'tID' value = " . $row["taskID"] . ">
												<input type ='hidden' name = 'tSt' value = " . $row["status"] . ">
												<input type ='submit' name = 'taskaction-submit' value = 'Resubmit'>
											</form> 
										  </td>
										  <td>
											<form action = 'Tasks_Action.php' method = 'post'>
												<input type ='hidden' name = 'tID' value = " . $row["taskID"] . ">
												<input type ='hidden' name = 'tSt' value = " . $row["status"] . ">
												<input type ='submit' name = 'taskdelete-submit' value = 'Delete'>
											</form> 
										  </td>";
								}
							}
							
							
							else if($idnum[0] == 2 || $idnum[0] == 3)
							{
								if($tSt == 0)
								{
									echo "<td>
											<form action = 'Tasks_Action.php' method = 'post'>
												<input type ='hidden' name = 'tID' value = " . $row["taskID"] . ">
												<input type ='hidden' name = 'tSt' value = " . $row["status"] . ">
												<input type ='submit' name = 'taskaction-submit' value = 'Accept'>
											</form> 
										  </td>
										  <td>
											<form action = 'Tasks_Action.php' method = 'post'>
												<input type ='hidden' name = 'tID' value = " . $row["taskID"] . ">
												<input type ='hidden' name = 'tSt' value = " . $row["status"] . ">
												<input type ='submit' name = 'taskdecline-submit' value = 'Decline'>
											</form> 
										  </td>";
								}
								else if($tSt == 1)
								{
									echo "<td>
											
										  </td>
										  <td>
											<form action = 'Tasks_Action.php' method = 'post'>
												<input type ='hidden' name = 'tID' value = " . $row["taskID"] . ">
												<input type ='hidden' name = 'tSt' value = " . $row["status"] . ">
												<input type ='submit' name = 'taskaction-submit' value = 'Complete'>
											</form> 
										  </td>";
								}
							}
						}									
					}
								   
			}
			else if($idnum[0] == 1){
				$sql = "SELECT *
					      FROM tasks
						 WHERE creatorID = '$idnum'
						   AND status = '$stat'";
				$result = mysqli_query($conn, $sql);
					if (mysqli_num_rows($result) > 0) {
						echo " '$header' ";
						while($row = mysqli_fetch_assoc($result)) {
						  echo "<tr>
									<td>
										<form action = 'Tasks_Form.php' method = 'post'>
											<input type ='hidden' name = 'tID' value = " . $row["taskID"] . ">
											<input type ='hidden' name = 'tSt' value = " . $row["status"] . ">
											<input type ='submit' name = 'taskform-submit' value = 'View'>
										</form> 
									</td>
									<td>" . $row["taskID"] . "</td>
									<td>" . $row["creatorID"] . "</td>
									<td>" . $row["fullName"] . "</td>
									<td>" . $row["priority"] . "</td>
									<td>" . $row["subject"] . "</td>
									<td>" . $row["description"] . "</td>
									<td>" . $row["status"] . "</td>
									<td>" . $row["submitDate"] . "</td>
								</tr>";
						}
					}			   
			}
			else if($idnum[0] == 2 || $idnum[0] == 3){
					$sql = "SELECT *
					      FROM tasks
						 WHERE status = '$stat'";
			
					$result = mysqli_query($conn, $sql);

					if (mysqli_num_rows($result) > 0) {
						echo " '$header' ";
						while($row = mysqli_fetch_assoc($result)) {
							echo "<tr>
									<td>
									<form action = 'Tasks_Form.php' method = 'post'>
										<input type ='hidden' name = 'tID' value = " . $row["taskID"] . ">
										<input type ='hidden' name = 'tSt' value = " . $row["status"] . ">
										<input type ='submit' name = 'taskform-submit' value = 'View'>
									</form> 
								</td>
								<td>" . $row["taskID"] . "</td>
								<td>" . $row["creatorID"] . "</td>
								<td>" . $row["fullName"] . "</td>
								<td>" . $row["priority"] . "</td>
								<td>" . $row["subject"] . "</td>
								<td>" . $row["description"] . "</td>
								<td>" . $row["status"] . "</td>
								<td>" . $row["submitDate"] . "</td>
							 </tr>";
						}
					}
			}
			
			else{	echo "ERROR!";}
			
				
			?>
			</table>
</html>