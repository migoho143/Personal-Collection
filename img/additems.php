<?php include('process7.php');?>
<?php
$conn = mysqli_connect("localhost","root","","registration");
 
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
?>

<!DOCTYPE html>
<html>
<head>
<title>Selecting Rows from MySQL Table using checkbox PHP, MySQLi</title>
	<link rel="stylesheet" type="text/css"	href="style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<style>
* {box-sizing: border-box;}





.topnav a {
  float: left;
  display: block;
  color: black;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  font-family:Broadway;
}

.topnav a:hover {
  background-color: black;
  color: white;
}

.topnav a.active {
  background-color: #2196F3;
  color: white;
}

.topnav .search-container {
  float: right;
}

.topnav input[type=text] {
  padding: 6px;
  margin-top: 8px;
  font-size: 17px;
  border: none;
}


</style>
</head>
<body>
<div class="topnav">
  <a class="home" href="index.php">Home</a>
  <a href="index2.php">Customer Table</a>
  <a href="product.php">Product Table</a>
  <a href="collection.php">Collection Table</a>
  
  
</div>


<header class="main">
    <div class="row justify-content-center">
    <h1 class="col-sm-4"></h1>
     <nav class="col-sm-8 text-right"> 	 
         
	     <?php if (isset($_SESSION['success'])): ?>
		      
		 <?php endif ?>
		 
		 <?php if(isset($_SESSION["username"])): ?>
		     <p>Welcome <strong><?php echo $_SESSION['username']; ?></strong></p>
		     <p><a style="font-family:Stylus BT" href="login.php?logout='1'" class="btn btn-primary" style="color:white;">Logout</a></p>
		 <?php endif ?> 
		</nav>
		</div>
		 </header><br><br>

	
	<div class="form-group">
		
		<b><a style="font-family:Broadway;font-size:18px;right:48%;position:absolute;top:30%;">Customer Name:</b><br>
		<?php
			$sql = "SELECT * FROM customer";
			$result = mysqli_query($mysqli, $sql);

		?>
		
		
		<select name="customer_id">
		<?php
			$resultCheck = mysqli_num_rows($records);
				while ($row = mysqli_fetch_array($result)){
					
		?>
			<option value="<?php echo $row['customer_id'];?>"><?php echo $row['firstname'];?></option>
			<?php
				}
			?>
		</select></a></br>
		
		<?php

		$result = $mysqli->query("SELECT * FROM product,customer where product.product_id=customer.customer_id") or die($mysqli->error);
		
		//pre_r($result);
		
		
		?>
		
	<div>
	
	<div class="row justify-content-center">
	<form method="POST">
	<table class="table">
	<h1><a style="bottom:60%;right:65%;font-family:Broadway;color:black;">Items</h1></a>
		<thead>
			<th></th>
			<th>Collection Code.</th>
			<th>Product ID</th>
			<th>Quantity</th>
			<th>Unit</th>
			<th>Amount</th>
		</thead>
		<tbody>
 
			<?php
			
				$query=mysqli_query($conn,"select * from `items`");
				while($row=mysqli_fetch_array($query)){
					?>
					<tr>
						<td><input type="checkbox" value="<?php echo $row['product_id']; ?>" name="id[]"></td>
						<td><?php echo $row['collection_code']; ?></td>
						<td><?php echo $row['product_id']; ?></td>
						<td><?php echo $row['quantity']; ?></td>
						<td><?php echo $row['unit']; ?></td>
						<td><?php echo $row['amount']; ?></td>
					</tr>
					<?php
				}
			?>
 
		</tbody>
		</div>
	</table>
	
	
	
	

	<br>
	<input  type="submit" class="btn btn-primary" name="submit" value="Submit">
	</form>
	</div>
	

	
	
		
		
		
	<div class="row justify-content-center">
	<form method="POST">
	<table class="table">
		<thead>
			
			<th>Collection Code.</th>
			<th>Product ID</th>
			<th>Quantity</th>
			<th>Unit</th>
			<th>Amount</th>
			<th>Customer Name</th>
			
		</thead>
		<tbody>
		

	
	
		<thead>
		<tbody>
		
	<a style="font-family:Broadway;color:red;"><h1>Records</h1></a>
	<tr>
		<?php
			if (isset($_POST['submit'])){
				
				foreach ($_POST['id'] as $id):
				
				$sq=mysqli_query($conn,"select * from items,customer where product_id='$id'");
				$row=mysqli_fetch_array($sq);
				?>
				<tr>
				<td><?php echo $row['collection_code']; ?></td>
				<td><?php echo $row['product_id']; ?></td>
				<td><?php echo $row['quantity']; ?></td>
				<td><?php echo $row['unit']; ?></td>
				<td><?php echo $row['amount']; ?></td>
				<td><?php echo $row['firstname']; ?></td>
				</tr>
				
				<?php
				
				endforeach;
			}
		?>	
	</div>
	</form>
	<tbody>
	</table>
 

	

</body>
</html>