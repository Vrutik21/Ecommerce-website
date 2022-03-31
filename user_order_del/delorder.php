<?php
include("../Login/config.php");
    if (isset($_POST['del_id'])) {
        $id = $_POST['del_id'];
        $query = "SELECT * FROM orders WHERE orderid='$id'";
        $result = mysqli_query($link,$query);
        while ($row = mysqli_fetch_array($result)) {
        $id = $row['orderid'];


//        if ($stmt){
//            echo '<script>alert("Order Cancelled Successfully!")</script>';
//            echo '<script>window.location= "http://localhost/shopcart1/admin_order.php"</script>';
//        }
//        else{
//            echo '<script>alert("Something went wrong")</script>';
//        }
    }
}
    ?>
<input type="hidden" name="del_id" id="del_id" class="form-control" value="<?php echo $id?>">
<p>Do you really want to cancel this order #<?php echo $id?></p>


