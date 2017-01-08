<?php session_start();?>

<?php 
if(!isset($_SESSION['valid'])){
	header('Location: login.php');
}
?>

<?php
include('db.php');


$result = mysqli_query($conn, "SELECT * FROM items WHERE login_id=".$_SESSION['id']." ORDER BY id DESC");
?>

<!DOCTYPE html>
<html>
<head>
	<title>VIEW PAGE</title>
</head>
<body>

<a href="index.php">Home</a> | <a href="add.html">NEW DATA</a> | <a href="logout.php">Logout</a><br>


<table>
	<tr>
		<td>NAME</td>
		<td>Quantity</td>
		<td>Cost</td>
		<td>Update</td>
	</tr>
	<?php
	while($res = mysqli_fetch_array($result)){
?>
		<tr>
		<td><?php $res['name'];?></td>
		<td><?php $res['qty'];?></td>
		<td><?php $res['cost'];?></td>
		<td><a href=\"edit.php?id=<?php $res[id];?>\">Edit</a> | <a href=\"delete.php?id=<?php $res[id];?>\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td></td>

		</tr>

	<?php
	}

	?>










</table>


</body>
</html>