(function ($) {
    $(document).ready(function () {

        $(".slider").each(function (e, i) {
            $(this).slick({
                dots: true
            });
        });

        $(".navbar-toggler").on("click", function () {
            $(".navbar").toggleClass("opened");
        });

        $('.nav-tabs a').on('click', function (e) {
            e.preventDefault()
            $(this).tab('show')
        });

        // Location autocomplete for Service Curator
        $.get("/misc/service-areas.json", function(data) {
            $("input[name=location]").typeahead({
                source: data
            });
        });

        $(".service-curator form").on("submit", function (event) {
            return validateFormFields(this);
        });

        $('input.decimal[name=rate]').change(function () {
            var num = parseFloat($(this).val());
            var cleanNum = num.toFixed(2);
            $(this).val(cleanNum);
        });

        $("input.daterangepickersingle").daterangepicker({
            "minDate": moment(),
            "startDate": moment(),
            "singleDatePicker": true,
            "timePicker": true,
            "opens": "center",
            "autoApply": true,
            locale: {
                format: 'DD/MM/YYYY HH:mm'
            }
        });
        $("input.daterangepickersingle").val("");
    });

}(jQuery));

window.getParameterByName = function(name, url) {
    if (!url) url = window.location.href;
    name = name.replace(/[\[\]]/g, '\\$&');
    var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
        results = regex.exec(url);
    if (!results) return null;
    if (!results[2]) return '';
    return decodeURIComponent(results[2].replace(/\+/g, ' '));
};

window.updateParameterByName = function(uri, key, value) {
    var re = new RegExp("([?&])" + key + "=.*?(&|$)", "i");
    var separator = uri.indexOf('?') !== -1 ? "&" : "?";
    if (uri.match(re)) {
        return uri.replace(re, '$1' + key + "=" + value + '$2');
    }
    else {
        return uri + separator + key + "=" + value;
    }
}

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

window.getBillableHours = function (start, end) {

    console.log(start.hour());
    console.log(end.hour());

    var minsWorked = 0;

    // Working hours boundary
    workingHoursStart = 9;
    workingHoursEnd = 19;

    // For looping
    var current = start;

    while(current.isSameOrBefore(end)) {
        if(current.hour() >= workingHoursStart && current.hour() <= workingHoursEnd) {
            minsWorked++;
        }
        current.add(1, "m");
    }

    return minsWorked / 60;
};


window.events = {
    events: {},
    on: function (eventName, fn) {
        this.events[eventName] = this.events[eventName] || [];
        this.events[eventName].push(fn);
    },
    off: function (eventName, fn) {
        if (this.events[eventName]) {
            for (var i = 0; i < this.events[eventName].length; i++) {
                if (this.events[eventName][i] === fn) {
                    this.events[eventName].splice(i, 1);
                    break;
                }
            };
        }
    },
    emit: function (eventName, data) {
        if (this.events[eventName]) {
            this.events[eventName].forEach(function (fn) {
                fn(data);
            });
        }
    }
};
