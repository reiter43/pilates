$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        dots: true,
        smartSpeed: 1500,        
        nav: true,
        autoHeight: true,
        navText: [
            "<span class='slider-prev'></span>",
            "<span class='slider-next'></span>",            
        ],

    });

    $(".burger").on('click', function (e) {
        e.preventDefault;
        $(this).toggleClass("burger--active");
        $(".nav").toggleClass("visible");
    });
});

