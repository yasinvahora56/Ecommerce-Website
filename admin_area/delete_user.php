
<?php
if(isset($_GET['delete_user'])){
    $delete_id = $_GET['delete_user'];
    $delete_query = "DELETE FROM `user_table` WHERE user_id = $delete_id";
    $delete_query = "SELECT username FROM `user_table` WHERE user_id = $delete_id";
    $result = mysqli_query($con, $delete_query);
    $row = mysqli_fetch_assoc($result);
    $username = $row["username"];
    if($result){
        echo "<script>alert('`$username`Deleted Successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";
    }
}
?>