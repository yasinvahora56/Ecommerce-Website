<?php

if(isset($_GET['delete_payment'])){
    $delete_id = $_GET['delete_payment'];
    $delete_query = "DELETE FROM `user_payments` WHERE payment_id = $delete_id";
    $run_delete = mysqli_query($con, $delete_query);
    if($run_delete){
        echo "<script>alert('Payment has been deleted')</script>";
        echo "<script>window.open('index.php?view_payments','_self')</script>";
    }
}
?>