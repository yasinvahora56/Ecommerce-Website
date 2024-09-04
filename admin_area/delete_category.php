<?php


if(isset($_GET['delete_category'])){
    $delete_category = $_GET['delete_category'];
    $select_query = "SELECT * FROM `categories` where category_id = $delete_category";
    $result = mysqli_query ($con, $select_query);
    if($result){
        $row_fetch = mysqli_fetch_assoc($result);
            if($row_fetch){
                $cat_title = $row_fetch['category_title'];

                $delete_cat = "DELETE FROM `categories` WHERE category_id = $delete_category";
                $delete_result = mysqli_query($con, $delete_cat);

                if ($delete_result){
                    echo "<script>alert('Successfully Deleted Category \"$cat_title\"')</script>";
                    echo "<script>window.open('index.php','_self')</script>";
                }
            }
    }        
 
}

?>