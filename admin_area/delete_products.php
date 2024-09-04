<?php

if(isset($_GET['delete_products'])){
    $delete_id = $_GET['delete_products'];
    $delete_query = "DELETE FROM `user_orders` WHERE order_id = $delete_id";
    $result = mysqli_query($con, $delete_query);
    if($result){
        echo "<script>alert('Order deleted Succefully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
?>