<?php
session_start();
include "Login/helper.php";
?>

<?php
require ('Login/connection.php');

$user = array();
if (isset($_SESSION['user_id'])){
    $user = get_user_info($con,$_SESSION['user_id']);
}
if ($_SERVER['REQUEST_METHOD']=='POST'){
    include 'Login/login-process.php';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopcart-login</title>

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
    <link rel="stylesheet" href="Login/login.css" />

</head>
<body>
<section id="login-form">
    <div class="image"></div>
    <div class="container">
        <div id="login" class="row d-flex justify-content-center align-items-center" style="margin-top: 19rem">
            <div class="col-7">
                <img class="img-fluid" src="images/kindpng_7329685.png" alt="login_image">
            </div>
            <div id="log" class="col-5 mt-4">
                <div class="d-flex justify-content-center align-items-center">
                    <form action="login.php" method="post" enctype="multipart/form-data" id="log-form" >
                        <h5 class="text-center">LOGIN TO ACCESS AMAZING DEALS!</h5>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <input type="email" value="<?php if (isset($_POST['email'])) echo $_POST['email'];?>" required name="email" id="email" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <div class="form-row my-4">
                            <div class="col">
                                <input type="password" required name="password" id="password" class="form-control" placeholder="Password">
                                <small id="confirm_err" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="agreement"  class="form-check-input">
                            <label for="agreement" class="form-check-label text-black-75 mx-2">Remember me</label>
                        </div>
                        <div class="submit-btn text-center my-4">
                            <button type="submit" class="btn btn-warning rounded-pill text-dark px-5">Login</button>
                        </div>
                        <h6 class="text-center">Don't have an account?<a href="signup.php" style=""> Register here</a></h6>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>





<script
        src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"
></script>
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
<script src="Login/login.js"></script>
</body>
</html>
