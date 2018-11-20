<?php
 	include("config.php");
 	session_start();
 	$id = $_GET['id'];
 	if($_SESSION['userType'] == 'provider'){
	 	$sql = "UPDATE requests SET status='Accepted' WHERE request_id='$id'";
	 	if (mysqli_query($con, $sql)) {
	    	header("location:../src/provider-manage-requests.php");
		} 
		else {
	    	echo "Error updating record: " . mysqli_error($con);
		}
 	}

	if($_SESSION['userType'] == 'senior'){
		$sql = "UPDATE requests SET status='Completed	' WHERE request_id='$id'";
	 	if (mysqli_query($con, $sql)) {
	    	header("location:../src/manage-requests.php");
		} 
		else {
	    	echo "Error updating record: " . mysqli_error($con);
		}
	}
	mysqli_close($con);
?>