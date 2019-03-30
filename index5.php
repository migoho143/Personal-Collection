<?php include('process3.php');?>
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
	<form action="process3.php" method="POST">
	<input type="hidden" name="collection_code" value="<?php echo $id; ?>">
	<a style="bottom:70%;font-size:40px;font-family:Timesnew-Roman;color:red;right:43%;">Add Collection</a>
	<div class="form-group">

		<b><a style="font-size:20px;">Customer Name:</b></a>
		<?php
			$sql = "SELECT * FROM customer";
			$result = mysqli_query($mysqli, $sql);

		?>
		<select name="customer_id" class="form-control">
		<?php
			$resultCheck = mysqli_num_rows($records);
				while ($row = mysqli_fetch_array($result)){
					
		?>
			<option value="<?php echo $row['customer_id'];?>"><?php echo $row['firstname'];?></option>
			<?php
				}
			?>
		</select>
		<div class="form-group">
		<font color="black"><label for="exampleInputEmail1"><b>Status:</label></b>
		<select name="status" class="form-control" value="<?php echo $status;?>"placeholder="status" required>
			<option value="" placeholder="status" required></option>
			<option value="paid">Paid</option>
			<option value="unpaid">Unpaid</option>
		</div>
		</select>
		
		<div class="form-group">
		<font color="black"><label for="exampleInputEmail1"><b>Date Paid:</label></b>
			<input type="date" name="date_paid" class="form-control" value="<?php echo $date_paid;?>"placeholder="date_paid" required>
		</div>
		<div class="form-group">
		<font color="black"><label for="exampleInputEmail1"><b>Interest:</label></b>
			<input type="interest" name="interest" class="form-control" value="<?php echo $interest;?>"placeholder="interest" required>
		</div>
		<div class="form-group">
		<font color="black"><label for="exampleInputEmail1"><b>Due Date:</label></b>
			<input type="date" name="due_date" class="form-control" value="<?php echo $due_date;?>"placeholder="due_date" required>
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
</div>


<div id="main">
<?php include('process4.php');

?>
	
	<form action="process4.php" method="POST">
	<input type="hidden" name="collection_code" value="<?php echo $id; ?>">
	<div class="form-group">
	<a style="bottom:70%;font-size:40px;font-family:Timesnew-Roman;color:red;right:43%;">Add Items</a>
	
		<b><a style="font-size:20px;">Collection Code.</b></a>
		<?php
			$sql = "SELECT * FROM collection";
			$result = mysqli_query($mysqli, $sql);

		?>
		<select name="collection_code" class="form-control">
		<?php
			$resultCheck = mysqli_num_rows($records);
				while ($row = mysqli_fetch_array($result)){
					
		?>
			<option value="<?php echo $row['collection_code'];?>"><?php echo $row['collection_code'];?></option>
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



