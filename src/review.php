<?php 
session_start();
include("header.php");
?>
		<div class="banner banner-short d-flex align-items-end" style="background-image: url('assets/img/banners/handhold.jpg')">
			<div class="overlay"></div>
		</div>


	<!-- body content -->
	<?php 
	include("config.php");
	if(isset($_GET['id'])){ // Is a senior user where have been requested for the service
	echo '<div class="container" id="review">
	    <div class="mt-5 clearfix">
	    	<h2>Sevice Reviews for</h2>
	    	<h5>Service Provider: '.getProviderName($_GET['sid']).'</h5>
	        <button type="button" class="clearfix btn btn-primary btn-lg float-right mb-5" data-toggle="modal" data-target="#submit-review-modal">
	            Write a review
	        </button>
	    </div>';
			
    		$userId = $_SESSION['userId'];
    		$requestId = $_GET['id'];
    		$serviceId = $_GET['sid'];
    		$sql = "SELECT * FROM reviews WHERE service_id = '$serviceId' ORDER BY submitted_date_time DESC"; // get for the reviews based on the service_id
    		$result = mysqli_query($con, $sql);
				if (mysqli_num_rows($result) > 0) {
				    while($row = mysqli_fetch_assoc($result)) {
				    	$userId = $row['user_id'];
				    	echo '<div class="review-tile">
								<div class="rating mt-3">';
						     	for($i=0;$i<$row['rating'];$i++){
						     				echo '<span class="text-warning fas fa-star"></span>';
						     			}
						     	if($row['rating']<5){
						     		$numGrey = 5- $row['rating'];
						     		for($i=0;$i<$numGrey;$i++){
						     			echo '<span class="text-muted fas fa-star"></span>';
						     		}
						     	}
						     			echo '</div>';
						     	echo '
						        <p>by '.getReviewerName($userId).', '.$row['submitted_date_time'].'</p>
						        <p class="mb-5">“'.$row['comments'].'”</p>
						    </div>';
				        }
				    }
				    else{
				    	echo '
						<div class="review-tile mt-5">
				    		<p class="mt-3">There is not review for this service yet.</p>
				    	</div>';
				    }
			echo '<!-- Modal -->
			<div class="modal fade" id="submit-review-modal" tabindex="-1" aria-hidden="true" role="dialog">
			    <div class="modal-dialog modal-dialog-centered">
			        <!-- Modal content-->
			        <div class="modal-content">
			            <span class="rounded-circle position-absolute shadow-sm" data-dismiss="modal"></span>
			            <div class="modal-header">
			                <h5 class="modal-title">Rate and review</h5>
			            </div>
			            <div class="modal-body">
			                <b id="user-name">'.$_SESSION['username'].'</b>
			                <p>Your review will be posted publicly on the web.</p>
			                <form class="clearfix" action="action-submit-review.php?id='.$requestId.'&sid='.$serviceId.'" method="post">
			                    <fieldset class="rating">
			                        <input type="radio" id="star5" name="rating" value="5" /><label class="full" for="star5"></label>
			                        <input type="radio" id="star4" name="rating" value="4" /><label class="full" for="star4"></label>
			                        <input type="radio" id="star3" name="rating" value="3" /><label class="full" for="star3"></label>
			                        <input type="radio" id="star2" name="rating" value="2" /><label class="full" for="star2"></label>
			                        <input type="radio" id="star1" name="rating" value="1" /><label class="full" for="star1"></label>
			                    </fieldset>
			                    <div class="form-group">
			                        <textarea class="form-control" name="comments" id="review-desc" rows="3" placeholder="Description your experience"></textarea>
			                    </div>
			                    <button type="submit" class="btn w-100 btn-primary mb-3">Submit</button>
			                </form>
			            </div>
			        </div>
			    </div>
			</div>';
	}
	else { // a user where view all the reviews for the service base on serviceID
		$serviceId = $_GET['sid'];
		echo '<div class="container" id="review">
	    <div class="mt-5 clearfix mb-5">
	    	<h2>Reviews Service for</h2>
	    	<h5>Service Provider: '.getProviderName($serviceId).'</h5>
	    </div>';
			
    		$sql = "SELECT * FROM reviews WHERE service_id = '$serviceId' ORDER BY submitted_date_time DESC"; // get for the reviews based on the service_id
    		$result = mysqli_query($con, $sql);
				if (mysqli_num_rows($result) > 0) {
				    while($row = mysqli_fetch_assoc($result)) {
				    	$userId = $row['user_id'];
				    	echo '<div class="review-tile">
								<div class="rating mt-3">';
						     	for($i=0;$i<$row['rating'];$i++){
						     				echo '<span class="text-warning fas fa-star"></span>';
						     			}
						     	if($row['rating']<5){
						     		$numGrey = 5- $row['rating'];
						     		for($i=0;$i<$numGrey;$i++){
						     			echo '<span class="text-muted fas fa-star"></span>';
						     		}
						     	}
						     			echo '</div>';
						     	echo '
						        <p>by '.getReviewerName($userId).', '.$row['submitted_date_time'].'</p>
						        <p class="mb-5">“'.$row['comments'].'”</p>
						    </div>';
				        }
				    }
				    else{
				    	echo '
						<div class="review-tile mt-5">
				    		<p class="mt-3">There is no review for this service yet.</p>
				    	</div>';
				    }
	}

function getProviderName($serviceId){
	$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   	if (!$con) {
  		die("Connection error: " . mysqli_connect_errno());
  	}
 	$sql = "SELECT user_id FROM services WHERE service_id = '$serviceId'";
 	$result = mysqli_query($con, $sql);
 	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {
			$userId = $row['user_id'];
			$sql = "SELECT name FROM providers WHERE user_id = '$userId'";
 			$result = mysqli_query($con, $sql);
 			if (mysqli_num_rows($result) > 0) {
	    		while($row = mysqli_fetch_assoc($result)) {
	    			return $row['name'];
	    		}
	    	}
		}
	}
}

function getReviewerName($userId){
	$con = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
   	if (!$con) {
  		die("Connection error: " . mysqli_connect_errno());
  	}
 	$sql = "SELECT name FROM seniors WHERE user_id = '$userId'";
 	$result = mysqli_query($con, $sql);
 	if (mysqli_num_rows($result) > 0) {
	    while($row = mysqli_fetch_assoc($result)) {
	    	return $row['name'];
	    }
	}
}
?>
	</div>
	<?php include("footer.php"); ?>