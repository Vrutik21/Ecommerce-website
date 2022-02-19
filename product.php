<?php
ob_start();
// header
include("header.php");
?>

<?php
//products
include("templates\_product.php");

// top-sale
include("templates\_top_sale.php");
?>

<?php
// footer
include("footer.php");
?>