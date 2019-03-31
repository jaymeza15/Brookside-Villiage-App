<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Tenant Home</title>
		<link rel="stylesheet" type="text/css" href="CSS/TheBestCss4.css">
		<meta charset="utf-8">
	</head>
	<body>
		<header>
		<h1><i> <a href = "Home.php"> Brookside Village </a></i></h1>
		<center>
		<font size="6">
		<table class="table1" style="width:80%", frame="box", align=right>
			<tr>
				<td><a href="Home.php">            Home       </a></td>
				<td><a href="Tasks_View.php">      Tasks      </a></td> 
				<td><a href="Requests_View.php">   Requests   </a></td> 
				<td><a href="Complaints_View.php"> Complaints </a></td> 
				<td><a href="Messages_View.php">   Messages   </a></td> 
				<td><a href="Vehicles_View.php">   Vehicles   </a></td> 
				<td><a href="Fine.php">      Fines      </a></td>
			</tr>
		</table>
		</font>
		<form  action ="Logout.php" method = "post">
				<button class="circ" type = "submit" name = "logout-submit"> Logout </button>
		</form>
		
		</header>
	</body>
</html>