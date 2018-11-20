<?php
	session_start();
 	include("config.php");
 	$id = $_GET['id'];
 	if($_SESSION['userType'] == 'senior'){ // if user is a provider
	 	$notes = $_POST['request_notes'];
	 	$sql = "UPDATE requests SET notes='$notes' WHERE request_id='$id'";
	 	if (mysqli_query($con, $sql)) {
	    	header("location:../src/manage-requests.php");	
		} 
		else {
	    	echo "Error updating record: " . mysqli_error($con);
		}
	}

	if($_SESSION['userType'] == 'provider'){
		$rate = $_POST['service_rate'];
		$desc = $_POST['service_description'];
	 	$sql = "UPDATE services SET service_rate='$rate',service_description='$desc' WHERE service_id='$id'";
	 	if (mysqli_query($con, $sql)) {
	    	header("location:../src/manage-services.php");	
		} 
		else {
	    	echo "Error updating record: " . mysqli_error($con);
		}
	}
	
	mysqli_close($con);
?>