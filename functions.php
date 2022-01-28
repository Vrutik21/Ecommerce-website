<?php 

// require mysql connection
require ('Database/DBController.php');

//require product class
require ('Database/Product.php');

// DBController object
$db = new DBController();

//product object
$product = new Product($db);

print_r($product->getData());

?>