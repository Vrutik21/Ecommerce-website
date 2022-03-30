<?php
require 'Login/config.php';
require '_admin_order_empty.php';
if ($_SERVER['REQUEST_METHOD']='POST') {
    if (isset($_POST['cancel'])) {
        $id = $_POST['orderID'];
        $query = "DELETE FROM orders WHERE orderid='$id'";
        $stmt = mysqli_query($link,$query);

        if ($stmt){
            echo '<script>alert("Order Cancelled Successfully!")</script>';
            echo '<script>window.location= "http://localhost/shopcart1/admin_order.php"</script>';
        }
        else{
            echo '<script>alert("Something went wrong")</script>';
        }
    }
}
