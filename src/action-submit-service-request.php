<?php
	include("config.php");
	session_start();
	
	if($_SESSION['userType'] == 'senior'){ // if user is a provider
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
	       header("location:../src/search.php");
	    }
	    else {
	    	echo 'Sorry, seem like the database have some problem.';
	    }
	}

	if($_SESSION['userType'] == 'provider'){
		$serviceId = uniqid();
        $serviceType = $_POST['service_type'];
        $serviceRate = $_POST['service_rate'];
        $serviceDesc = $_POST['service_description'];
        $userId = $_SESSION['userId'];
        $sql = "INSERT INTO  services (service_id,service_type,service_rate,service_description,user_id)
         VALUES ('$serviceId','$serviceType','$serviceRate','$serviceDesc','$userId')";
        header("location:../src/manage-services.php");
	}
	else {
	    echo 'Sorry, seem like the database have some problem.';
	}
	
   	mysqli_query($con, $sql);
 	mysqli_close($con);

 	
?>