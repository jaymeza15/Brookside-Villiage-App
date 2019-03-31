<?php
  if(isset($_POST['Complaints-submit'])){
	require 'DatabaseConn.php';
  
	  session_start();
	  $myid = $_SESSION['ID'];
	  $full = $_SESSION["first"] . " " . $_SESSION["last"]; 
	  //$pri = mysqli_real_escape_string($conn,$_POST['pri']);
	  $sub = mysqli_real_escape_string($conn,$_POST['sub']);
	  $des = mysqli_real_escape_string($conn,$_POST['des']); 
	  $date = date("Y-m-d h:i:s");

	  //Gets info that matches
      $sql = "SELECT complaintID FROM complaints WHERE subject = '$sub'
												   AND senderID = '$myid' ";
      $result = mysqli_query($conn,$sql);
      //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      $count = mysqli_num_rows($result);
      	
	  //if the amount of rows obtain is one, there is a match therfore cant insert		
      if($count == 1) { $error = "Your Request is already submitted";}
      //else insert the new data into the tasktable 
	  else{

      	$sql1 = "INSERT INTO complaints (senderID, 
										sender,      
										subject,       
										description,      
										status,    
										submitDate) 
							 VALUES   ('$myid', 
					     			   '$full', 
									   '$sub', 
									   '$des', 
									      0  , 
									   '$date')";
		  
	  
      	if(!mysqli_query($conn, $sql1)){echo "Not inserted";}
      	else{header("Location: Complaints_Pend.php");}
      }
   }
   else if(isset($_POST['complaintaction-submit'])){
		require 'DatabaseConn.php';
	
		$id = $_POST["compID"];
		$cSt = $_POST["cSt"];
	
		if($cSt == 0)
		{
			$sql = "UPDATE complaints
				   SET status = 1
				 WHERE complaintID = '$id' ";
		
			if(!mysqli_query($conn, $sql)){echo "Not inserted";}
			else{header("Location: Complaints_View.php");}
		}
		else if($cSt == 1)
		{
			$sql = "UPDATE complaints
				   SET status = 2
				 WHERE complaintID = '$id' ";
		
			if(!mysqli_query($conn, $sql)){echo "Not inserted";}
			else{header("Location: Complaints_View.php");}
		}
	}
   else if(isset($_POST['Complaintdelete-submit'])){
	require 'DatabaseConn.php';
	
	$id = $_POST["compID"];
	$sql = "DELETE FROM complaints
				  WHERE complaintID = '$id' ";
		
		if(!mysqli_query($conn, $sql)){echo "Not inserted";}
      	else{header("Location: Complaints_View.php");}
	
	
   }
   else
   {
		header("Location: View_AddReq.php?error=sqlerror");
		exit();	
	
	}
?>