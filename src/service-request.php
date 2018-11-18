<?php 
session_start();
include("header.php");
?>

<div class="banner banner-short d-flex align-items-end" style="background-image: url('assets/img/banners/handhold.jpg')">
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12 my-5 text-center text-white">
                    <h1>Service Inquire</h1>
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
                <h4>Service Inquiry Form</h4>
            </div>
            <form action="action-submit-request.php" method="post">
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Preferred date (e.g. dd/mm/yyyy)">
                </div>
                <div class="form-group">
                    <input type="text" name="name" class="form-control" placeholder="Preferred time (e.g. 2:00pm)">
                </div>
                <?php
                	if()
                ?>
                <div class="form-group">
                    <input type="text" name="mobile" class="form-control" placeholder="Service duration (per hour)">
                </div>
                <div class="form-group">
                    <textarea name="service_description" class="form-control" placeholder="Notes"></textarea>
                </div>
                <button type="submit" class="btn w-100 btn-danger mb-3">Sign up</button>
            </form>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>