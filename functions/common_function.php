<?php

include_once('../includes/connect.php');

?>
<?php
function gettingproducts()
{
    global $con;
    if (!isset($_GET['category'])) {
        if (!isset($_GET['brand'])) {
            $select_query = "select * from `products` order by rand() limit 0,9";
            $result_query = mysqli_query($con, $select_query);
            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_keyword = $row['product_keyword'];
                $product_image1 = $row['product_image1'];
                $product_price = $row['product_price'];
                $category_id = $row['category_id'];
                $brand_id = $row['brand_id'];
                echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='../admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text text-truncate'style='max-width: 200px;'>$product_description</p>
                            <p class='card-text'>Price: ₹$product_price/-</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart <i class='fa-solid fa-cart-shopping'></i></a>
                            <a href='product_detail.php?product_id=$product_id' class='btn btn-dark'>View More</a>
                        </div>
                    </div>
                </div>";
            }
        }
    }
}

// Display for the get unique id
function get_unique_categories()
{
    global $con;
    if (isset($_GET['category'])) {
        $category_id = $_GET['category'];
        $select_query = "select * from `products` where category_id = $category_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-center text-danger'>No service available for this categories</h2>";
        }
        //  echo $row['product_title'];
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_keyword = $row['product_keyword'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='../admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text text-truncate'style='max-width: 200px;'>$product_description</p>
                                <p class='card-text'>$product_price</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart <i class='fa-solid fa-cart-shopping'></i></a>
                                <a href='product_detail.php?product_id=$product_id' class='btn btn-dark'>View More</a>
                            </div>
                        </div>
                    </div>";
        }
    }
}


// get unique id brands
function get_unique_brand()
{
    global $con;
    if (isset($_GET['brand'])) {
        $brand_id = $_GET['brand'];
        $select_query = "select * from `products` where brand_id = $brand_id";
        $result_query = mysqli_query($con, $select_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-danger text-center'>No Product Available for this Brand Now!!!!</h2>";
        }
        //  echo $row['product_title'];
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_keyword = $row['product_keyword'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='../admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text text-truncate'style='max-width: 200px;'>$product_description</p>
                                <p class='card-text'>$product_price</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart <i class='fa-solid fa-cart-shopping'></i></a>
                                <a href='product_detail.php?product_id=$product_id' class='btn btn-dark'>View More</a>
                            </div>
                        </div>
                    </div>";
        }
    }
}

// displaying Brands
function getbrands()
{
    global $con;
    $select_brands = "SELECT * FROM brands";
    $result_brands = mysqli_query($con, $select_brands);
    while ($row_data = mysqli_fetch_assoc($result_brands)) {
        $brand_title = $row_data['brand_title'];
        $brand_id = $row_data['brand_id'];
        echo "<li class='nav-item'>
                <a href='index.php?brand=$brand_id' class = 'nav-link text-light border'><font class='text-uppercase'><b>$brand_title</b></font></a>
            </li>";
    }
}

// displayin categories
function getcategories()
{
    global $con;
    $select_categories = "SELECT * FROM categories";
    $result_categories = mysqli_query($con, $select_categories);
    while ($row_data = mysqli_fetch_assoc($result_categories)) {
        $category_title = $row_data['category_title'];
        $category_id = $row_data['category_id'];
        echo "<li class='nav-item'>
                <a href='index.php?brand=$category_id' class = 'nav-link text-light border'><font class='text-uppercase'><b>$category_title</b></font></a>
            </li>";
    }
}


function search_product()
{
    global $con;
    if (isset($_GET['search_data_product'])) {
        $search_data_value = $_GET['search_data'];
        $search_query = "select * from `products` where product_keyword like '%$search_data_value%'";
        $result_query = mysqli_query($con, $search_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows == 0) {
            echo "<h2 class='text-danger' text-center>Sorry, We Can't Match any product on this Keyword!!!<h2>";
        }
        while ($row = mysqli_fetch_assoc($result_query)) {
            $product_id = $row['product_id'];
            $product_title = $row['product_title'];
            $product_description = $row['product_description'];
            $product_keyword = $row['product_keyword'];
            $product_image1 = $row['product_image1'];
            $product_price = $row['product_price'];
            $category_id = $row['category_id'];
            $brand_id = $row['brand_id'];
            echo "<div class='col-md-4 mb-2'>
                    <div class='card'>
                        <img src='../admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                        <div class='card-body'>
                            <h5 class='card-title'>$product_title</h5>
                            <p class='card-text text-truncate'style='max-width: 200px;'>$product_description</p>
                            <p class='card-text'>$product_price</p>
                            <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart <i class='fa-solid fa-cart-shopping'></i></a>
                            <a href='product_detail.php?product_id=$product_id' class='btn btn-dark'>View More</a>
                        </div>
                    </div>
                </div>";
        }
    }
}
//view detail function
// function view_detail()
// {
//     global $con;
//     if (isset($_GET['product_id'])) {
//         if (!isset($_GET['category'])) {
//             if (!isset($_GET['brand'])) {
//                 $product_id = $_GET['product_id'];
//                 $select_query = "select * from `products` where product_id = $product_id";
//                 $result_query = mysqli_query($con, $select_query);
//                 //  echo $row['product_title'];
//                 while ($row = mysqli_fetch_assoc($result_query)) {
//                     $product_id = $row['product_id'];
//                     $product_title = $row['product_title'];
//                     $product_description = $row['product_description'];
//                     $product_keyword = $row['product_keyword'];
//                     $product_image1 = $row['product_image1'];
//                     $product_image2 = $row['product_image2'];
//                     $product_image3 = $row['product_image3'];
//                     $product_price = $row['product_price'];
//                     $category_id = $row['category_id'];
//                     $brand_id = $row['brand_id'];
//                     echo "<div class='col-md-4 mb-2'>
//                     <div class='card'>
//                         <img src='../admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
//                         <div class='card-body'>
//                             <h5 class='card-title'>$product_title</h5>
//                             <p class='card-text text-truncate'style='max-width: 200px;'>$product_description</p>
//                             <p class='card-text'>Price: ₹$product_price/-</p>
//                             <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart <i class='fa-solid fa-cart-shopping'></i></a>
//                             <a href='index.php' class='btn btn-dark'>Go Home</a>
//                         </div>
//                     </div>
//                 </div>
//                  <div class='col-md-8'>
//                 <div class='row'>
//                     <div class='col-md-12'>
//                         <h4 class='text-info text-center mb-5'>Releted Products</h4>
//                     </div>
//                     <div class='col-md-6'>
//                     <img src='../admin_area/product_images/$product_image2' class='card-img-top img-thumbnail float-left' alt='$product_title'>
//                     </div>
//                     <div class='col-md-6'>
//                     <img src='../admin_area/product_images/$product_image3' class='card-img-top img-thumbnail float-left' alt='$product_title'>
//                     </div>


//                 </div>
//             </div>";
//                 }
//             }
//         }
//     }
// }
function view_detail()
{
    global $con;
    if (isset($_GET['product_id'])) {
        if (!isset($_GET['category']) && !isset($_GET['brand'])) {
            $product_id = $_GET['product_id'];
            $select_query = "SELECT * FROM `products` WHERE product_id = $product_id";
            $result_query = mysqli_query($con, $select_query);

            while ($row = mysqli_fetch_assoc($result_query)) {
                $product_id = $row['product_id'];
                $product_title = $row['product_title'];
                $product_description = $row['product_description'];
                $product_image1 = trim($row['product_image1']);
                $product_image2 = trim($row['product_image2']);
                $product_image3 = trim($row['product_image3']);
                $product_price = $row['product_price'];

                echo "<div class='col-md-4 mb-2'>
                        <div class='card'>
                            <img src='../admin_area/product_images/$product_image1' class='card-img-top' alt='$product_title'>
                            <div class='card-body'>
                                <h5 class='card-title'>$product_title</h5>
                                <p class='card-text text-truncate' style='max-width: 200px;'>$product_description</p>
                                <p class='card-text'>Price: ₹$product_price/-</p>
                                <a href='index.php?add_to_cart=$product_id' class='btn btn-info'>Add to Cart <i class='fa-solid fa-cart-shopping'></i></a>
                                <a href='index.php' class='btn btn-dark'>Go Home</a>
                            </div>
                        </div>
                    </div>
                    <div class='col-md-8'>
                        <div class='row'>
                            <div class='col-md-12'>
                                <h4 class='text-info text-center mb-5'>Releted Products</h4>
                            </div>
                            <div class='col-md-6'>
                                <img src='../admin_area/product_images/$product_image2' class='card-img-top img-thumbnail float-left' alt='$product_title'>
                            </div>
                            <div class='col-md-6'>
                                <img src='../admin_area/product_images/$product_image3' class='card-img-top img-thumbnail float-left' alt='$product_title'>
                            </div>
                        </div>
                    </div>";
            }
        }
    }
}


// get ip address function 
function getIPAddress()
{
    //whether ip is from the share internet  
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    }
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    //whether ip is from the remote address  
    else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }
    return $ip;
}

function cart()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $add_query = "Select * from `cart_details` where ip_address ='$get_ip_add' and product_id = $get_product_id";
        $result_query = mysqli_query($con, $add_query);
        $num_of_rows = mysqli_num_rows($result_query);
        if ($num_of_rows > 0) {
            echo "<script>alert('This product has been Alredy Exist')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        } else {
            $insert_query = "insert into `cart_details` (product_id, ip_address, quantity) values ($get_product_id,'$get_ip_add', 1)";
            $result_query = mysqli_query($con, $insert_query);
            echo "<script>alert('Item Added to Cart')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
}

// function for counting total product number
function cart_detail()
{
    if (isset($_GET['add_to_cart'])) {
        global $con;
        $get_ip_add = getIPAddress();
        $add_query = "Select * from `cart_details` where ip_address ='$get_ip_add'";
        $result_query = mysqli_query($con, $add_query);
        $count_cart_items = mysqli_num_rows($result_query);
    } else {
        global $con;
        $get_ip_add = getIPAddress();
        $add_query = "Select * from `cart_details` where ip_address ='$get_ip_add'";
        $result_query = mysqli_query($con, $add_query);
        $count_cart_items = mysqli_num_rows($result_query);
    }
    echo $count_cart_items;
}

// function for view Total Price
function total_cart_price()
{
    global $con;
    $get_ip_add = getIPAddress();
    $total = 0;
    $cart_query = "select * from `cart_details` where ip_address = '$get_ip_add'";
    $result = mysqli_query($con, $cart_query);
    while ($row = mysqli_fetch_array($result)) {
        $product_id = $row['product_id'];
        $select_product = "select * from `products` where product_id = '$product_id'";
        $result_products = mysqli_query($con, $select_product);
        while ($row_product_price = mysqli_fetch_array($result_products)) {
            $product_price = array($row_product_price['product_price']);
            $product_values = array_sum($product_price);
            $total +=  $product_values;
        }
    }
    echo $total;
}

function get_user_orders_details()
{
    global $con;
    $username = $_SESSION['uname'];
    $sql = "select * from `user_table` where username = '$username'";
    $run_sql = mysqli_query($con, $sql);
    while ($row_query = mysqli_fetch_array($run_sql)) {
        $user_id = $row_query['user_id'];
        if (!isset($_GET['edit_account'])) {
            if (!isset($_GET['my_orders'])) {
                if (!isset($_GET['delete_account'])) {
                    $get_orders = "select * from `user_orders` where user_id = $user_id and order_status = 'pending'";
                    $run_get_orders = mysqli_query($con, $get_orders);
                    $row_count = mysqli_num_rows($run_get_orders);
                    if($row_count>0){
                        echo "<h2 class = 'text-info' style='margin-top:10%';>You have a <span class = 'text-danger'><b> $row_count </b></span>Pending Order</h2>";
                        echo "<p style='margin-top:2%; margin-left:25%;'><a href='profile.php?my_orders' class='text-dark'>My Orders</a></p>";
                    }else{
                        echo "<h2 class = 'text-info' style='margin-top:10%';>You have a 0 Pending Order</h2>";
                        echo "<p text-center><a href='../includes/index.php' class='text-dark' style='margin-left:20%; margin-top:10%; width:40%; height:30%'>Explore Products</a></p>";
                    }
                }
            }
        }
    }
}



?>