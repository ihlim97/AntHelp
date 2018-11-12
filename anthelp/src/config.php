<?php

   	define('DB_SERVER', 'localhost');
   	define('DB_USERNAME', 'root');
   	define('DB_PASSWORD', '');
   	define('DB_DATABASE', 'anthelp');
   	$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   	if ($con->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	} 
   
?>