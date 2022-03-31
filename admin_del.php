<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin</title>

    <!-- Bootstrap CDN -->
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh"
        crossorigin="anonymous"
    />

    <!-- Owl-carousel CDN -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha256-UhQQ4fxEeABh4JrcmAJ1+16id/1dnlOEVCFOxDef9Lw="
        crossorigin="anonymous"
    />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css"
        integrity="sha256-kksNxjDRxd/5+jGurZUJd1sdR2v+ClrCl3svESBaJqw="
        crossorigin="anonymous"
    />

    <!-- font awesome icons -->
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css"
        integrity="sha256-h20CPZ0QyXlBuAw7A+KluUYx/3pK+c7lYEpqLTlxjYQ="
        crossorigin="anonymous"
    />

    <!-- Custom CSS file -->
    <link rel="stylesheet" href="css/style.css" />

</head>
<body>
<?php
session_start();
session_regenerate_id(true);
if (!isset($_SESSION['adminName'])){
    header("Location: admin_login.php");
}

?>
<nav
    class="navbar navbar-expand-lg navbar-dark font-rale color-second-bg fw-bold">
    <div class="container-fluid m-auto">
        <a class="navbar-brand" href="admin.php"><h3>Admin Panel</h3></a>
        <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link fs-18" aria-current="page" href="admin.php"
                    >Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-18" aria-current="page" href="admin_add.php"
                    >Add Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fs-18" aria-current="page" href="admin_del.php"
                    >View/Remove Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-18" aria-current="page" href="admin_order.php"
                    >View Orders</a>
                </li>
            </ul>
            <div class="text-white mb-1 px-3 fw-light">
                <a href="#" class="text-light fw-light">Welcome <?php echo htmlspecialchars($_SESSION['adminName'])?></a>
            </div>
            <div class="text-white mb-1 px-3 border-left">
                <a href="admin_logout.php" class="text-light fw-light">Logout</a>
            </div>
        </div>
    </div>
</nav>

<?php
require 'functions.php';
include 'addToCart.php';
require_once 'dbconfig.php';

if ($_SERVER['REQUEST_METHOD']='POST') {
    if (isset($_POST['delete-cart-item'])) {
        $deleteitem = $cart->deleteCart($_POST['item_id'],'product');
    }
}

$select_stmt = $db->prepare("SELECT * FROM product ORDER BY RAND()");
$select_stmt->execute();

$product_shuffle= $product->getData($table='product');
shuffle($product_shuffle);

//creating new Buttons from database
$brand = array_map(function ($pro){
    return $pro['item_type'];},$product_shuffle);
$unique = array_unique($brand);
sort($unique);
?>
<!-- Special-price-->
<section id="special-price">
    <div class="container">
        <h4 class="text-center m-3 display-4">Categories</h4>
        <hr class="m-2" />
        <div id="filters" class="button-group text-center">
            <button class="btn is-checked fs-18" data-filter="*">
                All Items
            </button>
            <?php array_map(function ($brand){
                printf('<button class="btn fs-18" data-filter=".%s">%s</button>',$brand,$brand);
            },$unique); ?>
</div>
<div class="grid">
    <?php while($row = $select_stmt->fetch(PDO::FETCH_ASSOC)){
        $imageURL = 'images/'.$row['item_image']?>
        <div class="grid-item border <?php echo $row['item_type'];?>">
            <div class="item ml-2" style="width: 250px; height: 400px">
                <div class="product">
                    <a href="<?php printf('%s?item_id=%s','product.php',$row['item_id']);?>"
                    ><img
                            src="<?php echo $imageURL;?>"
                            alt=""
                            class="img-fluid w-auto m-auto p-2"
                            alt="product1"
                        /></a>
                    <h6 class="text-center"><?php echo $row['item_name']??'Unknown'?></h6>
                    <div class="rating text-warning font-size-12 text-center">
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="fas fa-star"></i></span>
                        <span><i class="far fa-star"></i></span>
                    </div>
                    <div class="price py-2 text-center">
                        <h6>₹<?php echo $row['item_price']??'0'?></h6>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-outline-primary del_data"
                                id="<?php echo $row['item_id']?>">Remove</button>
                    </div>
                </div>
            </div>
        </div>
    <?php }?>
</div>
</div>
</section>
<!-- Modal -->
<div class="modal fade" id="delData" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="post" action="#" id="delForm">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Remove Product</h5>
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


<div class="text-center text-white color-gradient d-flex justify-content-center p-4" style="margin-top: 15rem">
    <p class="m-3">
        &copy;Copyrights 2022. Design By
        <a
            href="https://github.com/Vrutik21?tab=repositories"
            class="text-white"
            target="_blank"
        >Vrutik</a>
    </p>
</div>

<!-- !footer -->

<!--jquery js-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- bootstrap js-->
<script
    src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"
></script>
<script
    src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
    integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
    crossorigin="anonymous"
></script>


<!-- Owl Carousel Js file -->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
    integrity="sha256-pTxD+DSzIwmwhOqTFN+DB+nHjO4iAsbgfyFq5K5bcE0="
    crossorigin="anonymous"
></script>

<!-- Isotope filter and sort plugin -->
<script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"
    integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
></script>

<!-- Custom js -->
<script src="index.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.del_data', function () {
            var del_id = $(this).attr('id');
            $.ajax({
                url: "admin_item_del/delorder.php",
                type: "post",
                data: {del_id: del_id},
                success: function (data) {
                    $("#info_del").html(data);
                    $("#delData").modal('show');
                }
            });
        });

        $(document).on('click','#del',function (){
            $.ajax({
                url:"admin_item_del/save_del.php",
                type: "post",
                data: $("#delForm").serialize(),
                success:function (data){
                    $("#info_del").html(data);
                    $("#delData").modal('hide');
                    location.reload();
                }
            });
        });
    });
</script>
</body>
</html>