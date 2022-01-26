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

  // top-sale
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

  // Latest products
  $("#latest-product .owl-carousel").owlCarousel({
    loop: true,
    nav: true,
    dots: false,
    autoplay: true,
    autoplayTimeout: 7000,
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

  // Blogs
  $("#blogs .owl-carousel").owlCarousel({
    loop: true,
    nav: true,
    dots: true,
    autoplay: true,
    autoplayTimeout: 10000,
    smartSpeed: 1000,
    navText: [
      "<i class='fa fa-chevron-left'></i>",
      "<i class='fa fa-chevron-right'></i>",
    ],
    resonsive: {
      0: { items: 1 },
      600: { items: 2 },
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

  // quantity
  let $qty_up = $(".qty-up");
  let $qty_down = $(".qty-down");
  // let $input = $(".qty-input");

  // quantity up click event
  $qty_up.click(function (e) {
    let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
    if ($input.val() >= 1 && $input.val() <= 9) {
      $input.val(function (i, oldval) {
        return ++oldval;
      });
    }
  });
  // quantity down click event
  $qty_down.click(function (e) {
    let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
    if ($input.val() > 1 && $input.val() <= 10) {
      $input.val(function (i, oldval) {
        return --oldval;
      });
    }
  });
});
