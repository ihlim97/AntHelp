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

        // Date picker for the service curator
        $("input.daterange").daterangepicker({
            "ranges" : {
                'Today' : [moment(), moment()],
                'Tomorrow' : [moment().add(1, 'days'), moment()]
            },
            "showDropdowns": true,
            "startDate": moment(),
            "endDate": moment().add(1, 'days'),
            "opens": "center"
        }, function(start, end, label) {
            // Callback when date is selected
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        });

        // Location autocomplete for Service Curator
        $.get("misc/service-areas.json", function(data) {
            $(".service-curator input[name=location]").typeahead({
                source: data            
            });
        });
    });

}(jQuery));