<?php
 	include("config.php");
 	$id = $_GET['id'];
 	$notes = $_POST['request_notes'];
 	$sql = "UPDATE requests SET notes='$notes' WHERE request_id='$id'";
 	if (mysqli_query($con, $sql)) {
    	header("location:../src/manage-requests.php");	
	} 
	else {
    	echo "Error updating record: " . mysqli_error($con);
	}
	
	mysqli_close($con);
?>