<?php
require_once 'Login/config.php';

if (isset($_POST['pid'])){
    $pid = $_POST['pid'];
    $uid = $_POST['uid'];
    $name = $_POST['name'];
    $comp = $_POST['comp'];
    $price = $_POST['price'];
    $total_price = $_POST['tprice'];
    $image = $_POST['image'];
    $qty = 1;

    $stmt = $link->prepare("SELECT item_id FROM cart WHERE item_id=?");
    $stmt->bind_param("s",$pid);
    $stmt->execute();
    $res = $stmt->get_result();
    $r = $res->fetch_assoc();
    $code = isset($r['item_id']);

    if (!$code){
        $query = $link->prepare("INSERT INTO cart (user_id,item_id,item_company,item_name,item_price,total_price,item_image,qty) 
VALUES (?,?,?,?,?,?,?,?)");
        $query->bind_param("iisssssi",$uid,$pid,$comp,$name,$price,$total_price,$image,$qty);
        $query->execute();
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Item added to cart</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
    else{
echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  <strong>Item already in the cart</strong>
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>';
    }
}

if (isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_id'){
    $stmt = $link->prepare("SELECT * FROM cart");
    $stmt->execute();
    $stmt->store_result();
    $rows = $stmt->num_rows;

    echo $rows;
}


