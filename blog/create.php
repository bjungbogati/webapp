<!DOCTYPE html>
<html>
<head>
	<title>Create</title>
	<?php include('src.php');?>
</head>
<body>

<div class="container" style="margin: 20px 50px">
<div class="row">

<h1 class="text-center">Address Book List</h1>
<br><br>

<form name="form1" class="form-horizontal"  method="post" action="add_post.php">

<div class="form-group">
    <label class="col-xs-2 control-label">Topic :</label>
    <div class="col-xs-10"> <input type="text" name="topic" class="form-control" id="inputName" placeholder="Your Name" required>
  </div>
  </div>

  <div class="form-group">
    <label class="col-xs-2 control-label">Detail :</label>
    <div class="col-xs-10"><textarea name="detail" class="form-control"></textarea>
  </div>
  </div>


 <div class="form-group">
    <label class="col-xs-2 control-label">Name : </label>
    <div class="col-xs-10"> <input type="text" name="name" class="form-control" id="inputName" placeholder="Your Name" required>
  </div>
  </div>

   <div class="form-group">
    <label for="inputEmail" class="col-xs-2 control-label">Email :</label>
     <div class="col-xs-10">
     <input type="email" name="email" class="form-control" id="inputEmail" placeholder="Email" data-error="Bruh, that email address is invalid" required>
    <div class="help-block with-errors"></div>
  </div>
  </div>
	
	<div class="form-group">
   <label  class="col-xs-2 control-label"></label>
    <div class="col-xs-10"> 
    <button type="submit" class="btn btn-primary">Submit</button>
  </div>
  </div>
	

</form>

</div>
</div>


</body>
</html>