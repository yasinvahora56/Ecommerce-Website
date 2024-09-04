<?php
include('../includes/connect.php');
include('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cart Details</title>
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
        <h1 class="text-center">User Ragistration</h1>
        <form action="" method="post" enctype="multipart/form-data">

            <!-- username -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-lable" style="font-family:inherit; margin-top:2%">Enter Username<font color="red" ;>*</font></label>
                <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" autocomplete="off">
            </div>

            <!-- email -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_email" class="form-lable" style="font-family:inherit; margin-top:4%">Enter Email<font color="red" ;>*</font></label>
                <input type="email" name="email" id="user_email" class="form-control" placeholder="Enter Your email here" autocomplete="off">
            </div>


            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto mt-4">
                <label for="user_image" class="form-lable" style="font-family:inherit; margin-top:4%">Select image 1<font color="red" ;>*</font></label>
                <input class="form-control align-center" type="file" id="user_image" name="user_image" required>
            </div>

            <!-- Password -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="password" class="form-lable" style="font-family:inherit; margin-top:2%">Enter Password<font color="red" ;>*</font></label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password" autocomplete="off">
            </div>

            <!-- Conform Password -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="con_password" class="form-lable" style="font-family:inherit; margin-top:2%">Confrom Password<font color="red" ;>*</font></label>
                <input type="password" name="con_password" id="con_password" class="form-control" placeholder="Conform Password" autocomplete="off">
            </div>

            <!-- Address -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="address" class="form-lable" style="font-family:inherit; margin-top:2%">Enter Address<font color="red" ;>*</font></label>
                <textarea type="text" name="address" class="form-control" id="address" rows="3" autocomplete="off" placeholder="Enter Address"></textarea>
            </div>

            <!-- Mobile Number -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="user_contact" class="form-lable" style="font-family:inherit; margin-top:2%">Mobile No.<font color="red" ;>*</font></label>
                <input type="text" name="user_contact" id="user_contact" class="form-control" placeholder="Enter Mobile" autocomplete="off">
            </div>

            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="Register" class="btn btn-info" style="font-family:inherit; margin-top:4%; margin-bottom:4%;" value="Register">
                <font class="ml-2"><b>Alredy Registered?</b><a href="user_login.php" class="text-danger "><b> Login</b></a></font>
            </div>

        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['Register'])) {
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $user_email = mysqli_real_escape_string($con, $_POST['email']);
    $user_password = $_POST['password'];
    $con_password = $_POST['con_password'];
    $user_address = mysqli_real_escape_string($con, $_POST['address']);
    $user_contact = mysqli_real_escape_string($con, $_POST['user_contact']);
    $user_image = $_FILES['user_image']['name'];
    $user_image_tmp = $_FILES['user_image']['tmp_name'];
    $user_ip = getIPAddress();

    // Check for duplicate email
    $dup_select_query = "SELECT * FROM `user_table` WHERE username = '$username'";
    $dup_run_query = mysqli_query($con, $dup_select_query);
    $dup_result = mysqli_num_rows($dup_run_query);

    if ($dup_result > 0) {
        echo "<script>alert('Username Already Exist')</script>";
    } else if ($con_password != $user_password) {
        echo "<script>alert('Passwords Do Not Match')</script>";
    } else {
        // Hash the password
        $hash_password = password_hash($user_password, PASSWORD_DEFAULT);
        
        // Insert query
        $recive_query = "INSERT INTO `user_table` (username, user_email, user_password, user_image, user_ip, user_address, user_mobile) VALUES ('$username', '$user_email', '$hash_password', '$user_image', '$user_ip', '$user_address', '$user_contact')";
        
        // Move the uploaded image
        move_uploaded_file($user_image_tmp, './user_images/' . $user_image);
        
        // Execute the query
        $reg_run_query = mysqli_query($con, $recive_query);
        
        if ($reg_run_query) {
            echo "<script>alert('Registered Successfully Now you can Login')</script>";
            echo "<script>window.open('user_login.php', '_self')</script>";
        } else {
            // Error handling
            echo "<script>alert('Registration Failed. Please try again.')</script>";
            echo "Error: " . mysqli_error($con); // This will print the exact SQL error
        }
    }
}
?>
