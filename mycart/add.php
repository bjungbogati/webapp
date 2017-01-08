<?php session_start();?>

<?php

if(!isset($_SESSION['valid'])){
	header('Location: login.php');
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Data</title>
</head>
<body>

<?php

include('db.php');

if(isset($_POST['Submit'])){
	$name = $_POST['name'];
	$qty = $_POST['qty'];
	$cost = $_POST['cost'];
	$loginId = $_SESSION['id'];
}

//check empty fields 

if(empty($name)|| empty($qty) || empty($cost)){
	if($emtpy($name)){
		echo"Name field is empty <br>";
	}

	if($emtpy($qty)){
		echo "Quantity field is empty<br>"
	}
} else{
	$result = mysqli_query($conn, "INSERT INTO products(name, qty, cost, login_id) VALUES ('$name','$qty','$cost','$loginID");
	echo "Data Added Successfully.";
	echo "<a href='view.php'>View Result</a>";
}
}
?>



</body>
</html>