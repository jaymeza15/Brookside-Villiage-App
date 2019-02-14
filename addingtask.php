<?php
   include("config.php");
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      
      $myname = mysqli_real_escape_string($db,$_POST['name']);
      $mydes = mysqli_real_escape_string($db,$_POST['description']); 
	  $myprior = mysqli_real_escape_string($db,$_POST['priority']);
	  $date = date("Y-m-d");

      
      $sql = "SELECT taskID FROM tasktable WHERE Name = '$myname' and Priority = '$myprior'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
      $active = $row['active'];
      
      $count = mysqli_num_rows($result);
      
      // If result matched $myusername and $mypassword, table row must be 1 row
		
      if($count == 1) { $error = "Your Task is already submitted";}
      else{

      	$sql1 = "INSERT INTO tasktable (Name, Description, Priority, SubmitDate) 
                              VALUES ('$myname' , '$mydes' , '$myprior' , '$date' )";
		  
		//$sql1 = "INSERT INTO tasktable (Name, Description, Priority, SubmitDate) 
          //                 VALUES ('$myname' , '$mydes' , '$myprior' , '$date' )";
      
	    //$sql1 = "INSERT INTO tasktable (taskID, Name, Description, Priority) 
                    //VALUES ('01' , '$myname' , '$mydes' , '$myprior' )";
	  
      	if(!mysqli_query($db, $sql1)){echo "Not inserted";}
      	else{header("Location: ViewTasks.php");}
      }
   }
?>
<!--
<html>
   
   <head>
      <title>Add User</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
	  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:300px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><center><b>Sign Up</b></center></div>
				
            <div style = "margin:30px">
               Enter Task Info
               <form action = "" method = "post">
                  <label>Name  :</label><input type = "text" name = "name" class = "box"/><br /><br />
                  <label>Description  :</label><input type = "text" name = "description" class = "box" /><br/><br />
                  <label>Priority  :</label><input type = "number" name = "priority" class = "box" /><br/><br />
                  

				  <input type = "submit" value = " Submit " /><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px">
			   
			   </div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>
-->