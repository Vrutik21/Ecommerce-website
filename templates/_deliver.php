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
        <div class="mt-3 mb-4">
            <button class="btn btn-outline-primary fs-16 del_data"
                    id="<?php echo $row['orderid']?>">Cancel Order</button>
        </div>
    <?php }?>
    <div>
        <!-- Modal -->
        <div class="modal fade" id="delData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form method="post" action="#" id="delForm">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Cancel Order</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body" id="info_del">

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-primary" id="del">Yes</button>
                            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">No</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
