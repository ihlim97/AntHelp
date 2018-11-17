<?php 
session_start();
include("header.php");
?>
    <div class="banner banner-short d-flex align-items-end" style="background-image: url('assets/img/banners/handhold.jpg')">
        <div class="wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12 my-5 text-center text-white">
                        <h1>Sign Up</h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay"></div>
    </div>
    <div class="bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-10 offset-sm-1 col-lg-6 offset-lg-3 my-5">
                    <div class="sign-form card">
                        <div class="card-body">
                            <div class="text-center">
                                <img src="assets/img/logo-primary.svg" width="150" alt="AntHELP Logo">
                                <div class="position-relative py-3">
                                    <h4>Senior Signup</h4>
                                </div>
                            </div>
                            <form action="action-signup.php" method="post" class="needs-validation" novalidate>
                                <div class="form-group">
                                    <input required type="text" name="name" class="form-control" placeholder="Full name">
                                    <div class="valid-feedback">Looks Good</div>
                                    <div class="invalid-feedback">Your name is required.</div>
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="mykad" class="form-control" placeholder="NRIC">
                                    <div class="valid-feedback">Looks Good</div>
                                    <div class="invalid-feedback">Your NRIC is required.</div>
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="address" class="form-control" placeholder="Address">
                                    <div class="valid-feedback">Looks Good</div>
                                    <div class="invalid-feedback">Please enter a password.</div>
                                </div>
                                <div class="form-group">
                                    <input required type="text" name="mobile" class="form-control" placeholder="Mobile number">
                                    <div class="valid-feedback">Looks Good</div>
                                    <div class="invalid-feedback">Your phone is required.</div>
                                </div>
                                <div class="form-group">
                                    <input required type="email" name="email" class="form-control" placeholder="E-mail address">
                                    <div class="valid-feedback">Looks Good</div>
                                    <div class="invalid-feedback">Please enter an email.</div>
                                </div>
                                <div class="form-group">
                                    <input required type="password" name="password" class="form-control" placeholder="Create a password">
                                    <div class="valid-feedback">Looks Good</div>
                                    <div class="invalid-feedback">Please enter a password.</div>
                                </div>
                                <button type="submit" class="btn w-100 btn-primary mb-3" name="senior">Sign up</button>
                            </form>
                            <hr>
                            <p class="text-center">Already have an AntHelp account?
                                <span><a class="text-info" href="login.php">Login</a></span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include("footer.php"); ?>