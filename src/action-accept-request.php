<?php
 	include("config.php");
 	session_start();
 	$id = $_GET['id'];
 	echo $id;
 	$sql = "UPDATE requests SET status='Accept' WHERE request_id='$id'";
 	if (mysqli_query($con, $sql)) {
    	header("location:../src/provider-manage-requests.php");
	} 
	else {
    	echo "Error updating record: " . mysqli_error($con);
	}

	mysqli_close($con);
?>