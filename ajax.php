<?php

// require mysql connection
require('./Database/DBController.php');

//require product class
require('./Database/Product.php');

// DBController object
$db = new DBController();

//product object
$product = new Product($db);


if (isset($_POST['itemid'])){
$product1=$product->getProduct($_POST['itemid']);
echo json_encode($product1);
}
