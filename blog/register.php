<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<?php include('src.php');?>
</head>
<body>

<a href="home.php">Home</a><br/>

<?php 
require('dbconnect.php');


if(isset($_POST['submit'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$user = $_POST['username'];
	$pass = $_POST['password'];


	if($user == "" || $pass == "" || $name == "" || $email == ""){
       echo "One of the field is empty <br>";
       echo "<a href='register.php'>Go Back</a>";
   } 
   else {
     	$sql = "INSERT INTO login(name,email,username,password) VALUES ('$name','$email','$user',md5('$pass'))";
   	     $result = mysqli_query($conn, $sql);

   	      if($result){
   		echo "Registration Successful";
   		echo "<a href='login.php'>Login</a>";
   	     } else {
   		      echo mysqli_error($conn);
   	          }

         }
} else {
	?>

<h1>Register</h1>
<form action="">
	Full Name : <input type="text" name="name"><br>
	Email : <input type="email" name="email">
	<br>
	Username : <input type="text" name="username"><br>
	Password : <input type="password" name="password"><br>
	<button class="btn btn-success" type="submit">Submit</button>

</form>

<?php
}
?>

</body>
</html>


