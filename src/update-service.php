<?php 
session_start();
include("header.php");
?>

	<div class="banner banner-short d-flex align-items-end" style="background-image: url('assets/img/banners/handhold.jpg')">
	    <div class="wrapper">
	        <div class="container">
	            <div class="row">
	                <div class="col-12 my-5 text-center text-white">
	                    <h1>Update Service</h1>
	                </div>
	            </div>
	        </div>
	    </div>
	    <div class="overlay"></div>
	</div>

<div class="bg-light full-h">
    <div class="sign-form card text-center">
        <div class="card-body">
            <img src="assets/img/logo-primary.svg" width="150" alt="AntHELP Logo">
            <div class="position-relative py-3">
                <h4>Update Service</h4>
            </div>
            <form action="action-update-service-request.php?id=<?php echo $_GET['id']?>" method="post">
                <div class="form-group">
                    <input type="text" name="service_rate" class="form-control" placeholder="Update your service rate (per hours)">
                </div>
                <div class="form-group">
                    <textarea name="service_description" class="form-control" placeholder="Update service description"></textarea>  
                </div>
                <button type="submit" class="btn w-100 btn-danger mb-3">Update Service</a>
            </form>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>