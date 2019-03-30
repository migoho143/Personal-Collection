<?php include('process5.php');?>
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
	<form action="process5.php" method="POST">

	<input type="hidden" name="id" value="<?php echo $id; ?>">
		<div class="form-group"><b>
		<font color="black"><label for="exampleInputEmail1">Particular:</label>
			<select name="particular" input type="text" name="particular" class="form-control" value="<?php echo $particular;?>"placeholder="particular" required>
			<option value=""></option>
			<option value="lotion">lotion</option>
			<option value="bags">bag</option>
			<option value="t-shirt">t-shirt</option>
			<option value="shorts">shorts</option>
			</select>
		</div>
		<div class="form-group">
		<font color="black"><label for="exampleInputEmail1">Item_quantity:</label>
			<input type="text" name="item_quantity" class="form-control" value="<?php echo $item_quantity;?>"placeholder="item_quantity" required>
		</div>
		<div class="form-group">
		<font color="black"><label for="exampleInputEmail1">Unit:</label>
			<select name="unit" input type="text" name="unit" class="form-control" value="<?php echo $unit;?>"placeholder="unit" required>
			<option value=""></option>
			<option value="liter">liters</option>
			<option value="dozen">dozen</option>
			<option value="kl">kl</option>
			</select>
		</div>
		<div class="form-group">
		<font color="black"><label for="exampleInputEmail1">Regular_price:</label>
			<input type="text" name="regular_price" class="form-control" value="<?php echo $regular_price;?>"placeholder="regular_price" required>
		</div>
		<div class="form-group">
		<font color="black"><label for="exampleInputEmail1">Discount:</label>
			<input type="text" name="discount" class="form-control" value="<?php echo $discount;?>"placeholder="discount" required>
		</div>
		<div class="form-group">
		<?php 
			if($update==true):
		?>
		<button type="submit" class="btn btn-info" name="update">Update</button>
		<a href="additems.php"class="btn btn-info">View Product</a>
		<?php else: ?>
			<button type="submit" class="btn btn-primary" name="save">Save</button>
			<a href="additems.php"class="btn btn-primary">View Product</a>
		<?php endif;?>
		</div>
	</form>
	</div>

<br>

</body>
</html>
