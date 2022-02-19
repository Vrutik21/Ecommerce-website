<?php
//request method post
if ($_SERVER['REQUEST_METHOD']=='POST'){
    if (isset($_POST['products'])){
        //    call method addToCart
        $cart->addToCart($_POST['user_id'],$_POST['item_id']);
    }
}

//foreach loop to fetch products
$item_id = $_GET['item_id']??1;

foreach ($product->getData() as $item){
    if ($item['item_id']==$item_id){
    ?>
            
<!-- product -->
<section class="py-4">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <img
                    src="<?php echo $item['item_image'];?>"
                    alt=""
                    class="img-fluid"
                    style="width: 28rem"
                    alt="product1"
                />
                <div class="form-row pt-4">
                    <div class="col-5">
                        <button type="submit" class="btn btn-danger form-control">
                            Proceed to buy
                        </button>
                    </div>
                    <div class="col-5">
                        <form method="post">
                            <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
                            <input type="hidden" name="user_id" value="<?php echo 1; ?>">
                        <?php
                        if (in_array($item['item_id'],$cart->getCartId($product->getData('cart'))??[])){
                            echo '<button type="submit" disabled class="btn btn-success form-control">In the cart</button>';
                        }else{
                            echo '<button type="submit" name="products" class="btn btn-warning form-control">Add to cart</button>';
                        }
                        ?>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <h6 class="fs-20"><?php echo $item['item_name']??'Unknown';?></h6>
                <p class="fs-16 fw-bold m-0">By <?php echo $item['item_company']??'Brand';?></p>
                <div class="d-flex">
                    <div class="rating text-warning fs-12 text-center">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <a href="#" class="px-2 fs-14"
                    >15,345 ratings | 800+ answered questions</a
                    >
                </div>
                <hr class="mt-1" />

                <!-- product-price -->
                <table class="my-3">
                    <tr class="fs-14">
                        <td>M.R.P:</td>
                        <td><strike>₹24,949</strike></td>
                    </tr>
                    <tr class="fs-14">
                        <td>Deal Price:</td>
                        <td>
                            <span class="text-danger">₹<?php echo $item['item_price']??'0';?></span>
                            <small class="fs-12 text-black-50"
                            >Inclusive of all taxes</small
                            >
                        </td>
                    </tr>
                    <tr class="fs-12">
                        <td>You Save:</td>
                        <td>
                            <span class="text-danger">₹1950</span>
                        </td>
                    </tr>
                </table>

                <!-- policy -->
                <div id="policy">
                    <div class="d-flex">
                        <div class="return text-center mr-4">
                            <div class="fs-20 my-2 color-second">
                      <span
                          class="fas fa-retweet color-white color-blue-bg border p-3 rounded-pill"
                      ></span>
                            </div>
                            <a href="#" class="fs-12"
                            >15 Days<br />Replacement policy</a
                            >
                        </div>
                        <div class="return text-center mr-4">
                            <div class="fs-20 my-2 color-second">
                      <span
                          class="fas fa-truck color-white color-blue-bg border p-3 rounded-pill"
                      ></span>
                            </div>
                            <a href="#" class="fs-12">Express<br />Delivery</a>
                        </div>
                        <div class="return text-center mr-4">
                            <div class="fs-20 my-2 color-second">
                      <span
                          class="fas fa-check-double color-white color-blue-bg border p-3 rounded-pill"
                      ></span>
                            </div>
                            <a href="#" class="fs-12">1 year<br />Warranty</a>
                        </div>
                    </div>
                    <hr />
                    <div id="order-details" class="d-flex flex-column text-dark">
                        <small>Delivery by 28 Feb, Friday</small>
                        <small
                        >Sold by
                            <a href="http://www.raviinfo.com/" target="_blank"
                            >Ravi Infosys</a
                            >&nbsp;(4.5/5 | 18,546 ratings)</small
                        >
                        <small
                        ><i class="fas fa-map-marker-alt color-blue"></i
                            >&nbsp;&nbsp;Deliver to guest-380005</small
                        >

                        <!-- Quantity -->
                        <div class="col-6 pt-3">
                            <div class="qty d-flex">
                                <h6 class="text-black-50 m-auto">Qty</h6>
                                <div class="px-4 d-flex">
                                    <button class="qty-up border bg-light" data-id="<?php echo $item['item_id']??'0';?>">
                                        <i class="fas fa-angle-up"></i>
                                    </button>
                                    <input
                                        type="text"
                                        class="qty-input border px-1 w-50 bg-light"
                                        data-id="<?php echo $item['item_id']??'0';?>"
                                        disabled
                                        value="1"
                                        placeholder="1"
                                    />
                                    <button
                                        class="qty-down border bg-light"
                                        data-id="<?php echo $item['item_id']??'0';?>">
                                        <i class="fas fa-angle-down"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Highlights -->
                        <div id="highlights">
                            <div class="row py-2">
                                <div class="col-2">
                                    <h6 class="text-black-50 py-2">Highlights</h6>
                                </div>
                                <div class="col-6">
                                    <ul class="py-1">
                                        <li class="text-black-50 py-1 fs-16">
                            <span class="fw-bold text-dark"
                            >1392 MHzClock Speed</span
                            >
                                        </li>
                                        <li class="text-black-50 py-1 fs-16">
                            <span class="fw-bold text-dark"
                            >Chipset: NVIDIA</span
                            >
                                        </li>
                                        <li class="text-black-50 py-1 fs-16">
                            <span class="fw-bold text-dark"
                            >BUS Standard: PCI-E</span
                            >
                                        </li>
                                        <li class="text-black-50 py-1 fs-16">
                            <span class="fw-bold text-dark"
                            >Graphics Engine: GeForce GTX</span
                            >
                                        </li>
                                        <li class="text-black-50 py-1 fs-16">
                            <span class="fw-bold text-dark"
                            >Memory Interface 128 bit
                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <h6 class="fs-20">About this item</h6>
                <hr />
                <ul>
                    <li>
                        <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Architecto perspiciatis consequatur ab quo eveniet ducimus
                            ipsum accusantium! Sint distinctio magni voluptates
                            recusandae laboriosam aliquam quos, nobis et. Accusamus,
                            nisi Soluta.
                        </p>
                    </li>
                    <li>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit.
                            Consequatur doloribus ipsa quod voluptatem voluptate eum
                            labore ullam amet delectus perferendis.
                        </p>
                    </li>
                    <li>
                        <p>
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit.
                            Animi, quas id. Dolorem atque corporis quae cum, beatae, qui
                            fuga magni nihil consectetur sequi delectus nam.
                        </p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>
    <?php
    }
}
?>