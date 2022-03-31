<?php
include '../Login/config.php';

    $del = $_POST['del_id'];

    $sql = "DELETE FROM orders WHERE orderid = '$del'";

    $result = mysqli_query($link, $sql);
?>


