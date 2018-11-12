<?php

 	include("config.php");
 	session_start();

 	$sql = "SELECT email, password FROM seniors";
 
 	$result = $con->query($sql);
 	if ($result->num_rows > 0) {
	    while($row = $result->fetch_assoc()) {
	        if($row["email"] == $_POST[email] && $row["password"] == $_POST[password]){
	        	header("location:../src/manage-requests.html");
	        }
	        else{
	        	$message = "wrong answer";
		echo "<script type='text/javascript'>alert('$message');</script>";
	        }
	    }
	} 
	else {
	    $message = "wrong answer";
		echo "<script type='text/javascript'>alert('$message');</script>";
	}
$conn->close();
?>