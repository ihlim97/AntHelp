<?php

	require("config.php");
 	session_start();
	$userId = uniqid();
 	$name = $_POST['name'];
	$mykadNo = $_POST['mykad'];
	$mobile = $_POST['mobile'];
	$email = $_POST['email'];
	$password = $_POST['password'];

	if(isset($_POST['senior'])){
		$address = $_POST['address'];
 		$sql = "INSERT INTO  seniors (user_id,name,mykad,address,contact_num,email,password)
         VALUES ('$userId','$name','$mykadNo','$address','$mobile','$email','$password')";
	}
	if(isset($_POST['provider'])){
		$sql = "INSERT INTO  providers (user_id,name,mykad,contact_num,email,password)
         VALUES ('$userId','$name','$mykadNo','$mobile','$email','$password')";
       	mysqli_query($con, $sql);
        $serviceId = uniqid();
        $serviceType = $_POST['service_type'];
        $serviceRate = $_POST['service_rate'];
        $serviceDesc = $_POST['service_description'];
        $sql = "INSERT INTO  services (service_id,service_type,service_rate,service_description,user_id)
         VALUES ('$serviceId','$serviceType','$serviceRate','$serviceDesc','$userId')";
	}
	mysqli_query($con, $sql);
 	mysqli_close($con);

 	header("location:../src/login.php");

?>