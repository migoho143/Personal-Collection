<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
		
        <section class="main">
        <div class="row justify-content-center">
		 <div class="col-sm-4">
		<form method="post" action="login.php">
			<center><h2>Login</h2></center>
			<?php include('errors.php'); ?>

			<div class="input-group">
			<label>Username</label>
			<input type="text" name="username">
			</div>
			<div class="input-group">
			<label>Password</label>
			<input type="password" name="password">
			</div>
			<div class="input-group">
				<button type="submit" name="login" class="btn">Login</button> 
			</div>
		</form>
		</div>



</body>
</html>