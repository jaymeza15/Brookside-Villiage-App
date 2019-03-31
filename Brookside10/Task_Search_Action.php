<?php
  if(isset($_POST['Tasks-submit'])){
	require 'DatabaseConn.php';
  
	  $tID = $_POST["taskID"];
	  $cID = $_POST["creatorID"];
	  $name = $_POST["fullName"];
	  $pri = $_POST["prioirty"];
	  $sub = $_POST["subject"];
	  $sd = $_POST["submitDate"];
	  $cd = $_POST["compDate"];

	  //Gets info that matches
      $sql = "SELECT taskID FROM tasks WHERE priority = '$pri' and subject = '$sub' and description = '$des' ";
      $result = mysqli_query($conn,$sql);
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