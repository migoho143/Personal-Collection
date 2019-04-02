<?php include('server.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
<img src="pcs.jpg" alt="Trulli" width="400" height="45">
<a style="position:absolute;left:30%;"><img src="4.jpg" alt="Trulli" width="60" height="50">
		
        <section class="main">
        <div class="row justify-content-center">
		 <div class="col-sm-4">
		 <a style="position:absolute;left:29%;bottom:58%;"><img src="admin.png" width="200" height="200"/></a>
		<form method="post" action="login.php">
		<div class="userimage">
			
			</div>
			<?php include('errors.php'); ?>

			<div class="input-group">
			<label><a style="font-family:Broadway;">Username</label></a>
			<input type="text" name="username">
			</div>
			<div class="input-group">
			<label><a style="font-family:Broadway;">Password</label></a>
			<input type="password" name="password">
			</div>
			<div class="input-group">
				<button type="submit" style="font-family:Broadway" name="login" class="btn">Login</button>
			</div>
		</form>
		</div>



</body>
</html>