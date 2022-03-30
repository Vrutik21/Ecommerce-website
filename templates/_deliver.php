<div class="text-center">
    <h3 class="display-4 m-4 color-primary">Your Orders</h3>
    <?php
    $nme = htmlspecialchars($_SESSION["username"]);
    $stmt = $link->prepare("SELECT * FROM orders WHERE name ='$nme'");
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()){
        ?>
        <table class="table table-bordered w-75 m-auto">
            <tr>
                <th>Order ID :</th>
                <td><?php echo $row['orderid'] ?></td>
            </tr>
            <tr>
                <th>Items Purchased :</th>
                <td><?php echo $row['products'] ?></td>
            </tr>
            <tr>
                <th>Amount Paid :</th>
                <td>₹ <?php echo $row['amount_paid'] ?></td>
            </tr>
            <tr>
                <th>Payment Mode :</th>
                <td><?php echo $row['pmode'] ?></td>
            </tr>
            <tr>
                <th>Delivery Address :</th>
                <td><?php echo $row['address'] ?></td>
            </tr>
            <tr>
                <th>Delivery Time :</th>
                <td>Within 3-4 days</td>
            </tr>
        </table>
        <div class="m-5"></div>
    <?php }?>
    <div>
