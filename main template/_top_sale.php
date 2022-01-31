<!-- top-sale -->
<?php $product_shuffle= $product->getData($table='top_sale');
shuffle($product_shuffle);

//request method post
if ($_SERVER['REQUEST_METHOD']=='POST'){
//    call method addToCart
    $cart->addToCart($_POST['user_id'],$_POST['item_id']);
}
?>

<section id="top-sale">
    <div class="container py-4">
        <h4 class="text-center">Top Sale</h4>
        <hr mb-2 />
        <!-- owl-carousel -->
        <div class="owl-carousel owl-theme">
            <?php foreach ($product_shuffle as $item){?>
                <div class="item p-2">
                    <div class="product">
                        <a href="<?php printf('%s?item_id=%s','product.php',$item['item_id']);?>"
                        ><img
                                    src="<?php echo $item['item_image'];?>"
                                    alt=""
                                    class="img-fluid w-auto m-auto"
                                    alt="product1"
                            /></a>
                        <h5 class="text-center"><?php echo $item['item_name'];?></h5>
                        <div class="rating text-warning font-size-12 text-center">
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="fas fa-star"></i></span>
                            <span><i class="far fa-star"></i></span>
                        </div>
                        <div class="price py-2 text-center">
                            <h6>₹<?php echo $item['item_price'];?></h6>
                        </div>

                        <div class="d-flex justify-content-center">
                            <form method="post">
                                    <input type="hidden" name="item_id" value="<?php echo $item['item_id']??'1'; ?>">
                                    <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                                    <button type="submit" name="top_sale_submit" class="btn btn-outline-primary">Add to cart</button>
                            </form>
                        </div>

                    </div>
                </div>
            <?php }?>
        </div>
    </div>
</section>