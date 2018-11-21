<?php 
session_start();
include("header.php");
?>

	<div class="banner banner-short d-flex align-items-end" style="background-image: url('assets/img/banners/handhold.jpg')">
	    <div class="overlay"></div>
	</div>

<div class="bg-light full-h">
    <div class="sign-form card">
        <div class="card-header text-center py-3">
            <img src="assets/img/logo-primary.svg" width="150" alt="AntHELP Logo">
        </div>
        <div class="card-body">
            <div class="text-center">
                <h2 class="pb-3"><strong>Update Service</strong></h2>
            </div>
            <form action="action-update-service-request.php?id=<?php echo $_GET['id']?>" method="post" onsubmit="return validateFormFields(this)" novalidate>
                <div class="form-group">
                    <input type="text" name="service_rate" class="form-control" required data-required="The rate field is required." data-re="^\d+$" data-re-msg="A hourly rate contain only digits." placeholder="Update your service rate (hourly)">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <textarea name="service_description" class="form-control" required data-required="The description field is required." placeholder="Update service description"></textarea>
                    <div class="invalid-feedback"></div>
                </div>
                <button type="submit" class="btn w-100 btn-danger mb-3">Update Service</a>
            </form>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>