<?php
include('../includes/connect.php');
include_once('../functions/common_function.php');
session_start();

// Ensure the user is logged in
// if (!isset($_SESSION['username'])) {
//     // Redirect to login page if the user is not logged in
//     header("Location: user_login.php");
//     exit();
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommers Website Using PHP and Mysqli</title>
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
        .card-body{
            height: auto;
            min-height: 100%;
        }
        img{
            width: 90%;
            border-radius: 50%;
        }
        
    </style>
</head>

<body>
    <div class="container-fluid p-0">
        <!-- Main First Naavbaar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-info">
            <a href="../includes/index.php"><img src="../images/trolly.png" alt="" class="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="../includes/index.php">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Products</a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../includes/cart.php"><i class="fa-solid fa-cart-shopping"></i><sup><?php cart_detail(); ?></sup></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Total Shopping ₹<?php echo total_cart_price(); ?>/-</a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0" method="get" action="../includes/searchdata_product.php">
                    <input class="form-control mr-sm-2"  type="search" placeholder="Search" aria-label="Search" name="search_data">
                    <input type="submit" value="search" class="btn btn-outline-light" name="search_data_product">
                </form>
            </div>
        </nav>
        <!-- Second Navbaar-->
        <nav class="navbar navbar-expand-lg navbar-light bg-dark">
            <ul class="navbar-nav me-auto">
            <!-- <?php
            // $usrer_image = $_FILES['user_image'];
            // $runquery = "select * from `users_table` where user_image = '$usrer_image'";
            // $runqueryw = mysqli_query($con, $runquery);
            // $fetch = mysqli_fetch_array($runqueryw)
            ?> -->
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
                    <a class='nav-link text-light' href='user_login.php'>Login</a>
                </li>";
                }else{
                    echo "<li class='nav-item'>
                    <a class='nav-link text-light' href='../logout/user_logout.php'>Logout</a>
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
    <div class="row">
        <div class="col-md-3 ml-3">
        <ul class="navbar-nav  bg-info text-center mb-4" style="font-size: 20px; height:100vh">
        <h3 class="text-light mt-4">Your Profile</h3>
        <div style="align-items: center;">
            <?php
            // $username = $_SESSION['uname'];
            // $run_query = "SELECT * FROM `user_table` WHERE username = '$username'";
            // $result_image = mysqli_query($con, $run_query);
            // $image_fetch = mysqli_fetch_array($result_image);
            // $user_image = $image_fetch['user_image'];
            // echo "<li><img  src='user_images/$user_image' alt=>
            // </li>"
            if(isset($_SESSION['uname'])){
                $username_session = $_SESSION['uname'];
                $select_query = "SELECT * FROM `user_table` WHERE username = '$username_session'";
                $run_select_query = mysqli_query($con, $select_query);
                $fetch_row = mysqli_fetch_assoc($run_select_query);
    
                if($fetch_row) {
                    $user_image = $fetch_row['user_image'];
                    echo "<img class='mt-2 p-2' src='./user_images/$user_image' alt='User Image' />";
                } else {
                    echo "User not found.";
                }
            }
            ?>
            </div>
        <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?change_profile">Change Profile Picture</a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?pending_orders">Pending Orders</a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?edit_account">Edit Your Account</a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?my_orders">My Orders</a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-light" href="profile.php?delete_account">Delete Account</a>
        </li>
        <li class="nav-item">
        <a class="nav-link text-light" href="logout.php">Logout</a>
        </li>
        </ul>
        </div>
        <div class="col-md-15" style="margin-left: 20%; width:40%; height:30%">
            <?php
                get_user_orders_details();
                if(isset($_GET['edit_account'])){
                    include('edit_account.php');
                }
                if(isset($_GET['my_orders'])){
                    include('my_orders.php');
                }
                if(isset($_GET['delete_account'])){
                    include('delete_account.php');
                }
            ?>
        </div>
    </div>
    
    <!-- Footer -->
    <div class="bg-info p-3 text-center p-0">
        <p class="text-light">All Rights Reserved ©- Design by Yasin <?php echo 20;
                                                                        echo date("y"); ?></p>
    </div>

</body>

</html>