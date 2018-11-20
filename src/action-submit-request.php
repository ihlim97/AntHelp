<?php
	include("config.php");
	session_start();
	$service_id = $_GET['id'];
	$request_id = uniqid();
	$status = 'Pending';
	$requiredDateTime = $_POST['date_time'];
	$duration = $_POST['duration'];
	$notes = $_POST['request_notes'];
	$user_id = $_SESSION['userId'];
    $sql = "SELECT * FROM services WHERE service_id = '$service_id'";
    $services = mysqli_query($con, $sql);
    if (mysqli_num_rows($services) > 0) {
       $sql = "INSERT INTO  requests (request_id,status,required_date_time,duration,notes,user_id,service_id) VALUES ('$request_id','$status','$requiredDateTime','$duration','$notes','$user_id','$service_id')";
    }
    else {
    	echo 'Sorry, seem like the database have some problem.';
    }
   	mysqli_query($con, $sql);
 	mysqli_close($con);

 	header("location:../src/search.php");
?>