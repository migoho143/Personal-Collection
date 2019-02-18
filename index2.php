<?php include('process.php');?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css"	href="style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
</head>
<body>
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
		 <h1><a style="position:absolute;bottom:60%;right:70%;">Customer Table</h1></a>
	

<div id="main">
			
	<?php require_once 'process.php';?>
	
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
		$result = $mysqli->query("SELECT * FROM crud where userid='$userid'") or die($mysqli->error);
		//pre_r($result);
		
		?>
		
		<h2><font style="font-family:Timesnew-Roman" color= "red"> All Records</h2></font>
		<a style="font-family:Stylus BT" href="index3.php"class="btn btn-primary">Add New Customer</a>
		<div class="row justify-content-center">
		<br><br><br>
			<table class="table">
				<thead>
					<tr>
						<th><a style="font-family:Stylus BT">Firstname</th>
						<th><a style="font-family:Stylus BT">Lastname</th>
						<th><a style="font-family:Stylus BT">Middle Name</th>
						<th><a style="font-family:Stylus BT">Ext Name</th>
						<th><a style="font-family:Stylus BT">Phone No.</th>
						<th><a style="font-family:Stylus BT">Street</th>
						<th><a style="font-family:Stylus BT">City</th>
						<th colspan="2"><a style="font-family:Stylus BT">Action</th>
						
					</tr>
				</thead>
				

				
				<?php
					while($row=$result->fetch_assoc()):?>
					
						<tr>
							<td><?php echo $row['firstname']?></td>
							<td><?php echo $row['lastname']?></td>
							<td><?php echo $row['middlename']?></td>
							<td><?php echo $row['extname']?></td>
							<td><?php echo $row['phoneno']?></td>
							<td><?php echo $row['street']?></td>
							<td><?php echo $row['city']?></td>
							<td>
								<a href="index3.php?edit=<?php echo $row['id'];?>"
									class="btn btn-info">Edit</a>
								<a href="process.php?delete=<?php echo $row['id'];?>"
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