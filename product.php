<?php include('process2.php');?>
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
  <a href="#product.php">Product Table</a>
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
		 <h1><a style="position:absolute;bottom:60%;right:65%;font-family:Broadway;color:red;">Product Table</h1></a>
	

	
<div id="main">
			
	<?php require_once 'process2.php';?>
	
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
		$result = $mysqli->query("SELECT * FROM product where userid='$userid'") or die($mysqli->error);
		//pre_r($result);
		
		?>
		
		
		<h2><font style="font-family:Timesnew-Roman" color= "red"> All Records</h2></font>
		<a style="font-family:Stylus BT" href="index4.php"class="btn btn-primary"><b>+</b>Add New Product</a>
		<div class="row justify-content-center">
		<br><br><br>
			<table class="table">
				<thead>
					<tr>
						<th><a style="font-family:Broadway">Product ID</th>
						<th><a style="font-family:Broadway">Particular</th>
						<th><a style="font-family:Broadway">Item Quantity</th>
						<th><a style="font-family:Broadway">Unit</th>
						<th><a style="font-family:Broadway">Regular Price</th>
						<th><a style="font-family:Broadway">Discount</th>
						<th colspan="2"><a style="font-family:Broadway">Action</th>
						
					</tr>
				</thead>
				

				
				<?php
					while($row=$result->fetch_assoc()):?>
					
						<tr>
							<td><a style="font-family:Elephant;"><?php echo $row['product_id']?></td></a>
							<td><a style="font-family:Elephant;"><?php echo $row['particular']?></td></a>
							<td><a style="font-family:Elephant;"><?php echo $row['item_quantity']?></td></a>
							<td><a style="font-family:Elephant;"><?php echo $row['unit']?></td></a>
							<td><a style="font-family:Elephant;"><?php echo $row['regular_price']?></td></a>
							<td><a style="font-family:Elephant;"><?php echo $row['discount']?></td></a>
							<td>
								<a href="index4.php?edit=<?php echo $row['product_id'];?>"
									class="btn btn-info">Edit</a>
								<a href="process2.php?delete=<?php echo $row['product_id'];?>"
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