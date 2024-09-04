<?php

if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];
    $delete_quary = "DELETE FROM `products` WHERE product_id = $delete_id";
    $result = mysqli_query($con, $delete_quary);
    if ($result){
        echo "<script>alert('Successfully Deleted')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
exit();

?>