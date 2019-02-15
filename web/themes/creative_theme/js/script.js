(function($) {
    $(".btn-light-div a.btn").ready(function() {
        $(".btn-light-div a.btn").addClass("btn-light");
    });

    $(".btn-primary-div a.btn").ready(function() {
        $(".btn-primary-div a.btn").addClass("btn-primary");
    });
    //
    $("div.width-full div.views-row").ready().addClass('col-lg-3 col-md-6 text-center inline-block services');

    $(".services").ready(function () {
        $(".services").each(function (i, obj) {
            $(this).html('<div class="service-box mt-5 mx-auto services-custom">' + $(this).html() + '</div>');
        });
    });
    $(".services-custom").ready(function() {
        $('.services-custom > div:first-child').each(function(i, obj) {
            $(this).html('<i class="fa fa-4x '+ $(this).text()  +' text-primary mb-3 sr-icons"></i>');
        });
    })
})(jQuery);