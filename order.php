
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
  <?php
if (isset($_POST['action']) && isset($_POST['action']) == 'order') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $products = $_POST['products'];
    $grand_total = $_POST['grand_total'];
    $address = $_POST['address'];
    $pmode = 'Cash On Delivery';

    $data = '';

    $stmt = $link->prepare('INSERT INTO orders (name,email,phone,address,pmode,products,amount_paid)VALUES(?,?,?,?,?,?,?)');
    $stmt->bind_param('sssssss', $name, $email, $phone, $address, $pmode, $products, $grand_total);
    $stmt->execute();
    $stmt2 = $link->prepare('DELETE FROM cart');
    $stmt2->execute();
    $data .= '
 <div class="text-center ml-2">
    <h1 class="display-4 mt-2 text-danger">Thank You!</h1>
    <h2 class="text-success">Your Order Placed Successfully!</h2>      
<table class="table table-bordered">
            <tr>
                <th>Items Purchased :</th>
                <td>' . $products . '</td>
            </tr>
            <tr>
                <th>Your Name :</th>
                <td>' . $name . '</td>
            </tr>
            <tr>
                <th>Your Email :</th>
                <td>' . $email . '</td>
            </tr>
            <tr>
                <th>Your Phone :</th>
                <td>' . $phone . '</td>
            </tr>
            <tr>
                <th>Amount Paid :</th>
                <td>₹ ' . number_format($grand_total, 2) . '</td>
            </tr>
            <tr>
                <th>Payment Mode :</th>
                <td>' . $pmode . '</td>
            </tr>
            <tr>
                <th>Delivery Address:</th>
                <td>' . $address . '</td>
            </tr>
            <tr>
                <th>Delivery Time :</th>
                <td>Within 3-4 days</td>
            </tr>
        </table>
        </div>';

    echo $data;
}
else{
    echo "Something Went Wrong!";
}
?>
  <div style="margin-top: 3.5rem"></div>
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
  </body>
</html>