<?php
  if(isset($_POST['Req-submit'])){
	require 'DatabaseConn.php';
  
	  session_start();
	  $myid = $_SESSION['ID'];
	  $full = $_SESSION["first"] . " " . $_SESSION["last"]; 
	  $pri = mysqli_real_escape_string($conn,$_POST['pri']);
	  $sub = mysqli_real_escape_string($conn,$_POST['sub']);
	  $des = mysqli_real_escape_string($conn,$_POST['des']); 
	  $date = date("Y-m-d h:i:s");

	  //Gets info that matches
      $sql = "SELECT requestID FROM requests WHERE priority = '$pri' and subject = '$sub'";
      $result = mysqli_query($conn,$sql);
      //$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      //$active = $row['active'];
      $count = mysqli_num_rows($result);
      	
	  //if the amount of rows obtain is one, there is a match therfore cant insert		
      if($count == 1) { $error = "Your Request is already submitted";}
      //else insert the new data into the tasktable 
	  else{

      	$sql1 = "INSERT INTO requests (tenantID, 
									  tenantName,        
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
									      0  , 
									   '$date')";
		  
	  
      	if(!mysqli_query($conn, $sql1)){echo "Not inserted";}
      	else{header("Location: Requests_View.php");}
      }
   }
   else if(isset($_POST['requestaction-submit'])){
	require 'DatabaseConn.php';
				$rSt = $_POST['rSt'];
				if($rSt == 0){	$stat = 1;}
				else if($rSt == 1){	$stat = 2;}
				else if($rSt == 3){ $stat = 0;}
				$reqid = $_POST['rID'];
				$sql = "UPDATE requests
				           SET status = '$stat'  
						 WHERE requestID = '$reqid' ";
				if(!mysqli_query($conn, $sql)){echo "Not inserted";}
				else{header("Location: Requests_View.php");}
	
	
   }
    else if(isset($_POST['requestdecline-submit'])){
	require 'DatabaseConn.php';
				$reqid = $_POST['rID'];
				$sql = "UPDATE requests
				           SET status = 3  
						 WHERE requestID = '$reqid' ";
				if(!mysqli_query($conn, $sql)){echo "Not inserted";}
				else{header("Location: Requests_View.php");}
   }
   else if(isset($_POST['requestdelete-submit'])){
	require 'DatabaseConn.php';
				$reqid = $_POST['rID'];
				$sql = "DELETE FROM requests
						 WHERE requestID = '$reqid' ";
				if(!mysqli_query($conn, $sql)){echo "Not inserted";}
				else{header("Location: Requests_View.php");}
   }
   else
   {
		header("Location: Requests_Add.php?error=sqlerror");
		exit();	
	
	}
?>