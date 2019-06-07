$(document).ready(function(){
    $(".owl-carousel").owlCarousel({
          items:1,
          loop:true,
          dots:true,
          smartSpeed:1000,
          nav:true,
          navText: [
              "<img src=\"img/images/Стрелка_левая.png\">",
              "<img src=\"img/images/Стрелка_правая.png\">",              
          ],
          
      });
  });