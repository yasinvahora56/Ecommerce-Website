<?php
if(isset($_GET['edit_account'])){
    $username_session = $_SESSION['uname'];
    $select_query = "SELECT * FROM `user_table` WHERE username = '$username_session'";
    $run_select_query = mysqli_query($con, $select_query);
    $fetch_row = mysqli_fetch_assoc($run_select_query);

    if($fetch_row) {
        $user_id = $fetch_row['user_id'];
        $username = $fetch_row['username'];
        $user_email = $fetch_row['user_email'];
        $user_address = $fetch_row['user_address'];
        $user_mobile = $fetch_row['user_mobile'];
        $user_image = $fetch_row['user_image'];
    } else {
        echo "User not found.";
        exit();
    }

    if(isset($_POST['Update_button'])){
        $update_id = $user_id;
        $user_username = mysqli_real_escape_string($con, $_POST['user_username'] ?? $username);
        $user_email = mysqli_real_escape_string($con, $_POST['user_email'] ?? $user_email);
        $user_address = mysqli_real_escape_string($con, $_POST['user_address'] ?? $user_address);
        $user_mobile = mysqli_real_escape_string($con, $_POST['user_mobile'] ?? $user_mobile);

        // Handle image update
        if(isset($_FILES['user_image']['name']) && $_FILES['user_image']['name'] != ""){
            $user_image = mysqli_real_escape_string($con, $_FILES['user_image']['name']);
            $user_image_tmp = $_FILES['user_image']['tmp_name'];
            move_uploaded_file($user_image_tmp,"./user_images/$user_image");
        } else {
            // If no new image, keep the old one
            $user_image = mysqli_real_escape_string($con, $user_image);
        }

        $update_query = "UPDATE `user_table` SET username= '$user_username', user_email= '$user_email', user_image='$user_image', user_address='$user_address', user_mobile='$user_mobile' WHERE user_id = $update_id";
        $run_update_query = mysqli_query($con, $update_query);

        if($run_update_query){
            echo "<script>alert('Account Updated Successfully')</script>";
            echo "<script>window.location.href='../logout/user_logout.php'</script>";
        } else {
            echo "<script>alert('Failed to update account: " . mysqli_error($con) . "')</script>";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Your Account</title>
    <style>
        .get_image{
            width: 50px;
            object-fit: contain;
        }
    </style>
</head>
<body>
    <h2 class="mt-4">Edit Your Account</h2>
    <form action="" method="post" class="p-0" enctype="multipart/form-data">
        <div class="form-outline mb-4 mt-1">
            <input type="text" class="mt-4" value="<?php echo $username; ?>" style="width: 100%; padding:5px; margin-left:-30%;" name="user_username">
        </div>
        <div class="form-outline mb-4">
            <input type="email" class="" value="<?php echo $user_email; ?>" style="width: 100%; padding:5px; margin-left:-30%;" name="user_email">
        </div>
        <div class="form-outline mt-5 d-flex">
            <input type="file" class="" style="width: 70%; margin-left:-30%;" name="user_image">
            <img src="./user_images/<?php echo $user_image; ?>" alt="" class="p-1 border" name="get_image" style="width: 30%; height: 30%";>
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="" value="<?php echo $user_address; ?>" style="width: 100%; padding:5px; margin-left:-30%;" name="user_address">
        </div>
        <div class="form-outline mb-4">
            <input type="text" class="" value="<?php echo $user_mobile; ?>"  style="width: 100%; padding:5px; margin-left:-30%;" name="user_mobile">
        </div>
        <input type="submit" class="py-2 px-3 bg-info border-0 text-light" style="margin-left:-30%;" value="Update" name="Update_button">
    </form>
</body>
</html>