<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin-login</title>

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
    <link rel="stylesheet" href="Login/admin.css" />

</head>
<body>
<section id="login-form">
    <div class="image"></div>
    <div class="container">
        <div id="login" class="row d-flex justify-content-center align-items-center" style="margin-top: 15rem">
            <div class="col-7">
                <img class="img-fluid" src="images/18771.jpg" alt="login_image">
            </div>
            <div id="log" class="col-5 mt-4">
                <div class="d-flex justify-content-center align-items-center">

                    <?php
                    require 'Login/config.php';
                    function input_filter($data){
                        $data=trim($data);
                        $data=stripslashes($data);
                        $data=htmlspecialchars($data);
                        return $data;
                    }

                    if (isset($_POST['submit'])){
//                        filtering user input
                        $name = input_filter($_POST['username']);
                        $pass = input_filter($_POST['password']);

//                        escaping special symbols used in SQL statements
                        $name = mysqli_real_escape_string($link,$name);

//                        query template
                        $query = "SELECT * FROM `admin` WHERE `username`=? AND `password`=?";

//                        prepared statement
                        if ($stmt=mysqli_prepare($link,$query)){
                          mysqli_stmt_bind_param($stmt,"ss",$name,$pass);
                            mysqli_stmt_execute($stmt);
                            mysqli_stmt_store_result($stmt);

                            if (mysqli_stmt_num_rows($stmt)==1){
                                session_start();
                                $_SESSION['adminName']=$name;
                                header("Location: admin.php");
                            }else{
                                echo "<script>alert('Invalid adminname or password');</script>";
                            }
                            mysqli_stmt_close($stmt);
                        }else{
                            echo "<script>alert('Something went wrong!');</script>";
                        }
                    }

                    ?>

                    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="post" enctype="multipart/form-data" id="log-form" >
                        <h5 class="text-center">LOGIN TO ACCESS ADMIN PANEL!</h5>
                        <br>
                        <div class="form-row">
                            <div class="col">
                                <input type="text" name="username"
                                       class="form-control"
                                       value="" placeholder="Username">
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="form-row my-4">
                            <div class="col">
                                <input type="password" name="password"
                                       class="form-control"
                                       placeholder="Password">
                                <span class="invalid-feedback"></span>
                            </div>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="checkbox" name="agreement"  class="form-check-input">
                            <label for="agreement" class="form-check-label text-black-75 mx-2">Remember me</label>
                        </div>
                        <div class="submit-btn text-center my-4">
                            <button type="submit" name="submit" class="btn btn-warning rounded-pill text-dark px-5">Login</button>
                        </div>
                        <h6 class="text-center">Visit Website?<a href="index.php"> Click Here</a></h6>
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
</body>
</html>
