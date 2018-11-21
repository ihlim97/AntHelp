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
                        <form action="action-login.php" method="post" onsubmit="return validateFormFields(this)" novalidate>
                            <div class="form-group">
                                <input type="text" name="email" class="form-control" placeholder="E-mail" required data-required="Please enter your email." data-re="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}" data-re-msg="The email you entered is not valid">
                                    <div class="invalid-feedback"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" required placeholder="Password" data-required="Please enter your password.">
                                <div class="invalid-feedback"></div>
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
<script>
    window.validateFormFields = function (f) {

        // Checking if the form passed in is a jQuery instance or not
        var form = null;
        if (form instanceof jQuery) {
            form = f;
        } else {
            form = $(f);
        }

        // Assume all fields is true first
        var result = true;

        // Check the fields
        form.find("input, select, textarea").each(function (i, e) {

            // Resetting all the form fields
            $(e).removeClass("is-invalid");
            $(e).siblings(".invalid-feedback").text("");

            // Checking if the required fields have been entered
            if ($(e).attr("required") !== undefined && ($(e).val() == undefined || $(e).val() == "")) {
                $(e).addClass("is-invalid");
                console.log("The required text is: " + $(e).data("required"));
                $(e).parent().find(".invalid-feedback").text($(e).data("required"));
                result = false;
            }

            // Checking the fields against their regex patterns
            if ($(e).data("re") !== undefined && $(e).val() != "") {
                console.log("The regex is: " + $(e).data("re"));

                var regExp = new RegExp($(e).data("re"));
                if (!regExp.test($(e).val())) {
                    $(e).addClass("is-invalid");
                    $(e).parent().find(".invalid-feedback").text($(e).data("re-msg"));
                    console.log($(e).data("re-msg"));
                    result = false;
                }
            }

        });

        return result;
    }
</script>
<?php include("footer.php"); ?>