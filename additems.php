<?php include('process5.php');?>
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
		 <h1><a style="position:absolute;bottom:55%;right:80%;font-family:Broadway;color:red;">Items</h1></a>
	
	<div class="form-group">

		<b><a style="font-family:Broadway;font-size:19px;right:48%;position:absolute;top:30%;">Customer Name:</b><br>
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

	
<div id="main">
			
	<?php require_once 'process5.php';?>
	
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
						<th><a style="font-family:Broadway">CheckBox</th>

						
					</tr>
				</thead>
				

				
				<?php
					while($row=$result->fetch_assoc()):?>

						<tr>
							<td><a style="font-family:Elephant;"><?php echo $row['product_id']?></td></a>
							<td><a style="font-family:Elephant;"><?php echo $row['particular']?></td></a>
							<td><a style="font-family:Elephant;"><input type="number" min="0" class="form-control" style="width:80px; height:30px"></td></a>
							<td><a style="font-family:Elephant;"><?php echo $row['unit']?></td></a>
							<td><a style="font-family:Elephant;"><?php echo $row['regular_price']?></td></a>
							<td><a style="font-family:Elephant;"><?php echo $row['discount']?></td></a>
							<td><a style="font-family:Elephant;"> <label><td><input type="checkbox" value="<?php echo $row['product_id']; ?>" name="id[]"></td>
							<td>
							
								
								
							
									
							</td>
						</tr>
						<?php endwhile;?>
			</table>
			<input class="btn btn-primary" type="submit" name="submit" value="Submit">
		</div>
		<div>
		<h2>You Selected:</h2>
		<?php
			if (isset($_POST['submit'])){
				
				foreach ($_POST['id'] as $id):
				
				$sq=mysqli_query($conn,"select * from product,items where product_id='$id'");
				$srow=mysqli_fetch_array($sq);
				echo $srow['product_id']. "<br>";
 
				endforeach;
			}
		?>
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