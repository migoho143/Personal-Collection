<?php

session_start();
$mysqli = new mysqli('localhost','root','','registration') or die(mysqli_error($mysqli));

$id='';
$update = false;
$customer_id="";
$status="";
$date_paid="";
$interest="";


if(isset($_POST['save'])){
	$customer_id = $_POST['customer_id'];
	$status = $_POST['status'];
	$date_paid = $_POST['date_paid'];
	$interest = $_POST['interest'];
	$username= $_SESSION["username"];
	$result=$mysqli->query("select id from users where username='$username'") or die($mysqli->error);
	if(@count($result)==1)
	{
		$row=$result->fetch_array();
		$userid=$row['id'];
	}
	
	
	$mysqli->query("INSERT INTO collection (userid,customer_id,status,date_paid,interest) VALUES ('$userid','$customer_id','$status','$date_paid','$interest')") or
			die($mysqli->error);
	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";
	
	
	header("location:collection.php");
}
if(isset($_GET['delete'])){
	$id =$_GET['delete'];
	$mysqli->query("DELETE FROM collection WHERE code_no=$id") or die($mysqli->error());
	
	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";
	
	header("location:collection.php");
	
	
}
if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update =true;
	$result = $mysqli->query("SELECT * FROM collection WHERE code_no=$id") or die($mysqli->error);
	if(@count($result)==1){
		$row=$result->fetch_array();
		$customer_id = $row['customer_id'];
		$status = $row['status'];
		$date_paid = $row['date_paid'];
		$interest = $row['interest'];
		
	}
}
if(isset($_POST['update'])){
	$id = $_POST['code_no'];
	$customer_id = $_POST['customer_id'];
	$status = $_POST['status'];
	$date_paid = $_POST['date_paid'];
	$interest = $_POST['interest'];
	
	$mysqli->query("UPDATE collection SET customer_id='$customer_id',status='$status',date_paid='$date_paid',interest='$interest' WHERE code_no=$id") or die($mysqli->error);
	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "warning";
	
	header('location:collection.php');
}


?>