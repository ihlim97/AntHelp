<?php
	include("config.php");
	session_start();
	$service_id = $_GET['id'];
    $sql = "SELECT * FROM services WHERE service_id = '$service_id'";
    $services = mysqli_query($con, $sql);
    echo mysqli_num_rows($services);
    if (mysqli_num_rows($services) > 0) {
        while($row = mysqli_fetch_assoc($services)) {
        		
        }
    }
?>