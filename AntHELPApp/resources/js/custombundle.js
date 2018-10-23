(function($) {
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
        })
    });
}(jQuery));