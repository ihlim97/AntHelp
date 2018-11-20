<?php
 	include("config.php");
 	session_start();
 	$id = $_GET['id'];
 	$sql = "DELETE FROM requests WHERE request_id='$id'";
	if (mysqli_query($con, $sql)) {
	    //echo "Record deleted successfully";
	    header("location:../src/manage-requests.php");
	} else {
	    echo "Error deleting record: " . mysqli_error($con);
	}
	mysqli_close($con);
?>