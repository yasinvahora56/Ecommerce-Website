<?php
include('../includes/connect.php');
include_once('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <!-- Bootstrap link-->
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <!-- Font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap JS Link-->
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

        button {
            border: none;
        }

        .product_img {
            width: 100px;
            display: center;
            object-fit: contain;
        }

        .p-1 {
            align-items: center !important;
        }

        .d-flex {
            display: flex !important;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid p-0">
        <!-- Main First Naavbaar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <div class="container-fluid">
                <img src="../images/trolly.png" alt="" class="logo">
                <nav class="navbar navbar-expand-lg">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php

                            // if (!isset($_SESSION['admin_name'])) {
                            //     header("Location: admin_login.php");
                            //     echo "<li class='nav-item'>
                            //         <a class='nav-link text-light' href='../user_area/user_login.php'>Login</a>
                            //     </li>";
                            // } else {
                            //     echo "<a href='' class='nav-link text-light'>Welcome:" . $_SESSION['admin_name'] . "</a>";
                            // }
                            ?>

                        </li>
                    </ul>
                </nav>
            </div>
        </nav>
        <!-- Heading-->
        <div class="bg-light">
            <h1 class="text-center">Manage Products</h1>
            <p>
                <!-- Moving Animation Title-->
                <marquee behavior="alternate" direction="" scrollamount="7">Communication is the heart of e-commerce
                    business, fostering trust, driving sales, and building lasting customer relationships.</marquee>
            </p>
        </div>
        <div class="row">
            <div class="col-md-12 bg-secondary  p-1 d-flex align-items-center">
                <div class="mt-5 ml-5">
                    <a href=""><img src="../admin_area/product_images/admin.jpg" style="width: 350px;" class="admin_image"></a>
                    <p class="text-light text-center mt-3 fs-5">Yasin Vahora</p>
                </div>
                <div class="button text-center ml-5 border-0 btn-wrapper">
                    <button class="mb-3"><a href="insert_product.php" class="nav-link text-light bg-info my-1">Insert Products</a></button>
                    <button name="view_products"><a href="index.php?view_products" class="nav-link text-light bg-info my-1">View Products</a></button>
                    <button><a href="index.php?insert_category" class="nav-link text-light bg-info my-1">Insert Categories</a></button>
                    <button><a href="index.php?view_category" class="nav-link text-light bg-info my-1">View Categories</a></button>
                    <button><a href="index.php?insert_brand" class="nav-link text-light bg-info my-1">Insert Brands</a></button>
                    <button><a href="index.php?view_brand" class="nav-link text-light bg-info my-1">View Brands</a></button>
                    <button><a href="index.php?all_orders" class="nav-link text-light bg-info my-1">All Orders</a></button>
                    <button><a href="index.php?all_payment" class="nav-link text-light bg-info my-1">All Payments</a></button>
                    <button><a href="index.php?view_users" class="nav-link text-light bg-info my-1">List Users</a></button>
                    <button><a href="" class="nav-link text-light bg-info my-1">Logout</a></button>
                </div>
            </div>
        </div>
    </div>

    <div class="container my-3">
        <?php
        if (isset($_GET['insert_category'])) {
            include('insert_categories.php');
        }
        if (isset($_GET['insert_brand'])) {
            include('insert_brands.php');
        }
        if (isset($_GET['view_products'])) {
            include('view_products.php');
        }
        if (isset($_GET['edit_products'])) {
            include('edit_products.php');
        }
        if (isset($_GET['delete'])) {
            include('delete.php');
        }
        if (isset($_GET['view_category'])) {
            include('view_category.php');
        }
        if (isset($_GET['edit_category'])) {
            include('edit_category.php');
        }
        if (isset($_GET['delete_category'])) {
            include('delete_category.php');
        }
        if (isset($_GET['view_brand'])) {
            include('view_brand.php');
        }
        if (isset($_GET['edit_brands'])) {
            include('edit_brands.php');
        }
        if (isset($_GET['delete_brands'])) {
            include('delete_brands.php');
        }
        if (isset($_GET['all_orders'])) {
            include('all_orders.php');
        }
        if (isset($_GET['delete_products'])) {
            include('delete_products.php');
        }
        if (isset($_GET['all_payment'])) {
            include('all_payment.php');
        }
        if (isset($_GET['delete_payment'])) {
            include('delete_payment.php');
        }
        if (isset($_GET['view_users'])) {
            include('view_users.php');
        }
        if (isset($_GET['delete_user'])) {
            include('delete_user.php');
        }
        ?>
    </div>

    <!-- Footer -->
    <div class="bg-info p-3 text-center footer mt-auto">
        <p class="text-light">All Rights Reserved ©- Design by Yasin <?php echo 20;
                                                                        echo date("y"); ?></p>
    </div>

</body>

</html>