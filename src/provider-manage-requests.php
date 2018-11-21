<?php 
session_start();
include("header.php");
?>

		<div class="banner banner-short d-flex align-items-end" style="background-image: url('assets/img/banners/handhold.jpg')">
			<div class="overlay"></div>
		</div>


	<div class="container">
		<div class="row">
			<div class="col">
				<nav aria-label="breadcrumb">
					<ol class="breadcrumb bg-white m-0">
						<li class="breadcrumb-item"><a href="index.php">Home</a></li>
						<li class="breadcrumb-item active" aria-current="page">Manage Requests</li>
					</ol>
				</nav>
			</div>
		</div>
	</div>
	<div class="bg-light">
		<div class="container">
			<div class="row pt-5">
				<div class="col-8">
					<h4 class="mb-3">Manage Requests</h4>
				</div>
				<div class="col-4 d-flex align-items-center justify-content-end mb-4">
					<p class="m-0 mr-3">Display:</p>
					<div class="dropdown">
						<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"
						 aria-haspopup="true" aria-expanded="false">
							All
						</button>
						<div class="dropdown-menu">
							<a class="dropdown-item" href="#">Pending</a>
							<a class="dropdown-item" href="#">Completed</a>
							<a class="dropdown-item" href="#">Cancelled</a>
						</div>
					</div>
				</div>
			</div>
			<div class="row pb-4">
				<div class="col-12">

					<?php 
    				include("config.php");
    				$userId = $_SESSION['userId'];
				    $sql = "SELECT * FROM services WHERE user_id = '$userId'"; // get all services submitted by this provider
				    $services = mysqli_query($con, $sql);
				    if (mysqli_num_rows($services) > 0) {
				        while($row = mysqli_fetch_assoc($services)) {
				        	$serviceType = $row['service_type'];
				        	$serviceDesc = $row['service_description'];
				        	$serviceId = $row['service_id'];
				        	$sql2 = "SELECT * FROM requests WHERE service_id = '$serviceId'"; // get all requests related to this service_id
				        	$requests = mysqli_query($con, $sql2);
				        	if (mysqli_num_rows($requests) > 0) {
				        		while($row = mysqli_fetch_assoc($requests)) {
				        			$userId = $row['user_id'];
				        			$userName = getSeniorName($userId);
				        			$duration = $row['duration'];
				        			$cost = calCost($serviceId,$duration);
				        			echo '<div class="card service-card-2 mb-3">
						<div class="row no-gutters">
							<div class="col-12 col-lg-4">
								<div class="card-body pb-0">
									<div class="badge badge-danger">'.strtoupper($row['status']).'</div>
									<h3 class="card-title text-dark">'.$serviceType.'</h3>
									<p class="card-text">'.$serviceDesc.'</p>
								</div>
							</div>
							<div class="col-12 col-lg-8">
								<div class="row">
									<div class="col-12 col-sm-9">
										<div class="row mt-4 mb-2 metadata-wrapper">
											<div class="col-4">
												<div class="metadata">
													<p class="card-subtitle text-muted">Job ID#</p>
													<h5 class="card-title text-dark">'.$row['request_id'].'</h5>
												</div>
											</div>
											<div class="col-4">
												<div class="metadata">
													<p class="card-subtitle text-muted">Requested By</p>
													<h5 class="card-title text-dark">'.$userName.'</h5>
												</div>
											</div>
											<div class="col-4">
												<div class="metadata">
													<p class="card-subtitle text-muted">Job Date</p>
													<h5 class="card-title text-dark">'. explode("T",trim($row['required_date_time']))[0].'</h5>
												</div>
											</div>
											<div class="col-4">
												<div class="metadata">
													<p class="card-subtitle text-muted">Job Time</p>
													<h5 class="card-title text-dark">'.explode("T",trim($row['required_date_time']))[1].'</h5>
												</div>
											</div>
											<div class="col-4">
												<div class="metadata">
													<p class="card-subtitle text-muted">Duration</p>
													<h5 class="card-title text-dark">'.$row['duration'].' Hours</h5>
												</div>
											</div>
											<div class="col-4">
												<div class="metadata">
													<p class="card-subtitle text-muted">Cost</p>
													<h5 class="card-title text-success">RM'.$cost.'</h5>
												</div>
											</div>
										</div>
									</div>
									<div class="col-3">
										<div class="card-body text-right">
											<div class="dropdown">
												<button class="btn btn-secondary dropdown-toggle" type="button" data-toggle="dropdown"
												 aria-haspopup="true" aria-expanded="false">
													<span class="fas fa-cog"></span>
												</button>';
												if($row['status'] == "Pending"){
													echo '<div class="dropdown-menu">
													<a class="dropdown-item" href="action-accept-request.php?id='.$row['request_id'].'">Accept</a>
													<div class="dropdown-divider"></div>
													<a class="dropdown-item" href="action-decline-request.php?id='.$row['request_id'].'">Decline</a>
												</div>';
												}
												else{
													echo '<div class="dropdown-menu">
													<a class="dropdown-item disabled not-clickable" href="action-accept-request.php?id='.$row['request_id'].'">Accept</a>
													<div class="dropdown-divider"></div>
													<a class="dropdown-item disabled not-clickable" href="action-decline-request.php?id='.$row['request_id'].'">Decline</a>
												</div>';
												}
												echo '</div></div></div></div></div></div>
													<ul class="list-group list-group-flush">
														<li class="list-group-item">Remarks: '.$row['notes'].'</li>
													</ul>
													</div>';	
				        		}
				        	}
						}
					}
					else{
						echo '
						<div class="mt-5">
							<p class="mt-3">You have not submit any request.</p>
						</div>';
					}

function getSeniorName($userId){
   	$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   	if (!$con) {
  		die("Connection error: " . mysqli_connect_errno());
  	}
	$sql = "SELECT name FROM seniors WHERE user_id = '$userId'";
	$senior = mysqli_query($con, $sql);
	if (mysqli_num_rows($senior) > 0) {
		while($row = mysqli_fetch_assoc($senior)) {
			return $row['name'];
		}
	}
}

function calCost($serviceId, $duration){
   	$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   	if (!$con) {
  		die("Connection error: " . mysqli_connect_errno());
  	}
	$sql = "SELECT service_rate FROM services WHERE service_id = '$serviceId'";
	$services = mysqli_query($con, $sql);
	if (mysqli_num_rows($services) > 0) {
		while($row = mysqli_fetch_assoc($services)) {
			return $row['service_rate'] * $duration;
		}
	}
}
        			 
?>
					

				</div>
			</div>
		</div>
	</div>

	<!-- Modal -->
	<div class="modal fade" id="success-modal" tabindex="-1" aria-hidden="true" role="dialog">
	    <div class="modal-dialog modal-dialog-centered">
	        <!-- Modal content-->
	        <div class="modal-content text-center">
	            <div class="modal-body">
	            	<img src="assets/img/sent.svg" width="60">
	                <div class="my-4">
	                    <h4>Request Accepted.</h4>
	                    <p class="mb-2">You has accepted a request at<br><b>1:00 pm</b> on <b>Thur 27th Sep</b></p>
	                </div>
	                <button type="button" class="btn w-100 btn-danger mb-3" data-dismiss="modal">OK</button>
	            </div>
	        </div>
	    </div>
	</div>

<?php include("footer.php"); ?>