<?php
if ($_SERVER['REQUEST_METHOD']='POST'){
    if (isset($_POST['delete-cart-item'])){
        $deleteitem = $cart->deleteCart($_POST['item_id'],$table='cart1');
    }
    if (isset($_POST['add'])){
        $cart->saveForLater($_POST['item_id'],'cart','cart1');
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
                    $stmt = $link->prepare('SELECT * FROM cart1');
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()){
                        $imageURL = 'images/'.$row['item_image']
                    ?>
                    <!-- cart-items -->
                    <div class="row border-top py-3 mt-3">
                        <div class="col-sm-3">
                            <div class="product">
                                <a href="<?php printf('%s?item_id=%s','product.php',$row['item_id']);?>">
                                    <img src='<?php echo $imageURL??'./images/1050ti.png'?>' class="img-fluid" />
                                </a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <h6 class="fs-20"><?php echo $row['item_name']??'Unknown'?></h6>
                            <p class="fs-16 fw-bold m-0">By <?php echo $row['item_company']??'Unknown'?></p>
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
                                    <input type="hidden" value="<?php echo $row['item_id']??0;?>" name="item_id">
                                    <button type="submit" class="btn text-danger border-right" name="delete-cart-item">Delete</button>
                                </form>

                                <form method="post">
                                    <input type="hidden" value="<?php echo $row['item_id']??0;?>" name="item_id">
                                    <button type="submit" name="add" class="btn text-danger">Add to Cart</button>
                                </form>

                            </div>
                            <!-- !quantity -->
                        </div>
                        <div class="col-sm-1 text-right">
                            <div class="fs-20 text-danger">
                                ₹<span class="product_price"><?php echo $row['total_price']??0?></span>
                            </div>
                        </div>
                    </div>
                    <!-- !cart items -->
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>
    </section>
    <!-- !shoppping cart -->
