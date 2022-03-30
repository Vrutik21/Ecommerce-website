<div class="container-fluid  text-center">
    <div class="m-4">
        <h4 class="display-4 text-center">All Orders</h4>
    </div>
<table class="table table-hover">
    <thead>
    <tr>
        <th scope="col">ID</th>
        <th scope="col" class="px-5">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Phone</th>
        <th scope="col" class="w-25">Address</th>
        <th scope="col">Products</th>
        <th scope="col">Amount</th>
        <th scope="col">Payment mode</th>
        <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody>
    <?php
    require_once 'dbconfig.php';
    $select_stmt = $db->prepare("SELECT * FROM orders");
    $select_stmt->execute();
    while ($row = $select_stmt->fetch(PDO::FETCH_ASSOC)){
    ?>
    <tr>
        <th scope="row"><?php echo $row['orderid'];?></th>
        <td><?php echo $row['name'];?></td>
        <td><?php echo $row['email'];?></td>
        <td><?php echo $row['phone'];?></td>
        <td ><?php echo $row['address'];?></td>
        <td><?php echo $row['products'];?></td>
        <td>₹ <?php echo $row['amount_paid'];?></td>
        <td><?php echo $row['pmode'];?></td>
        <td>
            <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-outline-primary fs-16">Cancel Order</button>
        </td>
    </tr>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Do you really want to cancel this order (ID#<?php echo $row['orderid']?>)</p>
                    <form method="post" action="delorder.php">
                        <input type="hidden" value="<?php echo $row['orderid']?>" name="orderID">
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="cancel">Save changes</button>
                    </form>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>
    <?php } ?>
    </tbody>
</table>
</div>








