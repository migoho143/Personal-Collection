<?php

session_start();
$mysqli = new mysqli('localhost','root','','registration') or die(mysqli_error($mysqli));

$id='';
$update = false;
$particular ="";
$item_quantity="";
$unit="";
$regular_price="";
$discount="";



if(isset($_POST['save'])){
	$particular = $_POST['particular'];
	$item_quantity = $_POST['item_quantity'];
	$unit = $_POST['unit'];
	$regular_price = $_POST['regular_price'];
	$discount = $_POST['discount'];
	$username= $_SESSION["username"];
	$result=$mysqli->query("select id from users where username='$username'") or die($mysqli->error);
	if(@count($result)==1)
	{
		$row=$result->fetch_array();
		$userid=$row['id'];
	}
	
	
	$mysqli->query("INSERT INTO product (userid,particular,item_quantity,unit,regular_price,discount) VALUES ('$userid','$particular','$item_quantity','$unit','$regular_price','$discount')") or
			die($mysqli->error);
	$_SESSION['message'] = "Record has been saved!";
	$_SESSION['msg_type'] = "success";
	
	
	header("location:product.php");
}
if(isset($_GET['delete'])){
	$id =$_GET['delete'];
	$mysqli->query("DELETE FROM product WHERE product_id=$id") or die($mysqli->error());
	
	$_SESSION['message'] = "Record has been deleted!";
	$_SESSION['msg_type'] = "danger";
	
	header("location:product.php");
	
	
}
if(isset($_GET['edit'])){
	$id = $_GET['edit'];
	$update =true;
	$result = $mysqli->query("SELECT * FROM product WHERE product_id=$id") or die($mysqli->error);
	if(@count($result)==1){
		$row=$result->fetch_array();
		$particular = $row['particular'];
		$item_quantity = $row['item_quantity'];
		$unit = $row['unit'];
		$regular_price = $row['regular_price'];
		$discount = $row['discount'];

		
	}
}
if(isset($_POST['update'])){
	$id = $_POST['id'];
	$particular = $_POST['particular'];
	$item_quantity = $_POST['item_quantity'];
	$unit = $_POST['unit'];
	$regular_price = $_POST['regular_price'];
	$discount = $_POST['discount'];

	
	$mysqli->query("UPDATE product SET particular='$particular',item_quantity='$item_quantity',unit='$unit',regular_price='$regular_price',discount='$discount' WHERE product_id=$id") or die($mysqli->error);
	$_SESSION['message'] = "Record has been updated!";
	$_SESSION['msg_type'] = "warning";
	
	header('location:product.php');
}




?>