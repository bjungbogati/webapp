<?php session_start();?>
<?php
if(!isset($_SESSION['valid'])){
	header('Location: login.php');
}
?>

<?php

include('db.php');

$id = $_GET['id'];

$result = mysqli_query($conn, "DELETE FROM items WHERE id = $id");

header("Location : view.php");

?>