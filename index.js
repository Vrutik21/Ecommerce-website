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
  let $deal_price = $("#deal-price");
  // let $input = $(".qty-input");

  // quantity up click event
  $qty_up.click(function () {
    let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
    let $price = $(`.product-price[data-id='${$(this).data("id")}']`);

    //change product price using ajax call
    $.ajax({url:"ajax.php",type:'POST',data:{itemid:$(this).data("id")},success:function (response){
    let obj= JSON.parse(response);
    let item_price = obj[0]['item_price'];

        if ($input.val() >= 1 && $input.val() <= 9) {
          $input.val(function (i, oldval) {
            return ++oldval;
          });

      //add price of product
    $price.text(parseInt(item_price * $input.val()).toFixed(2));

        // set subtotal price
        let subtotal = parseInt($deal_price.text()) + parseInt(item_price);
        $deal_price.text(subtotal.toFixed(2));
        }
      //closing ajax request
      }});
  });

  // quantity down click event
  $qty_down.click(function () {
    let $input = $(`.qty-input[data-id='${$(this).data("id")}']`);
    let $price = $(`.product-price[data-id='${$(this).data("id")}']`);

    //change product price using ajax call
    $.ajax({url:"ajax.php",type:'POST',data:{itemid:$(this).data("id")},success:function (response){
        let obj= JSON.parse(response);
        let item_price = obj[0]['item_price'];

    if ($input.val() > 1 && $input.val() <= 10) {
      $input.val(function (i, oldval) {
        return --oldval;
      });

        //add price of product
        $price.text(parseInt(item_price * $input.val()).toFixed(2));

        // set subtotal price
        let subtotal = parseInt($deal_price.text()) - parseInt(item_price);
        $deal_price.text(subtotal.toFixed(2));
    }
        //closing ajax request
      }});
  });

//  addToCart
  $(".addItem").click(function (e){
    e.preventDefault();
    var form = $(this).closest(".form-submit");
    var pid = form.find(".pid").val();
    var uid = form.find(".uid").val();
    var comp = form.find(".comp").val();
    var name = form.find(".name").val();
    var price = form.find(".price").val();
    var tprice = form.find(".tprice").val();
    var image = form.find(".image").val();

    $.ajax({
      url: "./addToCart.php",
      method:"post",
      data: {pid:pid,uid:uid,comp:comp,name:name,price:price,tprice:tprice,image:image},
      success:function (response){
        $("").html(response);
      }
    });
    location.reload(true);
  });

  $(".qty").on('change',function (){
      var $el = $(this).closest('#Qty');
      var pid = $el.find(".pid").val();
      var price = $el.find(".price").val();
      var qty = $el.find(".qty").val();
      location.reload(true);
      $.ajax({
          url: 'templates/_cart_template.php',
          method: 'post',
          cache: false,
          data: {qty:qty,pid:pid,price:price},
          success:function (response){
              console.log(response);

          }
      });
  });

  // Sending Form data to the server
  $("#placeOrder").submit(function(e) {
    e.preventDefault();
    $.ajax({
      url: 'order.php',
      method: 'post',
      data: $('form').serialize() + "&action=order",
      success: function(response) {
        $("#order").html(response);
      }
    });
  });
});




