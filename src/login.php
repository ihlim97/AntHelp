<?php 
session_start();
include("header.php");
?>

<div class="banner banner-short d-flex align-items-end" style="background-image: url('assets/img/banners/handhold.jpg')">
    
    <div class="overlay"></div>
</div>
</div>

<div class="bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-10 offset-sm-1 col-lg-6 offset-lg-3 my-5">
                <div class="sign-form card">
                    <div class="card-header text-center py-3">
                    <img src="assets/img/logo-primary.svg" width="150" alt="AntHELP Logo">
                    </div>
                    <div class="card-body">
                        <div class="text-center">
                            <h2 class="pb-3"><strong>Login</strong></h2>
                        </div>
                        <form action="action-login.php" method="post" class="needs-validation" novalidate>
                            <div class="form-group">
                                <input required type="email" name="email" class="form-control" placeholder="E-mail address">
                                <div class="valid-feedback">Looks Good</div>
                                <div class="invalid-feedback">Please enter an email.</div>
                            </div>
                            <div class="form-group">
                                <input required type="password" name="password" class="form-control" placeholder="Password">
                                <div class="valid-feedback">Looks Good</div>
                                <div class="invalid-feedback">Please enter a password.</div>
                            </div>
                            <?php
                                if(isset($_SESSION['errormsg'])){
                                    echo '<p>User not found!</p>';
                                    unset($_SESSION['errormsg']);
                                }
                            ?>
                            <button type="submit" class="btn w-100 btn-primary mb-3" name="login">Login</button>
                        </form>

                        <p class="text-right"><a href="#">Forgot Password?</a></p>
                        <hr>
                        <p class="text-center m-0">Don’t have an account? Sign up as </p>
                        <p class="text-center"><b><span><a class="text-info" href="signup.php">Senior</a></span> | <span><a class="text-info" href="provider-signup.php">Service Provider</a></span></b></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include("footer.php"); ?>