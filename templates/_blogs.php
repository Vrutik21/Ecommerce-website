<?php $product_shuffle= $product->getData($table='blog');
shuffle($product_shuffle);
?>
<!-- blogs -->
      <section id="blogs">
        <div class="container pb-5 pt-2">
          <h4 class="display-4 text-center color-primary">Blogs</h4>
          <hr />
          <div class="owl-carousel owl-theme">
              <?php foreach ($product_shuffle as $item){?>
            <div class="item">
                <div class="product">
                    <div class="card border-0 px-4">
                        <h5 class="card-title text-left"><?php echo $item['title']??'Unknown';?></h5>
                       <a href="#">
                           <img
                                   src="<?php echo $item['img']??'./images/ADATA Premier SP550 SSD.png';?>"
                                   alt="card-image"
                                   class="img-fluid"
                           />

                       </a>
                        <p class="card-text fs-16 text-black-75 py-1">
                            <?php echo $item['info']??'Description';?>
                        </p>
                        <a target="_blank" href="<?php echo $item['link']??'#';?>" class="color-primary">Read More</a>
                    </div>
                </div>

                </div>
              <?php }?>
          </div>
        </div>
      </section>
    </main>