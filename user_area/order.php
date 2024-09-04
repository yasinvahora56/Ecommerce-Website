<?php
include('../includes/connect.php');
include_once('../functions/common_function.php');

if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}

$get_ip_address = getIPAddress();
$total_price = 0;
$product_id = 0; // Initialize product_id

$cart_query_price = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'";
$result_cart_price = mysqli_query($con, $cart_query_price);
$count_products = mysqli_num_rows($result_cart_price);

// Check if cart is empty
if ($count_products > 0) {
    while($row_price = mysqli_fetch_array($result_cart_price)){
        $product_id = $row_price['product_id'];
        $select_product = "SELECT * FROM `products` WHERE product_id = $product_id";
        $run_price = mysqli_query($con, $select_product);
        while($row_product_price = mysqli_fetch_array($run_price)){
            $product_price = array($row_product_price['product_price']);
            $products_price = array_sum($product_price);
            $total_price += $products_price;
        }
    }

    // Getting quantity from Cart
    $getting_cart = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'";
    $run_cart = mysqli_query($con,$getting_cart);
    $get_item_quantity = mysqli_fetch_array($run_cart);
    $invoice_number = mt_rand();
    $status = 'pending';
    $quantity = $get_item_quantity['quantity'];
    if($quantity == 0){
        $quantity = 2;
    }
    $subtotal = $total_price * $quantity;

    $insert_products = "insert into `user_orders` (user_id, amount_due, invoice_number, total_products, order_date, order_status) values ($user_id, $subtotal, $invoice_number, $count_products, NOW(), '$status')";
    $result_query = mysqli_query($con, $insert_products);
    if($result_query){
        echo "<script>alert('Order Submitted Successfully')</script>";
    }
    echo "<script>window.location.href='profile.php'</script>";

    // pending orders query
    $insert_pending_orders = "insert into `orders_pending` (user_id, invoice_number, product_id, quantity, order_status) values ($user_id, $invoice_number, $product_id, $quantity, '$status')";
    $result_pending_orders = mysqli_query($con, $insert_pending_orders);

    // Delete Products query
    $delete_cart = "DELETE FROM `cart_details` WHERE ip_address = '$get_ip_address'";
    $delete_cart_query = mysqli_query($con, $delete_cart);
} else {
    echo "<script>alert('Your cart is empty!')
    window.open('../includes/cart.php', '_self')</script>";
}
?>