<?php
  if(isset($_POST['Tasks-submit'])){
	require 'DatabaseConn.php';
  
	  session_start();
	  $myid = $_SESSION['ID'];
	  if($myid[0] == 1){	$status = 0;}
	  else 			   {	$status = 1;}
	  $full = $_SESSION["first"] . " " . $_SESSION["last"]; 
	  $pri = mysqli_real_escape_string($conn,$_POST['pri']);
	  $sub = mysqli_real_escape_string($conn,$_POST['sub']);
	  $des = mysqli_real_escape_string($conn,$_POST['des']); 
	  $date = date("Y-m-d h:i:s");

	  //Gets info that matches
      $sql = "SELECT taskID FROM tasks WHERE priority = '$pri' and subject = '$sub' and description = '$des' ";
      $result = mysqli_query($conn,$sql);
      //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      $count = mysqli_num_rows($result);
      	
	  //if the amount of rows obtain is one, there is a match therfore cant insert		
      if($count == 1) { $error = "Your Request is already submitted";}
      //else insert the new data into the tasktable 
	  else{

      	$sql1 = "INSERT INTO tasks   (creatorID, 
									  fullName,        
									  priority,      
									  subject,       
									  description,      
								      status,    
									  submitDate) 
                            VALUES   ('$myid', 
					     			   '$full', 
									   '$pri', 
									   '$sub', 
									   '$des', 
									   '$status', 
									   '$date')";
		  
	  
      	if(!mysqli_query($conn, $sql1)){echo "Not inserted";}
      	else{header("Location: Tasks_View.php");}
      }
   }
   else if(isset($_POST['taskaction-submit'])){
	            require 'DatabaseConn.php';

				$tSt = $_POST['tSt'];
				if($tSt == 0){	$stat = 1;}
				else if($tSt == 1){	$stat = 2;}
				else if($tSt == 3){ $stat = 0;}
				$taskid = $_POST['tID'];
				$sql = "UPDATE tasks
				           SET status = '$stat'  
						 WHERE taskID = '$taskid' ";
				if(!mysqli_query($conn, $sql)){echo "Not inserted";}
				else{header("Location: Tasks_View.php");}
   }
	else if(isset($_POST['taskdecline-submit'])){
	            require 'DatabaseConn.php';
				
				$taskid = $_POST['tID'];
				$sql = "UPDATE tasks
				           SET status = 3  
						 WHERE taskID = '$taskid' ";
				if(!mysqli_query($conn, $sql)){echo "Not inserted";}
				else{header("Location: Tasks_View.php");}
   }   
   else if(isset($_POST['taskdelete-submit'])){
	            require 'DatabaseConn.php';
				
				$taskid = $_POST['tID'];
				$sql = "DELETE FROM tasks 
							  WHERE taskID = '$taskid' ";
				if(!mysqli_query($conn, $sql)){echo "Not inserted";}
				else{header("Location: Tasks_View.php");}
   }
   else
   {
		header("Location: View_AddTasks.php?error=sqlerror");
		exit();	
	
	}
?>