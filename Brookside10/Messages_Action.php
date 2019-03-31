<?php
  if(isset($_POST['Message-submit'])){
	require 'DatabaseConn.php';
  
	  session_start();
	  
	  $t1 = $_POST["first"];
	  $t2 = $_POST["last"];
	  
	  $s = "SELECT userID
			  FROM users
			 WHERE firstname = '$t1'
			   AND lastname = '$t2'";
			   
	  $r = mysqli_query($conn,$s);
	  if (mysqli_num_rows($r) == 1) {
		while($row = mysqli_fetch_assoc($r)) {
			$targetID = $row["userID"];
		}
	  }
	  
	  
	  $myid = $_SESSION['ID'];
	  $full = $_SESSION["first"] . " " . $_SESSION["last"]; 
	  $sub = mysqli_real_escape_string($conn,$_POST['sub']);
	  $des = mysqli_real_escape_string($conn,$_POST['des']); 
	  $date = date("Y-m-d h:i:s");

	  

      	$sql1 = "INSERT INTO messages (senderID, 
										sender, 
										targetID,
										subject, 
										description,      
										status,    
										submitDate) 
							 VALUES   ('$myid', 
					     			   '$full',
									   '$targetID',
									   '$sub', 
									   '$des', 
									      0  , 
									   '$date')";
		  
	  
      	if(!mysqli_query($conn, $sql1)){echo "Not inserted";}
      	else{header("Location: Messages_View.php");}
      
   }
   else
   {
		header("Location: Messages_Add.php?error=sqlerror");
		exit();	
	
	}
?>