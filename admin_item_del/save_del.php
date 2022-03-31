<?php
include '../Login/config.php';

    $del = $_POST['del_id'];

    $sql = "DELETE FROM product WHERE item_id = '$del'";

    $result = mysqli_query($link, $sql);
?>


