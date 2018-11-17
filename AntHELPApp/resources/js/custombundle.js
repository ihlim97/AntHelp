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

        $("input.daterange").daterangepicker({
            "showDropdowns": true,
            "startDate": "11/11/2018",
            "endDate": "11/17/2018",
            "opens": "center"
        }, function(start, end, label) {
            // Callback when date is selected
            console.log('New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')');
        });
        
    });
}(jQuery));