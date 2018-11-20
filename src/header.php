<?php
	echo '
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>The Best Services Platform Provide For You</title>
<link rel="stylesheet" href="css/main.css">
<link rel="stylesheet" href="assets/slick/slick-theme.css">
<link rel="stylesheet" href="assets/slick/slick.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
</head>
<body>
	<nav class="navbar navbar-expand-lg text-uppercase navbar-dark position-absolute w-100">
		<a class="navbar-brand" href="index.php"><div class="anthelp-logo"></div></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarNav">
			<ul class="navbar-nav">
				<li class="nav-item">
					<a class="nav-link active" href="index.php"><b>Home <span class="sr-only">(current)</span></b></a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="search.php"><b>Services</b></a>
				</li>
			</ul>';

	if (!isset($_SESSION['username'])){
    	echo '<div class="ml-auto" >
                <a href="signup.php" class="btn btn-outline-light mr-3">SIGNUP</a>
                <a href="login.php" class="btn btn-primary">LOGIN</a>
         	</div>';
    }
	else {
		echo '<div class="dropdown user-info ml-auto">
                <button class="btn btn-link text-white dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">';
        $username = $_SESSION["username"];
        echo explode(" ",trim($username))[0];
    	echo '	</button>
                <div class="dropdown-menu dropdown-menu-right">
                    <a class="dropdown-item" href="#">My Account</a>';
                    if($_SESSION['userType'] == 'provider'){
                    	echo '<a class="dropdown-item" href="provider-manage-requests.php">Manage Requests</a>';
                    }
                    elseif($_SESSION['userType'] == 'senior'){
                    	echo '<a class="dropdown-item" href="manage-requests.php">Manage Requests</a>';
                    }
                    echo '<a class="dropdown-item" href="logout.php">Logout</a>
                </div>
            </div>';
    };
    echo '
		</div>
        </nav>
    ';
?>