<php session_start();?>

<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
</head>
<body>
<?php

require('db.php');

if(isset($_POST['submit'])){
	$user = mysqli_real_escape_string($conn,$_POST['username']);
	$pass = mysqli_real_escape_string($conn, $_POST('password'));

if($user= "" || $pass = ""){
	echo "Missing field";
}
else{

$result = mysqli_query($conn, "SELECT * FROM login WHERE username = '$user' AND password = '$pass'") or die($conn->error);
$row = mysqli_fetch_assoc($result);

if(is_array($row) && !empty($row)){
	$validuser = $row['username'];
	$_SESSION['valid'] = $validuser;
	$_SESSION['name'] = $row['name'];
	$_SESSION['id'] = $row['id'];
} else {
	echo "Invalid user or pass";
	echo "<a href='login.php'>Go Back</a>";
}


if(isset($_SESSION['valid'])){
	header['Location: index.php'];
}

	}
	} else{
	?>

	<form method="post" action="">
Username : <input type="text" name="username">
Password : <input type "password" name="password">

<input type="submit">

</form>

<?php 

}
?>


</body>
</html>

