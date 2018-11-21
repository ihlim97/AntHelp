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
                    <h2 class="pb-3"><strong>Create a service</strong></h2>
                </div>
                <form action="action-submit-service-request.php" method="post" onsubmit="return validateFormFields(this)" novalidate>
                    <div class="form-group">
                        <select name="service_type" class="form-control" required data-required="Please select a service group">
                            <option value="" disabled="" hidden="" selected="">Select your service group</option>
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
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <input type="text" name="service_rate" class="form-control" required data-required="The rate field is required." data-re="^\d+$" data-re-msg="A hourly rate contain only digits." placeholder="Service rate (hourly)">
                        <div class="invalid-feedback"></div>
                    </div>
                    <div class="form-group">
                        <textarea name="service_description" class="form-control" required data-required="The description field is required." placeholder="Description of Service"></textarea>
                        <div class="invalid-feedback"></div>
                    </div>
                    <button type="submit" class="btn w-100 btn-danger mb-3" name="provider">Submit</button>
                </form>
            </div>
        </div>
    </div>

<?php include("footer.php"); ?>