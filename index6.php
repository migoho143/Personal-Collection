<?php include('process4.php');

?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css"	href="style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
<img src="pcs.jpg" alt="Trulli" width="400" height="45">
<div id="main">
			
<br>
	<section class="main">

    <div class="row justify-content-center">
	<div class="col-sm-4">
	<div class="row justify-content-center">
	<form action="process4.php" method="POST">
	<input type="hidden" name="code_no" value="<?php echo $id; ?>">
	<div class="form-group">
	
		<b><a style="font-size:20px;">Code No.</b></a>
		<?php
			$sql = "SELECT * FROM collection";
			$result = mysqli_query($mysqli, $sql);

		?>
		<select name="code_no" class="form-control">
		<?php
			$resultCheck = mysqli_num_rows($records);
				while ($row = mysqli_fetch_array($result)){
					
		?>
			<option value="<?php echo $row['code_no'];?>"><?php echo $row['code_no'];?></option>
			<?php
				}
			?>
		</select>
		
		<div class="form-group">
	
		<b><a style="font-size:20px;">Product ID</b></a>
		<?php
			$sql = "SELECT * FROM product";
			$result = mysqli_query($mysqli, $sql);

		?>
		<select name="product_id" class="form-control">
		<?php
			$resultCheck = mysqli_num_rows($records);
				while ($row = mysqli_fetch_array($result)){
					
		?>
			<option value="<?php echo $row['product_id'];?>"><?php echo $row['product_id'];?></option>
			<?php
				}
			?>
		</select>

		<div class="form-group">
		<font color="black"><label for="exampleInputEmail1"><b>Quantity:</label></b>
			<input type="quantity" name="quantity" class="form-control" value="<?php echo $quantity;?>"placeholder="quantity" required>
		</div>
		<div class="form-group">
		<font color="black"><label for="exampleInputEmail1"><b>Unit:</label></b>
		<select name="unit" class="form-control">
			<option value="dozen">dozen</option>
			<option value="liters">liters</option>
			<option value="pcs">pcs.</option>
		</div>
		</select>
		<div class="form-group">
		<font color="black"><label for="exampleInputEmail1"><b>Amount:</label></b>
			<input type="amount" name="amount" class="form-control" value="<?php echo $amount;?>"placeholder="amount" required>
		</div>
		<div class="form-group">
		<?php 
			if($update==true):
		?>
		<button type="submit" class="btn btn-info" name="update">Update</button>
		<a href="collection.php"class="btn btn-info">View Table</a>
		<?php else: ?>
			<button type="submit" class="btn btn-primary" name="save">Save</button>
			<a href="collection.php"class="btn btn-primary">View Table</a>
		<?php endif;?>
		</div>
	</form>
	</div>

<br>

</body>
</html>
