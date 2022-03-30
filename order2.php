
<?php
// Initialize the session
session_start();
include 'addToCart.php';
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
            <?php
            // Check if the user is logged in, if not then redirect him to login page
            if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                echo '<a href="#" class="px-3 border-right text-dark">Guest user</a>';
                echo '<a href="login.php" class="px-3 border-right text-dark">Login</a>';
                echo '<a href="cart.php" class="px-3 border-right text-dark">Wishlist('.count($product->getData("cart1")).')</a>';
            }
            else{
                echo '<a href="#" class="px-3 border-right text-dark">'.'Welcome '.htmlspecialchars($_SESSION["username"]).'</a>';
                echo '<a href="cart.php" class="px-3 border-right text-dark">Wishlist('.count($product->getData("cart1")).')</a>';
                echo '<a href="deliver.php" class="px-3 border-right text-dark">Orders</a>';
                echo '<a href="logout.php" class="px-3 border-right text-dark">Logout</a>';
            }
            ?>
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
            <div class="font-size-14 font-rale">
              <a href="cart.php" class="py-2 rounded-pill color-primary-bg">
                <span class="px-2 font-size-16 text-white"
                  ><i class="fas fa-shopping-cart"></i
                ></span>
                <span id="cart-item" class="px-3 py-2 rounded-pill text-dark bg-light">0</span>
              </a>
            </div>
          </div>
        </div>
      </nav>
    </header>

    <!--!header -->
    <?php
    include 'addToCart.php';

    if ($_SERVER['REQUEST_METHOD']=='POST'){
        if (isset($_POST['home'])){
            header("Location: index.php");
        }
    }

    ?>


<?php
include 'instamojo/instamojo.php';

$api = new Instamojo\Instamojo('test_3d6db46edb23af57896e5179e86','test_1814343d04dd627ee1f847f6b83','https://test.instamojo.com/api/1.1/');

$payid = $_GET['payment_request_id'];



try {
    $response = $api->paymentRequestStatus($payid);
?>


<?php
    $user = $_SESSION['username'];
    $stmt = $link->prepare('SELECT * FROM users WHERE username=?');
    $stmt->bind_param("s",$user);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()):
    $name = $response['payments'][0]['buyer_name'];
    $email = $response['payments'][0]['buyer_email'];
    $phone = $response['payments'][0]['buyer_phone'];
    $products = $response['purpose'];
    $grand_total = $response['payments'][0]['amount'];
    $address = $row['address'];
endwhile;
    $pmode = 'Online';

    $data = '';

    $stmt = $link->prepare('INSERT INTO orders (name,email,phone,address,pmode,products,amount_paid)VALUES(?,?,?,?,?,?,?)');
    $stmt->bind_param('sssssss', $name, $email, $phone, $address, $pmode, $products, $grand_total);
    $stmt->execute();
    $stmt2 = $link->prepare('DELETE FROM cart');
    $stmt2->execute();

    $data .= '<div class="text-center">
            <h1 class="display-4 mt-4 text-danger">Thank You!</h1>
            <h2 class="text-success">Your Order Placed Successfully!</h2>
     <div class="row justify-content-center">
         <div class="col-md-8">

        <table class="table table-bordered">
            <tr>
                <th>Payment ID :</th>
                <td>'.$response['payments'][0]['payment_id'].'</td>
            </tr>
            <tr>
                <th>Items Purchased :</th>
                <td>'.$response['purpose'].'</td>
            </tr>
            <tr>
                <th>Your Name :</th>
                <td>'.$response['payments'][0]['buyer_name'].'</td>
            </tr>
            <tr>
                <th>Your Email :</th>
                <td>'.$response['payments'][0]['buyer_email'].'</td>
            </tr>
            <tr>
                <th>Your Phone :</th>
                <td>'.$response['payments'][0]['buyer_phone'].'</td>
            </tr>
            <tr>
                <th>Amount Paid :</th>
                <td>₹ '.$response['payments'][0]['amount'].'</td>
            </tr>
            <tr>
                <th>Payment Mode :</th>
                <td>Online</td>
            </tr>
            <tr>
                <th>Delivery Address :</th>
                <td>'.$address.'</td>
            </tr>
            
            <tr>
                <th>Delivery Time :</th>
                <td>Within 3-4 days</td>
            </tr>
        </table>
        <div>
        <a href="index.php" class="px-3 border-right fw-bold color-blue fs-18">Go to Home</a>
        <a href="deliver.php" class="px-3 fw-bold color-blue fs-18">Go to Orders</a>
</div>
             

     </div>
     </div>
        </div>';
    echo $data;

}
catch (Exception $e){

}

?>

<div style="margin-top: 7rem"></div>
<?php
include 'footer.php';
die();
?>