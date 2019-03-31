<center><table class="table3">	
			<?php	
			$header="<tr>
					<th> </th>
					<th>messageID</th>
					<th>senderID</th>
					<th>sender</th>
					<th>subject</th>
					<th>Description</th>
					<th>Status</th>
					<th>Submit Date</th>
				</tr>";
			if(isset($_POST['messageform-submit']))
			{
				$mid = $_POST["mID"];
				$mst = $_POST["mSt"];
				
				$sql = "SELECT *
					      FROM messages
						 WHERE messageID = $mid";
						  
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr><td>MessageID    </td><td>" .$row["messageID"] . "  </td></tr>
							  <tr><td>SenderID     </td><td>" .$row["senderID"] . "   </td></tr>
							  <tr><td>Sender       </td><td>" .$row["sender"] . "     </td></tr>
							  <tr><td>Subject      </td><td>" .$row["subject"] . "    </td></tr>
							  <tr><td>Description  </td><td>" .$row["description"] . "</td></tr>
							  <tr><td>Status       </td><td>" .$row["status"] . "     </td></tr>
							  <tr><td>Submit Date  </td><td>" .$row["submitDate"] . " </td></tr>
							  ";
					}
					
					$sql2 = "UPDATE messages
							   SET status = 1
					         WHERE messageID = '$mid' ";
					if(!mysqli_query($conn, $sql2)){echo "Not inserted";}
				}
			
			}
			else
			{
				$sql = "SELECT *
					      FROM messages
						 WHERE targetID = $idnum
						   AND status = '$stat'";
						  
				$result = mysqli_query($conn, $sql);

				if (mysqli_num_rows($result) > 0) {
					echo " '$header' ";
					while($row = mysqli_fetch_assoc($result)) {
						echo "<tr>
								<td>
									<form action = 'Messages_Form.php' method = 'post'>
										<input type ='hidden' name = 'mID' value = " . $row["messageID"] . ">
										<input type ='hidden' name = 'mSt' value = " . $row["status"] . ">
										<input type ='submit' name = 'messageform-submit' value = 'View'>
									</form> 
									
									
								</td>
								<td>" . $row["messageID"] . "</td>
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