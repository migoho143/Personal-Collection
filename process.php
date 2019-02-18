<?php

session_start();
$mysqli = new mysqli('localhost','root','','registration') or die(mysqli_error($mysqli));

$id='';
$update = false;
$firstname ="";
$lastname="";
$middlename="";
$extname="";
$phoneno="";
$street="";
$city="";


if(isset($_POST['save'])){
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$middlename = $_POST['middlename'];
	$extname = $_POST['extname'];
	$phoneno = $_POST['phoneno'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	$username= $_SESSION["username"];
	$result=$mysqli->query("select id from users where username='$username'") or die($mysqli->error);
	if(@count($result)==1)
	{
		$row=$result->fetch_array();
		$userid=$row['id'];
	}
	
	
	$mysqli->query("INSERT INTO crud (userid,firstname,lastname,middlename,extname,phoneno,street,city) VALUES ('$userid','$firstname','$lastname','$middlename','$extname','$phoneno','$street','$city')") or
			die($mysqli->error);
	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";
	
	
	header("location:index2.php");
}
if(isset($_GET['delete'])){
	$id =$_GET['delete'];
	$mysqli->query("DELETE FROM crud WHERE id=$id") or die($mysqli->error());
	
	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";
	
	header("location:index2.php");
	
	
}
if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update =true;
	$result = $mysqli->query("SELECT * FROM crud WHERE id=$id") or die($mysqli->error);
	if(@count($result)==1){
		$row=$result->fetch_array();
		$firstname = $row['firstname'];
		$lastname = $row['lastname'];
		$middlename = $row['middlename'];
		$extname = $row['extname'];
		$phoneno = $row['phoneno'];
		$street = $row['street'];
		$city = $row['city'];
		
	}
}
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$middlename = $_POST['middlename'];
	$extname = $_POST['extname'];
	$phoneno = $_POST['phoneno'];
	$street = $_POST['street'];
	$city = $_POST['city'];
	
	$mysqli->query("UPDATE crud SET firstname='$firstname',lastname='$lastname',middlename='$middlename',extname='$extname',phoneno='$phoneno',street='$street',city='$city' WHERE id=$id") or die($mysqli->error);
	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "warning";
	
	header('location:index2.php');
}


?>