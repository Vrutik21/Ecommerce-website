<?php
session_start();
include('Login/helper.php');

$user = array();
if (isset($_SESSION['user_id'])) {
require('Login/connection.php');
$user = get_user_info($con, $_SESSION['user_id']);
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Shopcart</title>

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

    <?php
    // require MySQL connection
    require ('functions.php');
    ?>
  </head>
  <body>
    <!-- header -->
    <header id="head" class="font-rale">
      <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
        <p class="font-rale fs-6 text-black-50 m-0">
          B-2 Suryadeep Bunglows Sangath-3 Motera Ahmedabad-380005
        </p>
        <div class="font-rale fs-14">
          <a href="#" class="px-3 border-right text-dark"><?php echo $user['firstName'] ?? "Login"?></a>
          <a href="cart.php" class="px-3 border-right text-dark">Wishlist(<?php echo count($product->getData(table: 'wishlist'))?>)</a>
            <a href="login.php" class="px-3 border-right text-dark">Logout</a>
        </div>
      </div>

      <!-- Navigation bar -->
      <nav
        class="navbar navbar-expand-lg navbar-dark color-second-bg font-oxygen fw-bold"
      >
        <div class="container-fluid m-auto">
          <a class="navbar-brand" href="index.php">Shopcart</a>
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
                <a class="nav-link" aria-current="page" href="#"
                  >On Sale </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Category</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"
                  >Products <i class="fas fa-chevron-down"></i
                ></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Blog</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#"
                  >Category <i class="fas fa-chevron-down"></i
                ></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Coming Soon</a>
              </li>
            </ul>
            <form class="d-flex mr-5">
              <input
                class="form-control me-2"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <button class="btn btn-outline-primary ml-1" type="submit">
                Search
              </button>
            </form>
            <form action="#" class="font-size-14 font-rale">
              <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                <span class="px-2 font-size-16 text-white"
                  ><i class="fas fa-shopping-cart"></i
                ></span>
                <span class="px-3 py-2 rounded-pill text-dark bg-light"><?php echo count($product->getData(table: 'cart'))?></span>
              </a>
            </form>
          </div>
        </div>
      </nav>
    </header>
    <!--!header -->