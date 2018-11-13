<?php

 	include("config.php");
 	session_start();
 	$seniors = $con->query('SELECT * FROM seniors');
 	$count = 0;
 	if ($seniors->num_rows > 0) {
	    while($row = $seniors->fetch_assoc()) {
	        if($row['email'] == $_POST['email'] && $row['password'] == $_POST['password']){
	        	$_SESSION['username'] = $row['fullname'];
	        	$_SESSION['email'] = $row['password'];
	        	$_SESSION['address'] = $row['address'];
	        	header("location:../src/manage-requests.php");
	        }
	        else{
	        	++$count;
	        }
	    }
	} 
	else {
	   	header("location:../src/login.php");
	    $message = "User not found";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
	if($count == $seniors->num_rows){
		header("location:../src/login.php");
	    $message = "User not found";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
$con->close();
?>