<?php

//define constant variable

define('DB_NAME','shopcart');
define('DB_USER','root');
define('DB_PASSWORD','');
define('DB_HOST','localhost');

try {
//    connection variable
    $con = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//    encoded language
    mysqli_set_charset($con,'utf8');
}
catch (Exception $ex){
    print "An exception occurred.Message: ".$ex->getMessage();
}
catch (Error $e){
    print "The system is busy right now,please try again later";
}