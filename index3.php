<?php include('process.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css"	href="style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>

<div id="main">
			
<br>
	<section class="main">
    <div class="row justify-content-center">
	<div class="col-sm-4">
	<div class="row justify-content-center">
	<form action="process.php" method="POST">
	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="form-group"><b>
		<font color="black"><label for="exampleInputEmail1">Enter Your Name:</label>
			<input type="text" name="firstname" class="form-control" value="<?php echo $firstname;?>"placeholder="Firstname" required>
		</div>
		<div class="form-group">
		<font color="black"><label for="exampleInputEmail1">Enter Your Lastname:</label>
			<input type="text" name="lastname" class="form-control" value="<?php echo $lastname;?>"placeholder="Lastname" required>
		</div>
		<div class="form-group">
		<font color="black"><label for="exampleInputEmail1">Enter Your Middlename:</label>
			<input type="text" name="middlename" class="form-control" value="<?php echo $middlename;?>"placeholder="middlename" required>
		</div>
		<div class="form-group">
		<font color="black"><label for="exampleInputEmail1">Enter Your Extname:</label>
			<input type="text" name="extname" class="form-control" value="<?php echo $extname;?>"placeholder="extname" required>
		</div>
		<div class="form-group">
		<font color="black"><label for="exampleInputEmail1">Enter Your Phoneno:</label>
			<input type="text" name="phoneno" class="form-control" value="<?php echo $phoneno;?>"placeholder="phoneno" required>
		</div>
		<div class="form-group">
		<font color="black"><label for="exampleInputEmail1">Enter Your Street:</label>
			<input type="text" name="street" class="form-control" value="<?php echo $street;?>"placeholder="street" required>
		</div>
		<div class="form-group">
		<font color="black"><label for="exampleInputEmail1">Enter Your City:</label>
			<input type="text" name="city" class="form-control" value="<?php echo $city;?>"placeholder="city" required>
		</div></b>
		<div class="form-group">
		<?php 
			if($update==true):
		?>
		<button type="submit" class="btn btn-info" name="update">Update</button>
		<a href="index2.php"class="btn btn-info">Cancel</a>
		<?php else: ?>
			<button type="submit" class="btn btn-primary" name="save">Save</button>
			<a href="index2.php"class="btn btn-primary">Cancel</a>
		<?php endif;?>
		</div>
	</form>
	</div>

<br>

</body>
</html>
