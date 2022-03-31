<!--header-->
<?php
// Initialize the session
ob_start();
session_start();
error_reporting(E_ERROR | E_PARSE);
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
    <style>

        .to-top {
            background: #023fb1;
            position: fixed;
            bottom: 16px;
            right:32px;
            width:60px;
            height:60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size:32px;
            color:white;
            opacity:0;
            pointer-events: none;
            transition: all .4s;
        }
        .to-top.active {
            bottom:32px;
            pointer-events: auto;
            opacity:1;
        }
    </style>

    <?php
    // require MySQL connection
    require ('functions.php');
    ?>
</head>
<body>
<a href="#head" class="to-top" style="text-decoration: none">
    <i class="fas fa-chevron-up"></i>
</a>
<script>
    const toTop = document.querySelector(".to-top");

    window.addEventListener("scroll", () => {
        if (window.scrollY > 1400) {
            toTop.classList.add("active");
        } else {
            toTop.classList.remove("active");
        }
    })
</script>
<!-- header -->
<header id="head" class="font-rale">
    <div class="strip d-flex justify-content-between px-4 py-1 bg-light">
        <p class="font-rale fs-6 text-black-50 m-0">
            B-2 Suryadeep Bunglows Sangath-3 Motera Ahmedabad-380005
        </p>
        <div class="font-rale fs-14">
            <?php
            $q="SELECT * FROM orders WHERE name ='$_SESSION[username]'";
            $res=mysqli_query($link,$q);

            // Check if the user is logged in, if not then redirect him to login page
            if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
                echo '<a href="#" class="px-3 border-right text-dark">Guest user</a>';
                echo '<a href="login.php" class="px-3 border-right text-dark">Login</a>';
                echo '<a href="cart.php" class="px-3 border-right text-dark">Wishlist('.count($product->getData("cart1")).')</a>';
            }
            else{
                echo '<a href="profile.php" class="px-3 border-right text-dark">'.'Welcome '.htmlspecialchars($_SESSION["username"]).'</a>';
                echo '<a href="cart.php" class="px-3 border-right text-dark">Wishlist('.count($product->getData("cart1")).')</a>';
                echo '<a href="deliver.php" class="px-3 border-right text-dark">Orders('
                    .mysqli_num_rows($res)
                    .')</a>';
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
            <a class="navbar-brand fw-bold" href="index.php"><h3>Shopcart</h3></a>
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
                        <a class="nav-link active fs-18" aria-current="page" href="index.php#top-sale"
                        >On Sale</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-18" href="index.php#special-price">Categories</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-18" href="index.php#latest-product"
                        >Latest Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-18" href="index.php#blogs">Blogs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active fs-18" target="_blank" href="https://www.techadvisor.com/news/pc-components/">Upcoming Products</a>
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
                        <span id="cart-item" class="px-3 py-2 rounded-pill text-dark bg-light"><?php
                            $sql = "SELECT * from cart";

                            if ($result = mysqli_query($link, $sql)) {

                                // Return the number of rows in result set
                                $rowcount = mysqli_num_rows( $result );
                                echo $rowcount;
                            }?></span>
                    </a>
                </div>
            </div>
        </div>
    </nav>
</header>
<!--!header -->

<?php
if ($_SERVER['REQUEST_METHOD']='POST'){
    if (isset($_POST['update'])){
        $call = $_POST['phone'];
        $email = $_POST['email'];
        $address = $_POST['address'];
        $use = $_SESSION['username'];


        $stmt = $link->prepare('UPDATE users SET email=?,phone=?,address=? WHERE username=?');
        $stmt->bind_param('ssss', $email, $call, $address, $use);
        $stmt->execute();

    }
}

?>
    <div class="row mt-4" style="width: 100%">
        <?php
        $user = $_SESSION['username'];
        $stmt = $link->prepare('SELECT * FROM users WHERE username=?');
        $stmt->bind_param("s",$user);
        $stmt->execute();
        $result = $stmt->get_result();

        while ($row = $result->fetch_assoc()){
            $phone = $row['phone']=''?"<span class='text-danger'>No details found!</span>":$row['phone'];
            $add = $row['address']=''?"<span class='text-danger'>No details found!</span>":$row['address'];
            ?>

        <div class="col mt-2">
            <h3 class=" color-blue text-center">Account Info.</h3>
            <div class="text-center ml-5 mt-4 d-flex justify-content-center">
            <table class="table-bordered w-100">
                <thead>
                <tr>
                    <th scope="col" class="mr-4 p-3">Username :</th>
                    <td class="p-4 text-center"><?php echo $row['username']?></td>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row" class="m-auto p-2">Email :</th>
                    <td class="p-4 text-center"><?php echo $row['email']?></td>

                </tr>
                <tr>
                    <th scope="row" class="m-auto p-2">Phone :</th>
                    <td class="p-4 text-center"><?php echo $phone?></td>
                </tr>
                <tr>
                    <th scope="row" class="m-auto p-2">Address :</th>
                    <td class="p-4 text-center"><?php echo $add?></td>
                </tr>
                </tbody>
            </table>
            </div>
        </div>

        <div class="col mt-3">
            <h3 class=" color-blue text-center">Update Info.</h3>
<form action="#" method="post" class="ml-3 mr-1 mt-4">
                <div class="form-group">
                    <input disabled type="text" name="name"  class="form-control text-center bg-primary fs-20 text-white" value="<?php echo $_SESSION['username']?>" placeholder="Enter Name" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="ml-1">Email address</label>
                    <input type="email" name="email" class="form-control" value="<?php echo $row['email']??'';?>" placeholder="Update E-Mail" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="ml-1">Phone</label>
                    <input type="tel" name="phone" class="form-control" value="<?php echo $row['phone']??'';?>" placeholder="Update Phone" required>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1" class="ml-1">Delivery Address</label>
                    <textarea name="address" class="form-control" rows="3" cols="10" placeholder="Update Delivery Address"><?php echo $row['address']??'';?></textarea>
                </div>
                    <div class="form-group w-25 m-auto pt-2">
                        <input type="button" data-toggle="modal" data-target="#exampleModal" value="Update Account" class="btn btn-danger btn-block">
                </div>

        </div>
</div>
        <?php }?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Update Account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Do you really want to update your account?
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-outline-primary" name="update">Yes</button>
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal">No</button>
                </form>
            </div>
        </div>
    </div>
</div>
<div style="margin-top: 10rem"></div>
<?php
include "footer.php";
?>

<script>
    if (window.history.replaceState){
        window.history.replaceState(null,null,window.location.href);
    }
</script>
