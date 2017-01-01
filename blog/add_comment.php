<?php

require('dbconnect.php');

$tbl_name = "blog_comment";

//get value of id passed from hidden field
$id = $_POST['id'];

//find the larget comment number

$sql = "SELECT MAX(a_id) AS Maxa_id FROM $tbl_name WHERE pid='$id'";


$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_array($result);

// add +1 to largest comment number 

if($rows){
	$Max_id = $rows['Maxa_id']+1;
}

else {
	$Max_id = 1;
}

$a_name = $_POST['a_name'];
$a_email = $_POST['a_email'];
$a_comment = $_POST['a_comment'];

$datetime = date("d/m/y H:i:s");

$sql2 = "INSERT INTO $tbl_name(pid,a_id,a_name, a_email, a_comment, a_datetime)VALUES('$id','$Max_id','$a_name','$a_email','$a_comment','$datetime')";

$result2 = mysqli_query($conn, $sql2);

if($result2){
	echo "Successful <br>";
	echo "<a href='view.php?id=".$id."'>View Your Comment</a>";
// if added new comment, add +1 value in reply 

	$tbl_name2 = "blog_post";
	$sql3 = "UPDATE $tbl_name2 SET reply='$Max_id' WHERE id='$id'";

	$result3 = mysqli_query($conn, $sql3);
}

else {
	 echo mysqli_error($conn);
}

mysqli_close($conn);
?>