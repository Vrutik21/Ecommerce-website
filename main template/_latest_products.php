<?php $product_shuffle= $product->getData($table='latest_products');
shuffle($product_shuffle);?>
<!-- Advertisement -->
      <section id="ads">
        <div class="container">
          <div class="container py-4 text-center d-flex justify-content-around">
            <img src="./images/ad1.png" alt="" class="img-fluid w-25 h-25" />
            <img src="./images/ad11.png" alt="" class="img-fluid w-50 h-50" />
          </div>
        </div>
      </section>

      <!-- Latest products -->
      <section id="latest-product">
        <div class="container py-2">
          <h4 class="text-center">Latest Products</h4>
          <hr class="mb-4" />
          <div class="owl-carousel owl-theme">
              <?php foreach ($product_shuffle as $item){?>
            <div class="item p-2">
              <div class="product">
                <a href="#"
                  ><img
                    src="<?php echo $item['item_image']??'./images/ADATA Premier SP550 SSD.png';?>"
                    alt=""
                    class="img-fluid w-auto m-auto"
                    alt="product1"
                /></a>
                <h5 class="text-center"><?php echo $item['item_name']??'Unknown'?></h5>
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
                  <button type="button" class="btn btn-outline-primary">
                    Add to cart
                  </button>
                </div>
              </div>
            </div>
              <?php }?>

          </div>
        </div>
      </section>