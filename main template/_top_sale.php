 <!-- top-sale -->
 <?php $product_shuffle= $product->getData($table='top_sale');
 shuffle($product_shuffle);
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
                <a href="#"
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