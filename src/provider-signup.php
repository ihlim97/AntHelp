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
                <form action="action-signup.php" method="post">
                    <div class="form-group">
                        <input type="text" name="name" class="form-control" placeholder="Full name">
                    </div>
                    <div class="form-group">
                        <input type="text" name="mykad" class="form-control" placeholder="NRIC">
                    </div>
                    <div class="form-group">
                        <input type="text" name="mobile" class="form-control" placeholder="Mobile number">
                    </div>
                    <div class="form-group">
                        <input type="text" name="email" class="form-control" placeholder="E-mail address">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Create a password">
                    </div>
                    <div class="form-group">
                    <select name="service_type" class="form-control">
                        <option value="disable">Select your service group</option>
                        <option value="Cleaning, Laundry & Maid Service">Cleaning, Laundry & Maid Service</option>
                        <option value="Home Repair & Maintenance">Home Repair & Maintenance</option>
                        <option value="Electronic & Gadget">Electronic & Gadget</option>
                        <option value="Movers / Relocator">Movers / Relocators</option>
                        <option value="Pets Service">Pets Services</option>
                        <option value="Food & Beverage">Food & Beverage</option>
                        <option value="Pest Control Services">Pest Control Services</option>
                        <option value="Health & Fitness">Health & Fitness</option>
                    </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="service_rate" class="form-control" placeholder="Your service rate (per hours)">
                    </div>
                    <div class="form-group">
                        <textarea name="service_description" class="form-control" placeholder="Enter service description"></textarea>  
                    </div>
                    <button type="submit" class="btn w-100 btn-danger mb-3" name="provider">Sign up</button>
                </form>
                <hr>
                <p>Already have an AntHelp account? <span><a href="login.php">Login</a></span></p>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>