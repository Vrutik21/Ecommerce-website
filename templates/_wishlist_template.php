<?php
if ($_SERVER['REQUEST_METHOD']='POST'){
    if (isset($_POST['delete-cart-item'])){
        $deleteitem = $cart->deleteCart($_POST['item_id'],$table='wishlist');
    }
    if (isset($_POST['add-item'])){
        $cart->saveForLater($_POST['item_id'],'cart','wishlist');
    }
}
?>
    <!-- shopping cart -->
    <section id="cart" class="py-3">
        <div class="container-fluid w-75">
            <h4 class="text-center">Wishlist</h4>
            <div class="row">
                <div class="col-sm-9">
                    <?php
                    foreach ($product->getData(table:'wishlist') as $item){
                        $cart_1 = $product->getProduct($item['item_id']);
                        $subTotal[]=array_map(function ($item){
                        ?>
                    <!-- cart-items -->
                    <div class="row border-top py-3 mt-3">
                        <div class="col-sm-3">
                            <img src='<?php echo $item['item_image']??'./images/1050ti.png'?>' class="img-fluid" />
                        </div>
                        <div class="col-sm-8">
                            <h6 class="fs-20"><?php echo $item['item_name']??'Unknown'?></h6>
                            <p class="fs-16 fw-bold m-0">By <?php echo $item['item_company']??'Unknown'?></p>
                            <!-- rating -->
                            <div class="d-flex">
                                <div class="rating text-warning fs-12 text-center">
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="fas fa-star"></i></span>
                                    <span><i class="far fa-star"></i></span>
                                </div>
                                <a href="#" class="px-2 fs-14">15,345 ratings</a>
                            </div>
                            <!-- !rating -->

                            <!-- quantity -->
                            <div class="qty d-flex pt-2">
                                <form method="post">
                                    <input type="hidden" value="<?php echo $item['item_id']??0;?>" name="item_id">
                                    <button type="submit" class="btn text-danger border-right" name="delete-cart-item">Delete</button>
                                </form>

                                <form method="post">
                                    <input type="hidden" value="<?php echo $item['item_id']??0;?>" name="item_id">
                                    <button type="submit" name="add-item" class="btn text-danger">Add to Cart</button>
                                </form>


                            </div>
                            <!-- !quantity -->
                        </div>
                        <div class="col-sm-1 text-right">
                            <div class="fs-20 text-danger">
                                ₹<span class="product_price"><?php echo $item['item_price']??0?></span>
                            </div>
                        </div>
                    </div>
                    <!-- !cart items -->
                    <?php
                            return $item['item_price'];
//                  end of array_map
                        },$cart_1);
//                  end of for each loop
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
    <!-- !shoppping cart -->
