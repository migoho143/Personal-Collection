<?php

session_start();
$mysqli = new mysqli('localhost','root','','registration') or die(mysqli_error($mysqli));

$id='';
$update = false;
$customer_id="";
$status="";
$date_paid="";
$interest="";
$due_date="";






if(isset($_POST['save'])){
	$customer_id = $_POST['customer_id'];
	$status = $_POST['status'];
	$date_paid = $_POST['date_paid'];
	$interest = $_POST['interest'];
	$due_date = $_POST['due_date'];
	$username= $_SESSION["username"];
	$result=$mysqli->query("select id from users where username='$username'") or die($mysqli->error);
	if(@count($result)==1)
	{
		$row=$result->fetch_array();
		$userid=$row['id'];
	}
	
	
	$mysqli->query("INSERT INTO collection (userid,customer_id,status,date_paid,interest,due_date) VALUES ('$userid','$customer_id','$status','$date_paid','$interest','$due_date')") or
			die($mysqli->error);
	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";
	
	
	header("location:collection.php");
}
if(isset($_GET['delete'])){
	$id =$_GET['delete'];
	$mysqli->query("DELETE FROM collection WHERE collection_code=$id") or die($mysqli->error());
	
	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";
	
	header("location:collection.php");
	
	
}
if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update =true;
	$result = $mysqli->query("SELECT * FROM collection WHERE collection_code=$id") or die($mysqli->error);
	if(@count($result)==1){
		$row=$result->fetch_array();
		$customer_id = $row['customer_id'];
		$status = $row['status'];
		$date_paid = $row['date_paid'];
		$interest = $row['interest'];
		$due_date = $row['due_date'];

		
	}
}

if(isset($_POST['update'])){
	$id = $_POST['collection_code'];
	$customer_id = $_POST['customer_id'];
	$status = $_POST['status'];
	$date_paid = $_POST['date_paid'];
	$interest = $_POST['interest'];
	$due_date = $_POST['due_date'];
;
	
	$mysqli->query("UPDATE collection SET customer_id='$customer_id',status='$status',date_paid='$date_paid',interest='$interest',due_date='$due_date' WHERE collection_code=$id") or die($mysqli->error);
	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "warning";
	
	header('location:collection.php');
}


?>