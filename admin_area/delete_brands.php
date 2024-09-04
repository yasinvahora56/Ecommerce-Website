<?php

if(isset($_GET['delete_brands'])){
    $delete_id = $_GET['delete_brands'];
    $select_query = "SELECT * FROM `brands` WHERE brand_id = $delete_id";
    $select_result = mysqli_query($con, $select_query);
    if($select_result){
        $row_fetch = mysqli_fetch_assoc($select_result);
        $brand_title = $row_fetch['brand_title'];
    }
    $delete_query = "DELETE FROM `brands` WHERE brand_id = $delete_id";
    $resulut = mysqli_query($con, $delete_query);
        if($resulut){
            echo "<script>alert('`$brand_title` Deleted Successfully')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
}


?>