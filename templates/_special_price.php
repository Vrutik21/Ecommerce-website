<?php
require_once 'dbconfig.php';
include 'addToCart.php';
$select_stmt = $db->prepare("SELECT * FROM product ORDER BY RAND()");
$select_stmt->execute();

$product_shuffle= $product->getData($table='product');
shuffle($product_shuffle);

//creating new Buttons from database
$brand = array_map(function ($pro){
    return $pro['item_type'];},$product_shuffle);
$unique = array_unique($brand);
sort($unique);


?>
<!-- Special-price-->
<section id="special-price">
    <div class="container pb-4">
        <h4 class="display-4 text-center m-1 pb-2 color-primary">Categories</h4>
        <hr class="m-2" />
        <div id="filters" class="button-group text-center">
            <button class="btn is-checked fs-18" data-filter="*">
                All Items
            </button>
            <?php array_map(function ($brand){
                printf('<button class="btn fs-18" data-filter=".%s">%s</button>',$brand,$brand);
            },$unique); ?>
        </div>
        <div class="grid">
            <?php while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)){
                $imageURL = 'images/'.$row['item_image']?>
                <div class="grid-item border <?php echo $row['item_type'];?>">
                    <div class="item ml-2" style="width: 250px; height: 400px">
                        <div class="product">
                            <a href="<?php printf('%s?item_id=%s','product.php',$row['item_id']);?>"
                            ><img
                                        src="<?php echo $imageURL;?>"
                                        alt=""
                                        class="img-fluid w-auto m-auto p-2"
                                        alt="product1"
                                /></a>
                            <h6 class="text-center"><?php echo $row['item_name']??'Unknown'?></h6>
                            <div class="rating text-warning font-size-12 text-center">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <div class="price py-2 text-center">
                                <h6>₹<?php echo $row['item_price']??'0'?></h6>
                            </div>
                            <div class="d-flex justify-content-center">
                                <form method="post" class="form-submit">
                                    <input type="hidden" class="pid" value="<?php echo $row['item_id']??'1'; ?>">
                                    <input type="hidden" class="uid" value="<?php echo $_SESSION['id']??'1'; ?>">
                                    <input type="hidden" class="comp" value="<?php echo $row['item_company']??'1'; ?>">
                                    <input type="hidden" class="name" value="<?php echo $row['item_name']??'1'; ?>">
                                    <input type="hidden" class="price" value="<?php echo $row['item_price']??'1'; ?>">
                                    <input type="hidden" class="tprice" value="<?php echo $row['item_price']??'1'; ?>">
                                    <input type="hidden" class="image" value="<?php echo $row['item_image']??'1'; ?>">
                                    <?php
                                    if (in_array($row['item_id'],$cart->getCartId($product->getData('cart'))??[])){
                                        echo '<button disabled class="btn btn-outline-success">In the cart</button>';
                                    }else{
                                        echo '<button type="submit" class="btn btn-outline-primary addItem">Add to cart</button>';
                                    }
                                    ?>
                                    <div id="message"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</section>