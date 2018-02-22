(function($) {

    // Initialise Datepicker
    $(document).ready(function () {
    
        $('.member-since').datepicker({
        dateFormat : 'yy-mm-dd'
        });

        // Initialise Owl Carousel
        $(".owl-carousel").owlCarousel({
            items: 1,
            autoplay: true,
            autoplaySpeed: 3000
        });

    });


})( jQuery );