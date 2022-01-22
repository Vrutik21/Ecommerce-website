$(document).ready(function () {
  // banner owl carousel
  $("#banner-area .owl-carousel").owlCarousel({
    dots: true,
    items: 1,
    autoplay: true,
    autoplayTimeout: 5000,
    loop: true,
    nav: true,
    smartSpeed: 1000,
    navText: [
      "<i class='fa fa-chevron-left'></i>",
      "<i class='fa fa-chevron-right'></i>",
    ],
  });
});
