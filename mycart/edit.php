<?php session_start();?>

<?php 
if(!isset($_SESSION['valid'])){
	header('Location: login.php');
}
?>

<?php 

include('db.php');

if(isset($_POST['update'])){
	$id = $_POST['id'];
	$name = $_POST['name'];
	$qty = $_POST['qty'];
	$cost = $_POST['cost'];

if(empty($name) || empty($qty) || empty($price)){
	if(empty($name)){
		echo "Name field is empty";
	}
	if(empty($qty)){
		echo "Quantity field is empty";
	}
	if(empty($cost)){
		echo "Cost field is empty";
	}
} else{
	$result = mysqli_query($conn, "UPDATE items SET name = '$name', qty = '$qty', price = '$price' WHERE id=$id");

	header("Location: view.php");
}
}
?>
<?php
$id = $_GET['id'];

$result = mysqli_query($conn, "SELECT * FROM items WHERE id=$id");

while($res = mysqli_fetch_array($result))
{
	$name = $res['name'];
	$qty = $res['qty'];
	$cost = $res['price'];
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Data</title>
</head>
<body>
	<a href="index.php">Home</a> | <a href="view.php">View Items</a> | <a href="logout.php">Logout</a>
	<br/><br/>
<form method="post" action="edit.php">
		<table>
			<tr> 
				<td>Name</td>
				<td><input type="text" name="name" value="<?php echo $name;?>"></td>
			</tr>
			<tr> 
				<td>Quantity</td>
				<td><input type="text" name="qty" value="<?php echo $qty;?>"></td>
			</tr>
			<tr> 
				<td>Cost</td>
				<td><input type="text" name="cost" value="<?php echo $cost;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>

</body>
</html>