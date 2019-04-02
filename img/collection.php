<?php include('process3.php');
?>

<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
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
  <a href="#collection.php">Collection Table</a>
  
  
</div>

<a style="position:absolute;bottom:80%;right:45%;" href="additems.php"class="btn btn-info">Add Items</a>

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
	

	
<div id="main">
			
	<?php require_once 'process3.php';?>
	
	<?php
	
	if(isset($_SESSION['message'])):?>
	
	<div class="alert alert-<?=$_SESSION['msg_type']?>">
	
	<?php 
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	?>
	</div>
	<?php endif ?>
	<div class="container">
	<?php
		$mysqli = new mysqli('localhost','root','','registration') or die(mysqli_error($mysqli));
		$username= $_SESSION["username"];
		$result=$mysqli->query("select id from users where username='$username'") or die($mysqli->error);
		if(@count($result)==1)
			{
			$row=$result->fetch_array();
			$userid=$row['id'];
		}
		$result = $mysqli->query("SELECT * FROM collection where userid='$userid'") or die($mysqli->error);
		
		//pre_r($result);
		
		?>
		
		<?php

		$result = $mysqli->query("SELECT * FROM collection,customer where collection.customer_id=customer.customer_id") or die($mysqli->error);
		
		//pre_r($result);
		
		?>
		
		
		<h1><a style="bottom:60%;right:65%;font-family:Broadway;color:red;">Collection Table</h1></a>
		<h2><font style="font-family:Timesnew-Roman" color= "red"> All Records</h2></font>
		<a style="font-family:Stylus BT" href="index5.php"class="btn btn-primary"><b>+</b>Add New Collection</a>
		<div class="row justify-content-center">
		<br><br><br>
			<table class="table">
				<thead>
					<tr>
						<th><a style="font-family:Broadway">Customer Name:</th>
						<th><a style="font-family:Broadway">Collection Code.</th>
						<th><a style="font-family:Broadway">Status</th>
						<th><a style="font-family:Broadway">Date Paid</th>
						<th><a style="font-family:Broadway">Interest</th>
						<th><a style="font-family:Broadway">Due Date</th>
						<th colspan="2"><a style="font-family:Broadway">Action</th>
						
					</tr>
				</thead>
				

				
				<?php
					while($row=$result->fetch_assoc()):?>
						<tr>
							<td><a style="font-family:Elephant;"><?php echo $row['firstname']?></td></a>
							<td><a style="font-family:Elephant;"><?php echo $row['collection_code']?></td></a>
							<td><a style="font-family:Elephant;"><?php echo $row['status']?></td></a>
							<td><a style="font-family:Elephant;"><?php echo $row['date_paid']?></td></a>
							<td><a style="font-family:Elephant;"><?php echo $row['interest']?></td></a>
							<td><a style="font-family:Elephant;"><?php echo $row['due_date']?></td></a>
							<td>
								<a href="index5.php?edit=<?php echo $row['collection_code'];?>"
									class="btn btn-info">Edit</a>
								<a href="process3.php?delete=<?php echo $row['collection_code'];?>"
									class="btn btn-danger">Delete</a>
									
							</td>
						</tr>
						<?php endwhile;?>
			</table>
		</div>

	
	
</div>

	
<div id="main">
			
	<?php require_once 'process4.php';?>
	
	<?php
	
	if(isset($_SESSION['message'])):?>
	
	<div class="alert alert-<?=$_SESSION['msg_type']?>">
	
	<?php 
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	?>
	</div>
	<?php endif ?>
	<div class="container">
	<?php
		$mysqli = new mysqli('localhost','root','','registration') or die(mysqli_error($mysqli));
		$username= $_SESSION["username"];
		$result=$mysqli->query("select id from users where username='$username'") or die($mysqli->error);
		if(@count($result)==1)
			{
			$row=$result->fetch_array();
			$userid=$row['id'];
		}
		$result = $mysqli->query("SELECT * FROM items where userid='$userid'") or die($mysqli->error);
		//pre_r($result);
		
		?>
		
		<?php

		$result = $mysqli->query("SELECT * FROM items,product where items.product_id=product.product_id") or die($mysqli->error);
		
		//pre_r($result);
		
		?>
		
		<h1><a style="bottom:60%;right:56%;font-family:Broadway;color:red;">Collection Items</h1></a>
		<div class="row justify-content-center">
		<br><br><br>
			<table class="table">
				<thead>
					<tr>
						<th><a style="font-family:Broadway">Collection Code.</th>
						<th><a style="font-family:Broadway">Product_ID</th>
						<th><a style="font-family:Broadway">Quantity</th>
						<th><a style="font-family:Broadway">Regular Price</th>
						<th><a style="font-family:Broadway">Unit</th>
						<th><a style="font-family:Broadway">Amount</th>
						<th colspan="2"><a style="font-family:Broadway">Action</th>
						
					</tr>
				</thead>
				

				
				<?php
					while($row=$result->fetch_assoc()):?>
					
						<tr>
							<td><a style="font-family:Elephant;"><?php echo $row['collection_code']?></td></a>
							<td><a style="font-family:Elephant;"><?php echo $row['product_id']?></td></a>
							<td><a style="font-family:Elephant;"><?php echo $row['quantity']?></td></a>
							<td><a style="font-family:Elephant;"><?php echo $row['regular_price']?></td></a>
							<td><a style="font-family:Elephant;"><?php echo $row['unit']?></td></a>
							<td><a style="font-family:Elephant;"><?php echo $row['amount']?></td></a>
							<td>
								<a href="index5.php?edit=<?php echo $row['collection_code'];?>"
									class="btn btn-info">Edit</a>
								<a href="process3.php?delete=<?php echo $row['collection_code'];?>"
									class="btn btn-danger">Delete</a>
									
							</td>
							

						</tr>
						<?php endwhile;?>
			</table>
		</div>
		<?php
		function pre_r($array){
			echo'<pre>';
			print_r($array);
			echo'</pre>';
		}
	
	?>
	
	
</div>

</body>
</html>