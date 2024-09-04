<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Product</h1>
        <form action="" method="post" enctype="multipart/form-data">

            <?php
            if (isset($_GET['edit_products'])) {
                $edit_id = $_GET['edit_products'];
                $sql = "select * from `products` where product_id = $edit_id";
                $run_sql = mysqli_query($con, $sql);
                $row_fetch = mysqli_fetch_assoc($run_sql);
                $product_id = $row_fetch['product_id'];
                $brand_id = $row_fetch['brand_id'];
                $product_title = $row_fetch['product_title'];
                $product_description = $row_fetch['product_description'];
                $category_id = $row_fetch['category_id'];
                $product_keyword = $row_fetch['product_keyword'];
                $product_image1 = $row_fetch['product_image1'];
                $product_image2 = $row_fetch['product_image2'];
                $product_image3 = $row_fetch['product_image3'];
                $product_price = $row_fetch['product_price'];


                $sql_run = "select * from `categories` where category_id = $category_id";
                $run_sql_run = mysqli_query($con, $sql_run);
                $row_fetch_row = mysqli_fetch_assoc($run_sql_run);
                $category_title = $row_fetch_row['category_title'];


                $sql_run_one = "select * from `brands` where brand_id = $brand_id";
                $run_sql_run_one = mysqli_query($con, $sql_run_one);
                $row_fetch_row_one = mysqli_fetch_assoc($run_sql_run_one);
                $brand_title = $row_fetch_row_one['brand_title'];
            }
            ?>

            <!-- Title/name -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-lable" style="font-family:inherit; margin-top:2%">Product Name/Titlefont</label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product name here" autocomplete="off" value="<?php echo $product_title; ?>">
            </div>

            <!-- discription -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_discription" class="form-lable" style="font-family:inherit; margin-top:4%">Product discription</label>
                <input type="text" name="product_discription" id="product_discription" class="form-control" placeholder="Enter Product discription" autocomplete="off" value="<?php echo $product_description; ?>">
            </div>

            <!-- Product Keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product_Keywords" class="form-lable" style="font-family:inherit; margin-top:4%">Product Keywords</label>
                <input type="text" name="Product_Keywords" id="Product_Keywords" class="form-control" placeholder="Enter Product Keywords" autocomplete="off" value="<?php echo $product_keyword; ?>">
            </div>


            <!-- Category -->
            <div class="form-outline w-50 m-auto mt-4">
                <label for="product_category" class="form-lable" style="font-family:inherit; margin-top:4%">Categories</label>
                <select name="product_category" id="product_category" class="form-control">
                    <option value="" disabled selected><?php echo $category_title; ?></option>
                    <?php

                    $select_query = "SELECT * FROM categories";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $category_title = $row['category_title'];
                        $category_id = $row['category_id'];
                        echo "<option value='$category_id'>$category_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Select Brands -->
            <div class="form-outline w-50 m-auto mt-4">
                <label for="product_brands" class="form-lable" style="font-family:inherit; margin-top:4%">Brands</label>
                <select name="product_brands" id="product_brands" class="form-control">
                    <option value="" disabled selected><?php echo $brand_title; ?></option>
                    <?php

                    $select_query = "Select * from `brands`";
                    $result_query = mysqli_query($con, $select_query);
                    while ($row = mysqli_fetch_assoc($result_query)) {
                        $brand_title = $row['brand_title'];
                        $brand_id = $row['brand_id'];
                        echo "<option value='$brand_id'>$brand_title</option>";
                    }
                    ?>
                </select>
            </div>

            <!-- Image 1 -->
            <div class="form-outline w-50 m-auto d-flex">
                <label for="get_image1"></label>
                <div class="input-group">
                    <div class="custom-file mt-5">
                        <input type="file" class="" style="width: 70%; margin-left:1%;" name="user_image1">
                    </div>
                    <img src="./product_images/<?php echo $product_image1; ?>" alt="" class="p-1 border mt-5" name="get_image1" style="width: 40%;" ;>
                </div>

            </div>

            <!-- Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto mt-4">
                <div class="input-group">
                    <div class="custom-file mt-5">
                        <input type="file" class="" style="width: 70%; margin-left:1%;" name="user_image2">
                    </div>
                    <img src="./product_images/<?php echo $product_image2; ?>" alt="" class="p-1 border mt-5" name="get_image2" style="width: 40%;" ;>
                </div>
            </div>

            <!-- Image 3 -->
            <div class="form-outline mb-4 w-50 m-auto mt-4">
                <div class="input-group">
                    <div class="custom-file mt-5">
                        <input type="file" class="" style="width: 70%; margin-left:1%;" name="user_image3">
                    </div>
                    <img src="./product_images/<?php echo $product_image3; ?>" alt="" class="p-1 border mt-5" name="get_image3" style="width: 40%;" ;>
                </div>
            </div>

            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product_price" class="form-lable" style="font-family:inherit; margin-top:4%">Enter Product Price</label>
                <input type="text" name="Product_price" id="Product_price" class="form-control" value="<?php echo $product_price; ?>" autocomplete="off">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
                <input type="submit" name="update_products" class="btn btn-info" style="font-family:inherit; margin-top:4%; margin-bottom:4%;" value="insert Products">
            </div>

        </form>
    </div>
</body>

</html>

<?php

if (isset($_POST['update_products'])) {
    $product_title = $_POST['product_title'];
    $product_discription = $_POST['product_discription'];
    $Product_Keywords = $_POST['Product_Keywords'];
    $product_category = $_POST['product_category'];
    $product_brands = $_POST['product_brands'];
    $Product_price = $_POST['Product_price'];

    $product_image1 = $_FILES['user_image1']['name'];
    $product_image2 = $_FILES['user_image2']['name'];
    $product_image3 = $_FILES['user_image3']['name'];

    $tmp_image1 = $_FILES['user_image1']['tmp_name'];
    $tmp_image2 = $_FILES['user_image2']['tmp_name'];
    $tmp_image3 = $_FILES['user_image3']['tmp_name'];


    if ($product_title == '' || $product_discription == '' || $Product_Keywords == '' || $product_category == '' || $product_brands == '' || $Product_price == '') {

        echo "<script>alert('please fill all fields')</script>";
    } else {
        $update_quary = "UPDATE `products` SET product_title = '$product_title', product_description = '$product_discription', product_keyword = '$Product_Keywords', category_id = '$product_category', brand_id = '$product_brands', product_image1 = '$product_image1', product_image2 = '$product_image2', product_image3 = '$product_image3', product_price = '$Product_price', date=NOW() WHERE product_id = $edit_id";
        $run_quary = mysqli_query($con, $update_quary);

        if ($run_quary) {
            echo "<script>alert('Successfully Updated')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }

        move_uploaded_file($tmp_image1, "./product_images/$product_image1");
        move_uploaded_file($tmp_image2, "./product_images/$product_image2");
        move_uploaded_file($tmp_image3, "./product_images/$product_image3");
    }
}



?>