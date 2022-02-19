<?php
ob_start();
// header
include("header.php");
?>

<?php
//display cart items if not empty else show empty cart
count($product->getData("cart")) ? include("templates\_cart_template.php"):include ("templates/_cart_empty.php");

//display wishlist items if not empty else show empty cart
count($product->getData("wishlist")) ? include("templates\_wishlist_template.php"):include ("templates/_wishlist_empty.php");

// top-sale
include("templates\_latest_products.php");
?>

<?php
// footer
include("footer.php");
?>