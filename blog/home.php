<!DOCTYPE html>
<html>
<head>
	<title>My Tech Blog</title>
	<?php include('src.php')?>
</head>
<body>

<?php

require('dbconnect.php');
$tbl_name = "blog_post";
$sql = "SELECT * FROM $tbl_name ORDER BY id DESC";
$result = mysqli_query($conn,$sql);
?>


<div class="table-responsive">
<table class="table table-hover table-striped">
<thead><tr>
<th>#ID</th>
<th>TOPIC</th>
<th>VIEWS</th>
<th>REPLIES</th>
<th>DATE/TIME</th>
</tr></thead>

<?php

while($rows = mysqli_fetch_array($result)){
?>

<tbody>
<tr>
	<td><?php echo $rows['id']; ?></td>
	<td><a href="view.php?id=<?php echo $rows['id'];?>"><?php echo $rows['topic']?></a></td>
	<td><?php echo $rows['view']?></td>
	<td><?php echo $rows['reply']?></td>
	<td><?php echo $rows['datetime'];?></td>
</tr>

</tbody>
</div>


<?php
}
mysqli_close($conn);
?>

<a href="create.php" class="btn btn-success">New Topic</a>


</table>
</body>
</html>
