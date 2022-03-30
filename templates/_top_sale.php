<?php
require_once 'dbconfig.php';
include 'addToCart.php';
$select_stmt = $db->prepare("SELECT * FROM product ORDER BY RAND()");
$select_stmt->execute();
?>

<section id="top-sale">
    <div class="container py-4">
        <div id="message"></div>
        <h4 class="display-4 text-center m-2 color-primary">Top Sale</h4>
        <hr mb-2 />
        <!-- owl-carousel -->
        <div class="owl-carousel owl-theme">
            <?php while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)){
                    $imageURL = 'images/'.$row['item_image']?>
                <div class="item p-2">
                    <div class="product">
                        <a href="<?php printf('%s?item_id=%s','product.php',$row['item_id']);?>"
                        ><img
                                    src="<?php echo $imageURL;?>"
                                    alt=""
                                    class="img-fluid w-auto m-auto"
                                    alt="product1"
                            /></a>
                        <h5 class="text-center"><?php echo $row['item_name'];?></h5>
                        <div class="rating text-warning font-size-12 text-center">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2 text-center">
                            <h6>₹<?php echo $row['item_price'];?></h6>
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
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            }?>
        </div>
    </div>
</section>
