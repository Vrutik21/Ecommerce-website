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
                    <a class="nav-link fs-18" aria-current="page" href="admin_del.php"
                    >View/Remove Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active fs-18" aria-current="page" href="admin_order.php"
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
//display cart items if not empty else show empty cart
count($product->getData("orders")) ? include("_admin_order.php"):include ("_admin_order_empty.php");
?>

<!--footer -->
<div class="text-center text-white color-gradient d-flex justify-content-center p-4" style="margin-top: 36rem">
    <p class="m-3">
        &copy;Copyrights 2022. Design By
        <a
            href="https://github.com/Vrutik21?tab=repositories"
            class="text-white"
            target="_blank"
        >Vrutik</a>
    </p>
</div>

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

<script type="text/javascript">
    $(document).ready(function () {
        $(document).on('click', '.del_data', function () {
            var del_id = $(this).attr('id');
            $.ajax({
                url: "admin_order_del/delorder.php",
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
                url:"admin_order_del/save_del.php",
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