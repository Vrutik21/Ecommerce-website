<?php
require 'Login/config.php';
require 'Login/register-process.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopcart-register</title>

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
<section id="signup-form">
    <div class="image"></div>
    <div class="container">
        <div id="signup" class="row d-flex justify-content-center align-items-center" style="margin-top: 17rem";>
        <div class="col-7">
            <img class="img-fluid" src="images/kindpng_7329685.png" alt="login_image">
        </div>
        <div id="sign" class="col-5 mt-4">
            <div class="d-flex justify-content-center align-items-center">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <h5 class="text-center">REGISTER TO START SHOPPING!</h5>
                    <br>
                    <div class="form-row">
                        <div class="col">
                            <input type="text" value="<?php echo $username; ?>"
                                   required name="username"
                                   class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>"
                                   placeholder="User Name">
                            <span class="invalid-feedback"><?php echo $username_err; ?></span>
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col">
                            <input type="email" value="<?php if (isset($_POST['email'])) echo $_POST['email'];?>"
                                   required name="email"
                                   class="form-control"
                                   placeholder="Email">
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col">
                            <input type="password" required name="password"
                                   value="<?php echo $password; ?>"
                                   class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>"
                                   placeholder="Password">
                            <span class="invalid-feedback"><?php echo $password_err; ?></span>
                        </div>
                    </div>
                    <div class="form-row my-4">
                        <div class="col">
                            <input type="password" required name="confirm_password"
                                   value="<?php echo $confirm_password; ?>"
                                   class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>"
                                   placeholder="Confirm Password">
                            <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
                        </div>
                    </div>
                    <div class="form-check form-check-inline">
                        <input type="checkbox" name="agreement"  class="form-check-input" required>
                        <label for="agreement" class="form-check-label text-black-75 mx-2">I agree to the <a href="#">terms and conditions.</a></label>
                    </div>
                    <div class="submit-btn text-center my-4">
                        <button type="submit" class="btn btn-warning rounded-pill text-dark px-5">Register</button>
                        <button type="reset" class="btn btn-warning rounded-pill text-dark px-5 ml-5">Reset</button>

                    </div>
                    <h6 class="text-center">Already have an account?<a href="login.php" style=""> Login here</a></h6>
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
