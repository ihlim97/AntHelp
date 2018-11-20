<?php 
session_start();
include("header.php");
?>

        <div class="banner banner-short d-flex align-items-end" style="background-image: url('assets/img/banners/handhold.jpg')">
            <div class="wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12 my-5 text-center text-white">
                            <h1>Create a service</h1>
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
                    <h4>Create a service</h4>
                </div>
                <form action="action-submit-service-request.php" method="post">
                    <div class="form-group">
                        <select name="service_type" class="form-control">
                            <option value="disable">Select your service group</option>
                            <option value="Cleaning Service">Cleaning Service</option>
                            <option value="Electronic & Gadget">Electronic & Gadget</option>
                            <option value="Food & Beverage">Food & Beverage</option>
                            <option value="Health & Fitness">Health & Fitness</option>
                            <option value="Home Repair & Maintenance">Home Repair & Maintenance</option>
                            <option value="Laundry Service">Laundry Service</option>
                            <option value="Maid Service">Maid Service</option>
                            <option value="Movers / Relocator">Movers / Relocators</option>
                            <option value="Pest Control Services">Pest Control Service</option>
                            <option value="Pets Service">Pets Service</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="text" name="service_rate" class="form-control" placeholder="Your service rate (per hours)">
                    </div>
                    <div class="form-group">
                        <textarea name="service_description" class="form-control" placeholder="Enter service description"></textarea>  
                    </div>
                    <button type="submit" class="btn w-100 btn-danger mb-3" name="provider">Submit</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>