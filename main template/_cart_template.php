<!-- main -->
<main id="main-site">
    <!-- shopping cart -->
    <section id="cart" class="py-3">
        <div class="container-fluid w-75">
            <h4 class="text-center">Shopping Cart</h4>
            <div class="row">
                <div class="col-sm-9">
                    <?php
                    foreach ($product->getData(table:'cart') as $item){
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
                                <div class="d-flex w-25 h-25 pt-1">
                                    <button class="qty-up border bg-light" data-id="quant<?php echo $item['item_id']??1?>">
                                        <i class="fas fa-angle-up"></i>
                                    </button>
                                    <input
                                        type="text"
                                        class="qty-input border w-100 bg-light"
                                        data-id="quant<?php echo $item['item_id']??1?>"
                                        disabled
                                        value="1"
                                        placeholder="1"
                                    />
                                    <button class="qty-down border bg-light" data-id="quant<?php echo $item['item_id']??1?>">
                                        <i class="fas fa-angle-down"></i>
                                    </button>
                                </div>
                                <button class="btn text-danger border-right">Delete</button>
                                <button class="btn text-danger">Save for later</button>
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
                <div class="col-sm-3 pt-2 pl-5">
                    <div class="sub-total text-center border mt-2">
                        <h6 class="fs-14 text-success py-3">
                            <i class="fas fa-check"></i>
                            Your order is eligible for EXPRESS delivery!
                        </h6>
                        <div class="border-top py-4">
                            <h5>
                                Subtotal(<?php echo count($product->getData(table: 'cart'))?> items):&nbsp;<span class="text-danger">₹</span
                                ><span class="text-danger" id="deal-price"><?php echo isset($subTotal) ? $cart->getSum($subTotal):0; ?></span>
                            </h5>
                            <button type="button" class="btn btn-warning mt-3 fs-14">
                                Proceed To Buy
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- !shoppping cart -->
