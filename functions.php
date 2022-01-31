<?php 

// require mysql connection
require ('Database/DBController.php');

//require product class
require ('Database/Product.php');

//require cart class
require ('Database/Cart.php');

// DBController object
$db = new DBController();

//product object
$product = new Product($db);

//cart object
$cart = new Cart($db);

