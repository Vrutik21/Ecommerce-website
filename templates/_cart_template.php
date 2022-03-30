<!-- main -->
<?php
$conn = new mysqli("localhost","root","","shopcart");
if($conn->connect_error){
    die("Connection Failed!".$conn->connect_error);
}
if (isset($_POST['qty'])){
    $qty = $_POST['qty'];
    $pid = $_POST['pid'];
    $price = $_POST['price'];

    $totalPrice = $qty * $price;

    $stmt = $conn->prepare("UPDATE cart SET qty=?,item_price=? WHERE item_id=?");
    $stmt->bind_param("isi",$qty,$totalPrice,$pid);
    $stmt->execute();

}

if ($_SERVER['REQUEST_METHOD']='POST'){
    if (isset($_POST['saveForLater'])) {
        $cart->SaveForLater($_POST['item_id']);
    }
    if (isset($_POST['delete-cart-item'])){
        $deleteitem = $cart->deleteCart($_POST['item_id']);
    }

    if (isset($_POST['checkout'])){
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

            echo ("<script>
    window.alert('Please log in to proceed further!');
    window.location.href='login.php';
    </script>");

        }else{

            header("Location: checkout.php");
        }
    }
    if (isset($_POST['home'])){
        if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){

            echo ("<script>
    window.alert('Please log in to proceed further!');
    window.location.href='login.php';
    </script>");

        }else{

            header("Location: checkout2.php");
        }
    }
}
?>
<main id="main-site">
    <!-- shopping cart -->
    <section id="cart" class="py-3 Qty">
        <div class="container-fluid w-75">
            <h4 class="text-center display-4 color-primary">Shopping Cart</h4>
            <div class="row">
                <div class="col-sm-9">
                    <?php
                    $stmt = $link->prepare('SELECT * FROM cart');
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $grand_total = 0;
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
                            <div class="d-flex pt-2">
                                <div id="Qty" class="d-flex  pt-1">
                                        <input type="hidden" class="pid" value="<?php echo $row['item_id']?>">
                                        <input type="hidden" class="price" value="<?php echo $row['total_price']?>">
                                        <input type="number" class="form-control qty" value="<?php echo $row['qty']?>" min="1" max="10">
                                </div>

                                <form method="post" class="pl-1 pt-1">
                                    <input type="hidden" value="<?php echo $row['item_id']??0;?>" name="item_id">
                                    <button type="submit" class="btn text-danger border-right" name="delete-cart-item">Delete</button>
                                </form>

                                <form method="post" class="pt-1">
                                    <input type="hidden" name="item_id" value="<?php echo $row['item_id']??0;?>">
                                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id']??0;?>">
                                    <button type="submit" class="btn text-danger" name="saveForLater">Save for Later</button>
                                </form>
                            </div>
                            <!-- !quantity -->
                        </div>
                        <div class="col-sm-1 text-right">
                            <div class="fs-20 text-danger">
                                <form method="post">
                                    ₹<span><?php echo $row['item_price']??0;?></span>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- !cart items -->
                    <?php
                    $grand_total += $row['item_price'];
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
                                Subtotal(<?php $sql = "SELECT * from cart";

                                if ($result = mysqli_query($link, $sql)) {

                                    // Return the number of rows in result set
                                    $rowcount = mysqli_num_rows( $result );
                                    echo $rowcount;
                                } ?> items):&nbsp;<span class="text-danger">₹</span
                                ><span class="text-danger"><?php echo $grand_total?></span>
                            </h5>
                            <form method="post">
                                <button type="submit" name='checkout' class="btn btn-warning mt-3 fs-14 <?php ($grand_total>1)?"":"disabled"?>">
                                    Pay on COD
                                </button>
                                <button type="submit" name='home' class="btn btn-warning mt-3 fs-14">
                                    Pay Online
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- !shoppping cart -->
