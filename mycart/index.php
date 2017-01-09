<?php session_start(); ?>
<html>
<head>
	<title>Homepage</title>
	<?php include('src.php');?>
</head>

<body>
	<div id="header">
		Welcome to my page!
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("db.php");					
		$result = mysqli_query($conn, "SELECT * FROM login");
	?>
				
		Welcome <?php echo $_SESSION['name'] ?> ! <a href='logout.php'>Logout</a><br/>
		<br/>
		<a href='view.php'>View and Add Items</a>
		<br/><br/>
	<?php	
	} else {
		echo "You must be logged in to view this page.<br/><br/>";
		echo "<a class='btn btn-primary' href='login.php'>Login</a>  <a class='btn btn-success' href='register.php'>Register</a>";
	}
	?>
	<div id="footer">
		Copyright 2016
	</div>
</body>
</html>
