<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<a href="index.php">Index</a><br>
<?php

include("dbconnect.php");

if(isset($_POST['submit'])){
	$user = mysqli_real_escape_string($conn,$_POST['username']);
	$pass = mysqli_real_escape_string($conn, $_POST['password']);

	if($user == "" || $pass == ""){
       echo "Either username or password is empty.";
       echo "<a href='login.php'>Go back</a>";
   } else{
   	$sql = "SELECT * FROM login WHERE username='$user' AND password = md5('$pass')") or die("Username & password doesnt match ");
   	$result = mysqli_query($conn, $sql);
   	$row = mysqli_fetch_assoc($result);

   	if(is_array($row) && !empty($row)){
   		$validuser = $row['username'];
   		$_SESSION['']

   	}

   }




	}


}






</body>
</html>