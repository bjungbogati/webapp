<!DOCTYPE html>
<html>
<head>
	<title>View</title>
	<?php include('src.php')?>
</head>
<body>

<?php

require('dbconnect.php');

$tbl_name = "blog_post";


$id = $_GET['id'];
$sql = "SELECT * FROM $tbl_name WHERE id='$id'";
$result = mysqli_query($conn,$sql);

$rows = mysqli_fetch_array($result);

?>

<div class="container">
<div class="row">
<div class="table-responsive">
<table class="table table-hover table-striped">
	<tr>
		<td><?php echo $rows['topic'];?></td>
	</tr>
	<tr>	
	<td><?php echo $rows['detail'];?></td>
	</tr>
	<tr>
		<td>By: <?php echo $rows['name'];?></td>

	</tr>
	<tr><td>Email : <?php echo $rows['email'];?></td></tr>
	<tr><td>Date/Time : <?php echo $rows['datetime'];?></td></tr>

</table>


<br>

<?php 

$tbl_name2 = "blog_comment";

$sql2 = "SELECT * FROM $tbl_name2 WHERE pid = '$id'";

$result2 = mysqli_query($conn,$sql2);

while($rows = mysqli_fetch_array($result2)){
	?>

<div style="width:50%;"><table class="table table-hover table-striped">

<tr>
<td>#ID</td>
<td><?php echo $rows['a_id']; ?></td>
</tr>
<tr><td>Name</td>
<td><?php echo $rows['a_name']?></td>
</tr>
<tr><td>Email</td>
<td><?php echo $rows['a_email']?></td>
</tr>
<tr><td>Comment</td>
<td><?php echo $rows['a_comment']?></td>
</tr>
<tr><td>Date/Time</td>
<td><?php echo $rows['a_datetime'];?></td>
</tr>
	
</table>
</div>


<?php
}

$sql3 = "SELECT view FROM $tbl_name WHERE id='$id'";
$result3 = mysqli_query($conn, $sql3);
$rows = mysqli_fetch_array($result3);

$view = $rows['view'];


//if no user views
if(empty($view)){
	$view = 1;
	$sql4 = "INSERT INTO $tbl_name(view) VALUES('$view') WHERE id='$id'";

	$result4 = mysqli_query($conn,$sql4);
}

//counting more values

$addview = $view+1;
$sql5 ="UPDATE $tbl_name SET view='$addview' WHERE id='$id'";

$result5 = mysqli_query($conn, $sql5);

mysqli_close($conn);

?>

<table  class="table table-hover table-striped">
	<form  class="form-horizontal" method="post" action="add_comment.php">
    <div class="form-group">
    <label for="inputName" class="col-xs-2 control-label">Name : </label>
    <div class="col-xs-10"> <input type="text" name="q_name" class="form-control" id="inputName" placeholder="Your Name" required>
    <div class="help-block with-errors"></div>
  </div>
  </div>

  <div class="form-group">
    <label for="inputEmail" class="col-xs-2 control-label">Email : </label>
     <div class="col-xs-10"><input type="email" name="q_email" class="form-control" id="inputEmail" placeholder="Email" data-error="Bruh, that email address is invalid" required>
    <div class="help-block with-errors"></div>
  </div>
  </div>
 <div class="form-group">
    <label for="inputComment" class="col-xs-2 control-label">Comment</label>
  <div class="col-xs-10">  <textarea name="a_comment" class="form-control" id="inputComment" placeholder="Comment" required></textarea>
  <div class="help-block with-errors"></div>
  </div>
  </div>	
<input type="hidden" name="id" value="<?php echo $id; ?>"/>
<div class="help-block with-errors"></div>
<br/><br/>
<div class="form-group">
   <label  class="col-xs-2 control-label"></label>
    <div class="col-xs-10"> <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  </div>
	</form>


</table>

</div>
</div>




</body>
</html>