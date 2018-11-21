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
                <h2 class="pb-3"><strong>Service Inquiry Form</strong></h2>
            </div>
            <form action="action-submit-service-request.php?id=<?php echo $_GET['id']?>" method="post" onsubmit="return validateFormFields(this)" novalidate>
                <div class="form-group">
                    <input type="datetime-local" name="date_time" class="form-control" required placeholder="Preferred date and Time" data-required="This field is required.">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <input type="text" name="duration" class="form-control" required data-required="The duration field is required." data-re="^\d+$" data-re-msg="A hourly rate contain only digits." placeholder="Service duration (hourly)">
                    <div class="invalid-feedback"></div>
                </div>
                <div class="form-group">
                    <textarea name="request_notes" class="form-control" required data-required="The notes field is required." placeholder="Leave a note to the service provider"></textarea>
                    <div class="invalid-feedback"></div>
                </div>
                <button type="submit" class="btn w-100 btn-danger mb-3">Request for the Service</button>
            </form>
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