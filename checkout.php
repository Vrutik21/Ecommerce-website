<?php
include 'header.php';
if (isset($_POST['submit'])){
    header("location: order.php");
}

?>

    <div class="row mt-2" style="width: 100%">
        <div class="col">
            <h3 class="text-center color-blue p-2 mt-2">Order Details</h3>
            <div class="table-responsive mt-3 ml-3 mb-5 border">
                <table class="table">
                    <thead class="thead color-second-bg">
                    <tr class="text-center text-white">
                        <th scope="col">Sr no.</th>
                        <th scope="col">Product image</th>
                        <th scope="col">Product name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total price</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $stmt = $link->prepare('SELECT * FROM cart');
                    $stmt->execute();
                    $result = $stmt->get_result();
                    $grand_total = 0;
                    while ($row = $result->fetch_assoc()){
                    $imageURL = 'images/'.$row['item_image']
                        ?>
                    <tr class="text-center">
                        <th scope="row"><?php echo $row['cart_id']?></th>
                        <td class="text-center" >
                            <div class="product">
                            <a href="<?php printf('%s?item_id=%s','product.php',$row['item_id']);?>"><img class="my-1" src="<?= $imageURL ?>" style="width: 10rem;margin-top: -12px;margin-left: -10px;margin-right: -30px"></a></td>
                            </div>
                        <td><?php echo $row['item_name']?></td>
                        <td>₹ <?php echo $row['total_price']?></td>
                        <td><?php echo $row['qty']?></td>
                        <td>₹ <?php echo $row['item_price']?></td>
                    </tr>
                    <?php
                        $grand_total += $row['item_price'];
                    }?>
                    <tr class="border-top">
                        <th>Total items: <?php $sql = "SELECT * from cart";

                            if ($result = mysqli_query($link, $sql)) {

                                // Return the number of rows in result set
                                $rowcount = mysqli_num_rows( $result );
                                echo $rowcount;
                            } ?></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Amount to pay: ₹ <?php echo $grand_total?></th>
                    </tr>
                    </tbody>
                </table>
            </div>
            <h5></h5>
        </div>
        <div class="col" id="order">
            <h3 class="text-center color-blue p-2 mt-2">Complete your order!</h3>
            <form action="" method="post" id="placeOrder" class="ml-3 mr-1 mt-3">
                <?php
                $grand_total = 0;
                $allItems = '';
                $items = [];

                $sql = "SELECT CONCAT(item_name, '(',qty,')') AS itemQty, item_price FROM cart";
                $stmt = $link->prepare($sql);
                $stmt->execute();
                $result = $stmt->get_result();
                while ($row = $result->fetch_assoc()) {
                    $grand_total += $row['item_price'];
                    $items[] = $row['itemQty'];
                }
                $allItems = implode(",",$items);
                ?>
                <input type="hidden" name="products" value="<?php echo $allItems; ?>">
                <input type="hidden" name="grand_total" value="<?php echo $grand_total; ?>">
                <div class="form-group">
                    <input readonly type="text" name="name"  class="form-control text-center color-second-bg fs-18 text-white" value="<?php echo htmlspecialchars($_SESSION["username"])?>" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <input readonly type="email" name="email" class="form-control" value="
                    <?php
                    $user = $_SESSION['username'];
                    $stmt = $link->prepare('SELECT * FROM users WHERE username=?');
                    $stmt->bind_param("s",$user);
                    $stmt->execute();
                    $result = $stmt->get_result();
                    while ($row = $result->fetch_assoc()){
                    echo $row['email'];
                    ?>" placeholder="Enter E-Mail" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" class="form-control" value="<?php echo $row['phone']??'';?>" placeholder="Enter Phone" required>
                </div>
                <div class="form-group">
                    <textarea required name="address" class="form-control" rows="3" cols="10" placeholder="Enter Delivery Address Here"><?php echo $row['address']??'';?></textarea>
                    <small class="text-danger">Please update delivery information from the <a href="profile.php">Accounts Menu</a>.</small>
                </div>
                        <?php }?>
                <h6 class="text-center lead">Payment Mode</h6>
                <div class="form-group">
                    <input type="text" name="pmode" class="form-control text-center" value="Cash On Delivery" disabled>
                </div>
                    <div class="form-group w-25 m-auto">
                        <input type="submit" name="submit" value="Order Now" class="btn btn-danger btn-block">
                </div>
            </form>
        </div>
    </div>

<div style="margin-top: 12rem"></div>

<?php
include 'footer.php';
?>