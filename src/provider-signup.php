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

    <div class="bg-light full-h">
        <div class="sign-form card text-center">
            <div class="card-body">
                <img src="assets/img/logo-primary.svg" width="150" alt="AntHELP Logo">
                <div class="position-relative py-3">
                    <h4>Vendor Signup</h4>
                </div>
                <form action="">
                    <div class="form-group">
                        <input type="text" id="name" class="form-control" placeholder="Full name">
                    </div>
                    <div class="form-group">
                        <input type="text" id="nric" class="form-control" placeholder="NRIC">
                    </div>
                    <div class="form-group">
                        <input type="text" id="phone" class="form-control" placeholder="Mobile number">
                    </div>
                    <div class="form-group">
                        <input type="text" id="email" class="form-control" placeholder="E-mail address">
                    </div>
                    <div class="form-group">
                        <input type="password" id="password" class="form-control" placeholder="Create a password">
                    </div>
                    <div class="form-group">
                    <select name="service_type" class="form-control">
                        <option value="disable">Select your service group</option>
                        <option value="cleaning">Cleaning, Laundry & Maid Service</option>
                        <option value="repair maintenance">Home Repair & Maintenance</option>
                        <option value="electronic gadget">Electronic & Gadget</option>
                        <option value="movers relocator">Movers / Relocators</option>
                        <option value="pets service">Pets Services</option>
                        <option value="food beverage">Food & Beverage</option>
                        <option value="pest control">Pest Control Services</option>
                        <option value="health fitness">Health & Fitness</option>
                    </select>
                    </div>
                    <div class="form-row">
                        <div class="col-sm-7 form-group">
                        <input type="text" id="service_rate" class="form-control" placeholder="Your service rate (e.g. RM100)">
                        </div>
                        <div class="col-sm-5 col-7 form-group">
                            <select name="rate_type" class="form-control">
                            <option value="disable">Rate type</option>
                            <option value="per square feet">/square feet</option>
                            <option value="per hours">/hours</option>
                             </select>
                        </div>
                    </div>
                    <button type="button" class="btn w-100 btn-danger mb-3" onclick="validateEmail()">Sign up</button>
                </form>
                <hr>
                <p>Already have an AntHelp account? <span><a href="login.php">Login</a></span></p>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>