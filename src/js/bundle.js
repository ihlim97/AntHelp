(function($) {
    $(document).ready(function () {

        $(".slider").each(function (e, i) {
            $(this).slick({
                dots: true
            });
        });

        $(".navbar-toggler").on("click", function() {
            $(".navbar").toggleClass("opened");
        });

        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        });

        $('.nav-tabs a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        })
    });



}(jQuery))


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