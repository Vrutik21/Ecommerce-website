 <!-- main -->
 <main id="main-site">
      <!-- Owl-carousel -->
      <section id="banner-area" class="font-rale">
        <div class="owl-carousel owl-theme color-gradient">
            <?php

            require_once 'dbconfig.php';
            include 'addToCart.php';
            $select_stmt = $db->prepare("SELECT * FROM product ORDER BY RAND() LIMIT 5");
            $select_stmt->execute();
            while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)){
                $imageURL = 'images/'.$row['item_image']
            ?>
          <div class="item">
              <div class="product">
                  <a href="<?php printf('%s?item_id=%s','product.php',$row['item_id']);?>">
            <img
              src="<?php echo $imageURL??'./images/ADATA Premier SP550 SSD.png';?>"
              style="width: 32rem"
              class="img-fluid m-auto p-2"
            /> </a>
            <div class="m-auto text-white px-5">
              <h5><?php echo $row['item_name']??'Unknown'?></h5>
              <p>
                  Lorem ipsum dolor sit amet, consectetur adipisicing elit. A asperiores earum ex facere illo in laboriosam numquam qui. Ab adipisci aliquid architecto atque cum dolores doloribus repellendus, sint totam unde velit voluptates voluptatibus. Consectetur, consequatur dolorem enim ex laborum possimus praesentium quae voluptatem! Ab laudantium ratione repellat soluta velit voluptatum?
              </p>
                <a href="<?php printf('%s?item_id=%s','product.php',$row['item_id']);?>">
                     <button type="button" name="view" class="btn btn-outline-primary">View More</button>
                </a>
            </div>
          </div>
          </div>
            <?php }?>
          </div>
        </div>
      </section>

