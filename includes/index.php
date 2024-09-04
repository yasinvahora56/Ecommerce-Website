<?php
include('connect.php');
include_once('../functions/common_function.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommers Website</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <!-- Bootstrap link-->
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <!-- Font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap JS-->
    <script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <!-- Css-->
    <style>
        .logo {
            width: 60px;
            height: 60px;
        }

        .card-img-top {
            width: 100%;
            height: 350px;
        }

        .card-body {
            height: auto;
            min-height: 100%;
        }
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <!-- Main First Naavbaar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <a href="../admin_area/index.php"><img src="../images/trolly.png" alt="" class="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    <?php
                    @session_start();
                    if (isset($_SESSION['uname'])) {
                        echo  "<li class='nav-item'>
                                <a class='nav-link' href='../user_area/profile.php'>My Account</a>
                            </li>";
                    } else {
                        echo "<li class='nav-item'>
                            <a class='nav-link' href='../user_area/user_registration.php'>Register</a>
                        </li>";
                    }
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_detail(); ?></sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total Shopping ₹<?php echo total_cart_price(); ?>/-</a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0" action="searchdata_product.php" method="get">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <!-- <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button> -->
                    <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
                </form>
            </div>
        </nav>
        <!-- Calling Cart Function -->
        <?php
        cart();
        ?>
        <!-- Second Navbaar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <?php
            // session_start();
            ?>
            <ul class="navbar-nav me-auto">
                <?php
                if (!isset($_SESSION['uname'])) {

                    echo "<li class='nav-item'>
            <a class='nav-link text-light' href='#'>Welcome Guest</a>
        </li>";
                    echo "<li class='nav-item'>
            <a class='nav-link text-light border' href='../user_area/user_login.php'>Login</a>
        </li>";
                } else {
                    echo "<li class='nav-item'>
            <a class='nav-link text-light' href='#'>Welcome: <font class='font-weight-bold text-uppercase'>" . $_SESSION['uname'] . "</font></a>
        </li>";
                    echo "<li class='nav-item'>
            <a class='nav-link text-light border' href='../logout/user_logout.php'>Logout</a>
        </li>";
                }
                ?>
                <li class='nav-item'>
            <a class='nav-link text-light border ml-2' href='../admin_area/admin_login.php'>admin Login</a>
        </li>
            </ul>


        </nav>
        <!-- Heading-->
        <div class="bg-light">
            <h1 class="text-center">Hidden Store</h1>
            <p>
                <!-- Moving Animation Title-->
                <marquee behavior="alternate" direction="" scrollamount="7">Communication is the heart of e-commerce
                    business, fostering trust, driving sales, and building lasting customer relationships.</marquee>
            </p>
        </div>
    </div>
    <!-- All Product Cart Main Body -->
    <div class="row ml-2 mr-2">
        <div class="col-md-10">
            <div class="row">

                <!-- Php Fetching Products -->
                <?php
                gettingproducts();
                get_unique_categories();
                get_unique_brand();
                ?>


            </div>
        </div>
        <!-- card end -->


        <!-- Side Bar -->
        <div class="col-md-2 bg-dark mb-2 p-0">
            <!-- delivary brands displayed -->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light">
                        <h5>Delivery Brands</h5>
                    </a>
                </li>
                <?php

                getbrands();
                ?>
            </ul>
            <!-- delivary Categories displayed -->
            <ul class="navbar-nav me-auto text-center">
                <li class="nav-item bg-info">
                    <a href="#" class="nav-link text-light">
                        <h5>Delivery Categories</h5>
                    </a>
                </li>
                <?php
                getcategories();
                ?>
            </ul>
        </div>
    </div>
    <!-- Footer -->
    <div class="bg-info p-3 text-center p-0">
        <p class="text-light">All Rights Reserved ©- Design by Yasin <?php echo 20;
                                                                        echo date("y"); ?></p>
    </div>

</body>

</html>