<?php
 	include("config.php");
 	session_start();
 	$sql = "SELECT * FROM seniors";
 	$seniors = mysqli_query($con, $sql);
 	$count = 0;
 	if (mysqli_num_rows($seniors) > 0) {
	    while($row = mysqli_fetch_assoc($seniors)) {
	        if($row['email'] == $_POST['email'] && $row['password'] == $_POST['password']){
	        	$_SESSION['username'] = $row['name'];
	        	$_SESSION['userId'] = $row['user_id'];
	        	$_SESSION['userType'] = 'senior';
	        	header("location:../src/index.php");
	        }
	        else{
	        	++$count;
	        	if($count == mysqli_num_rows($seniors)){
					$sql = "SELECT * FROM providers";
				 	$providers = mysqli_query($con, $sql);
				 	$count = 0;
				 	if (mysqli_num_rows($providers) > 0) {
				 		while($row = mysqli_fetch_assoc($providers)) {
					        if($row['email'] == $_POST['email'] && $row['password'] == $_POST['password']){
					        	$_SESSION['username'] = $row['name'];
					        	$_SESSION['userId'] = $row['user_id'];
	        					$_SESSION['userType'] = 'provider';
					        	header("location:../src/index.php");
					        }
					        else{
					        	++$count;
					        	if($count == mysqli_num_rows($providers)){
									$_SESSION['errormsg'] = TRUE;
									header("location:../src/login.php");
								}
					        }
				 		}
					}
					else{
						$_SESSION['errormsg'] = TRUE;
						header("location:../src/login.php");
					}
				}
			}
		}
	} 
	else {
	   	$sql = "SELECT * FROM providers";
	 	$providers = mysqli_query($con, $sql);
	 	$count = 0;
	 	if (mysqli_num_rows($providers) > 0) {
	 		while($row = mysqli_fetch_assoc($providers)) {
		        if($row['email'] == $_POST['email'] && $row['password'] == $_POST['password']){
		        	$_SESSION['username'] = $row['name'];
		        	$_SESSION['userId'] = $row['user_id'];
		        	header("location:../src/index.php");
		        }
		        else{
		        	++$count;
		        	if($count == mysqli_num_rows($providers)){
						$_SESSION['errormsg'] = TRUE;
						header("location:../src/login.php");
					}
		        }
	 		}
		}
		else{
			$_SESSION['errormsg'] = TRUE;
			header("location:../src/login.php");
		}
	}
	
mysqli_close($con);

?>