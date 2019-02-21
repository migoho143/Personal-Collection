<?php include('process3.php');?>
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
	<form action="process3.php" method="POST">
	<input type="hidden" name="code_no" value="<?php echo $id; ?>">
	<div class="form-group">
	<br><br>
		<b><a style="font-size:20px;">Customer_ID</b></a>
		<?php
			$sql = "SELECT * FROM customer";
			$result = mysqli_query($mysqli, $sql);

		?>
		<select name="customer_id">
		<?php
			$resultCheck = mysqli_num_rows($records);
				while ($row = mysqli_fetch_array($result)){
					
		?>
			<option value="<?php echo $row['customer_id'];?>"><?php echo $row['customer_id'];?></option>
			<?php
				}
			?>
		</select>
		<div class="form-group">
		<font color="black"><label for="exampleInputEmail1"><b>Status:</label></b>
		<select name="status">
			<option value=""></option>
			<option value="single">Single</option>
			<option value="married">Married</option>
			<option value="divorced">Divorced</option>
			<option value="widowed">Widowed</option>
			
		</div>
		</select>
		<div class="form-group">
		<font color="black"><label for="exampleInputEmail1"><b>Date_paid:</label></b>
			<input type="date" name="date_paid" class="form-control" value="<?php echo $date_paid;?>"placeholder="date_paid" required>
		</div>
		<div class="form-group">
		<font color="black"><label for="exampleInputEmail1"><b>Interest:</label></b>
			<input type="interest" name="interest" class="form-control" value="<?php echo $interest;?>"placeholder="interest" required>
		</div>
		<div class="form-group">
		<?php 
			if($update==true):
		?>
		<button type="submit" class="btn btn-info" name="update">Update</button>
		<a href="collection.php"class="btn btn-info">Cancel</a>
		<?php else: ?>
			<button type="submit" class="btn btn-primary" name="save">Save</button>
			<a href="collection.php"class="btn btn-primary">Cancel</a>
		<?php endif;?>
		</div>
	</form>
	</div>

<br>

</body>
</html>
