<?php
include('../includes/connect.php');
include_once('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Login</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
    <!-- Bootstrap link-->
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <!-- Font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap JS-->
    <script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">User Login</h1>
        <form action="" method="post" enctype="multipart/form-data">

            <!-- username -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_name" class="form-lable" style="font-family:inherit; margin-top:2%">Enter Username<font color="red" ;>*</font></label>
                <input type="text" name="uname" id="user_name" class="form-control mb-4" placeholder="Enter Username" autocomplete="off">
            </div>

            <!-- Password -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="password" class="form-lable" style="font-family:inherit; margin-top:2%">Enter Password<font color="red" ;>*</font></label>
                <input type="password" name="user_password" id="password" class="form-control" placeholder="Enter Password" autocomplete="off">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="user_login" class="btn btn-info" style="font-family:inherit; margin-top:4%; margin-bottom:4%;" value="login">
                <font class="ml-2"><b>Don't have any Account?</b><a href="../user_area/user_registration.php" class="text-danger "><b> Register</b></a></font>
            </div>
        </form>
    </div>
</body>

</html>

<?php
@session_start(); // Ensure this is at the top of your login script
if (isset($_POST['user_login'])) {
    $user_username = $_POST['uname'];
    $user_password = $_POST['user_password'];
    $select_query = "SELECT * FROM `user_table` WHERE username ='$user_username'";
    $result = mysqli_query($con, $select_query);
    $row_data = mysqli_fetch_assoc($result);
    $user_ip = getIPAddress();
    $select_query_cart = "SELECT * FROM `cart_details` WHERE ip_address ='$user_ip'";
    $select_cart = mysqli_query($con, $select_query_cart);
    $row_count_cart = mysqli_num_rows($select_cart);

    if ($row_data) {
        if (password_verify($user_password, $row_data['user_password'])) {
            $_SESSION['uname'] = $user_username; // This should correctly set the session
            if ($row_count_cart == 0) {
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('profile.php', '_self')</script>";
            } else {
                echo "<script>alert('Login Successful')</script>";
                echo "<script>window.open('../user_area/payment.php', '_self')</script>";
            }
        } else {
            echo "<script>alert('Invalid Credentials')</script>";
        }
    } else {
        echo "<script>alert('Invalid Credentials')</script>";
    }
}
?>