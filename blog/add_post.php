<?php

require('dbconnect.php');

$tbl_name = "blog_post";
$topic = $_POST['topic'];
$detail = $_POST['detail'];
$name = $_POST['name'];
$email = $_POST['email'];
$datetime = date("d/m/y h:i:s");


$sql = "INSERT INTO $tbl_name(topic, detail, name, email, datetime) VALUES('$topic','$detail','$name','$email','$datetime')";

$result = mysqli_query($conn,$sql);

if($result){
	echo "Successful <br>";
	echo "<a href=home.php>View Blog Posts</a>";
}
else {
	echo mysqli_error($conn);
}

mysqli_close($conn);

?>