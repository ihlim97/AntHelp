<?php
 	include("config.php");
 	session_start();
 	date_default_timezone_set('Asia/Kuala_Lumpur');
 	$requestId = $_GET['id'];
    $serviceId = $_GET['sid'];
    $userId = $_SESSION['userId'];
    $reviewId = uniqid();
    $date_time = date("Y-m-d h:i:sa");
	$comments = $_POST['comments'];
 	$rating = $_POST['rating'];
 	$sql = "INSERT INTO  reviews (review_id,service_id,user_id,request_id,submitted_date_time,comments,rating)
         VALUES ('$requestId','$serviceId','$userId','$reviewId','$date_time','$comments','$rating')";
 	mysqli_query($con, $sql);
 	mysqli_close($con);
	
	header("location:../src/review.php?id=".$requestId."&sid=".$serviceId);
?>