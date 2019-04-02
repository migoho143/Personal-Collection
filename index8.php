<?php include('process7.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css"	href="style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>



		
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

		

</body>
</html>



