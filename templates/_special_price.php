<?php
$product_shuffle= $product->getData($table='product');
shuffle($product_shuffle);

//creating new Buttons from database
$brand = array_map(function ($pro){
    return $pro['item_type'];},$product_shuffle);
$unique = array_unique($brand);
sort($unique);

//request method post
if ($_SERVER['REQUEST_METHOD']=='POST'){
    if (isset($_POST['special_products'])){
        //    call method addToCart
        $cart->addToCart($_POST['user_id'],$_POST['item_id']);
    }
}

?>
<!-- Special-price-->
<section id="special-price">
    <div class="container">
        <h4 class="text-center pt-3">Special Price</h4>
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
            <?php foreach ($product_shuffle as $item){?>
                <div class="grid-item border <?php echo $item['item_type'];?>">
                    <div class="item ml-2" style="width: 250px; height: 400px">
                        <div class="product">
                            <a href="<?php printf('%s?item_id=%s','product.php',$item['item_id']);?>"
                            ><img
                                        src="<?php echo $item['item_image']??'./images/1050ti.png'; ?>"
                                        alt=""
                                        class="img-fluid w-auto m-auto p-2"
                                        alt="product1"
                                /></a>
                            <h6 class="text-center"><?php echo $item['item_name']??'Unknown'?></h6>
                            <div class="rating text-warning font-size-12 text-center">
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="fas fa-star"></i></span>
                                <span><i class="far fa-star"></i></span>
                            </div>
                            <div class="price py-2 text-center">
                                <h6>₹<?php echo $item['item_price']??'0'?></h6>
                            </div>
                            <div class="d-flex justify-content-center">
                                <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id']??'1'; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                    <?php
                                    if (in_array($item['item_id'],$cart->getCartId($product->getData('cart'))??[])){
                                        echo '<button type="submit" disabled class="btn btn-outline-success">In the cart</button>';
                                    }else{
                                        echo '<button type="submit" name="special_products" class="btn btn-outline-primary">Add to cart</button>';
                                    }
                                    ?>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</section>