$(document).ready(function () {
    $(".owl-carousel").owlCarousel({
        items: 1,
        loop: true,
        dots: true,
        smartSpeed: 1500,
        nav: true,
        navText: [
            "<img src=\"img/images/Стрелка_левая.png\">",
            "<img src=\"img/images/Стрелка_правая.png\">",
        ],

    });

    $(".burger").on('click', function (e) {
        e.preventDefault;
        $(this).toggleClass("burger--active");
        $(".nav").toggleClass("visible");
    });
});

