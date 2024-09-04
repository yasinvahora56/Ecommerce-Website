<?php
include('connect.php');
include_once('../functions/common_function.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart Details</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
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
        .card-body{
            height: auto;
            min-height: 100%;
        }
        .cart_image{
            width: 60px;
            height: 90px;
            object-fit: contain;
        }
    </style>
</head>

<body class="d-flex flex-column min-vh-100">
    <div class="container-fluid p-0">
        <!-- Main First Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <a href="index.php"><img src="../images/trolly.png" alt="" class="logo"></a>
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
                        }else{
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

                </ul>
                <form class="form-inline my-2 my-lg-0" action="searchdata_product.php" method="get">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
                </form>
            </div>
        </nav>
        <!-- Calling Cart Function -->
        <?php
            cart();
        ?>
        <!-- Second Navbar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <ul class="navbar-nav me-auto">
                
                <?php
                if(!isset($_SESSION['uname'])){
                    echo "<li class='nav-item'>
                    <a class='nav-link text-light' href='#'>Welcome Guest</a>
                </li>";
                  }else{
                      echo "<li class='nav-item'>
                      <a class='nav-link text-light' href=''>Welcome: <font class='font-weight-bold text-uppercase';>".$_SESSION['uname']."</font></a>
                  </li>";
                  }
                if(!isset($_SESSION['uname'])){
                  echo "<li class='nav-item'>
                    <a class='nav-link text-light' href='../user_area/user_login.php'>Login</a>
                </li>";
                }else{
                    echo "<li class='nav-item'>
                    <a class='nav-link text-light'href='../logout/user_logout.php'>Logout</a>
                </li>";
                }
                ?>
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

    <form action="" method="post">    
    <div class="container mt-4">
        <div class="row">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Product Id</th>
                        <th>Product Title</th>
                        <th>Product Image</th>
                        <th>Product Quantity</th>
                        <th>Total Price</th>
                        <th>Remove</th>
                        <th>Operations</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                          global $con;
                          $get_ip_add = getIPAddress();
                          $total = 0;
                          $cart_query = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_add'";
                          $result = mysqli_query($con, $cart_query);
                          $check_rows = mysqli_num_rows($result);
                          while ($row = mysqli_fetch_array($result)) {
                              $product_id = $row['product_id'];
                              $quantity = $row['quantity'];
                              $select_product = "SELECT * FROM `products` WHERE product_id = '$product_id'";
                              $result_products = mysqli_query($con, $select_product);
                              while ($row_product_price = mysqli_fetch_array($result_products)) {
                                  $product_price = $row_product_price['product_price'];
                                  $product_title = $row_product_price['product_title'];
                                  $product_image1 = $row_product_price['product_image1'];
                                  $total_price = $product_price * $quantity;
                                  $total += $total_price;
                    ?>
                    <tr>
                        <td><?php echo $product_id ?></td>
                        <td><?php echo $product_title ?></td>
                        <td class="cart_image"><img class="card-img-top w-50 h-50" src="..\admin_area\product_images\<?php echo $product_image1 ?>" alt=""></td>
                        <td><input type="text" 
                        
                        name="qty[<?php echo $product_id ?>]" value="<?php echo $quantity ?>" class="form-input w-50"></td>
                        <td>₹<?php echo $product_price ?>/-</td>
                        <td><div class="form-check"><input class="form-check-input" type="checkbox" name="remove[]" value="<?php echo $product_id ?>"></div></td>
                        <td class="button-container border-0" style="display: flex;">
                             <input type="submit" value="Update cart" class="btn bg-info px-3 py-2 border-0 mx-3" name="update_cart">
                             <button class="btn bg-info px-3 py-2 border-0 mx-3" type="submit" name="remove_cart">Delete</button>
                        </td>
                    </tr>
                    <?php
                              }
                          }
                    ?>
                </tbody>
            </table>
            <div class="d-flex mb-4 mt-3">
                <h4 class="px-3">Subtotal: <strong class="text-info">₹<?php echo $total; ?>/-</strong></h4>
                <button class="btn btn-info mr-4"><a href="index.php" class="text-light text-decoration-none">Continue shopping</a></button>
                <?php 
                if($total > 0){
                echo "<button class='btn btn-info'><a href='checkout.php' class='text-light text-decoration-none'>Checkout</a></button>";
                }
                ?>
            </div>
        </div>
    </div>
    </form>

    <?php
    // Update Cart
    if (isset($_POST['update_cart'])) {
        foreach ($_POST['qty'] as $product_id => $qty) {
            $update_cart = "UPDATE `cart_details` SET quantity = $qty WHERE ip_address = '$get_ip_add' AND product_id = '$product_id'";
            $run_query = mysqli_query($con, $update_cart);
        }
        // Refresh the page to update the subtotal
        echo "<script>window.open('cart.php', '_self')</script>";
    }
    
    // Remove Items
    if (isset($_POST['remove_cart'])) {
        if (isset($_POST['remove']) && is_array($_POST['remove'])) {
        foreach ($_POST['remove'] as $remove_id) {
            echo $remove_id;
            $delete_product = "DELETE FROM `cart_details` WHERE ip_address = '$get_ip_add' AND product_id = '$remove_id'";
            $run_delete = mysqli_query($con, $delete_product);
            if($run_delete){
            echo "<script>window.open('cart.php', '_self')</script>";
            }
        }
        }
       
    }
    ?>

    <!-- Footer -->
    <div class="bg-info p-3 text-center footer mt-auto">
        <p class="text-light">All Rights Reserved ©- Design by Yasin <?php echo 20; echo date('y'); ?></p>
    </div>
</body>
</html>