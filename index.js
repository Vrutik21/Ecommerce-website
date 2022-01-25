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

  $("#top-sale .owl-carousel").owlCarousel({
    loop: true,
    nav: true,
    dots: false,
    autoplay: true,
    autoplayTimeout: 6000,
    smartSpeed: 1000,
    navText: [
      "<i class='fa fa-chevron-left'></i>",
      "<i class='fa fa-chevron-right'></i>",
    ],
    resonsive: {
      0: { items: 1 },
      600: { items: 3 },
      1000: { items: 5 },
    },
  });

  // Isotope filter
  var $grid = $(".grid").isotope({
    // options
    itemSelector: ".grid-item",
    layoutMode: "fitRows",
  });

  // filter items on button click
  $(".button-group").on("click", "button", function () {
    var filterValue = $(this).attr("data-filter");
    $grid.isotope({ filter: filterValue });
  });
});
