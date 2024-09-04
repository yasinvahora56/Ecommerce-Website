<?php
include('../includes/connect.php');
if(isset($_POST['insert_product'])){
    $product_title = $_POST['product_title'];
    $discription = $_POST['discription'];
    $Product_Keywords = $_POST['Product_Keywords'];
    $product_category = $_POST['product_category'];
    $product_brand = $_POST['product_brand'];
    $product_price = $_POST['Product_price'];
    $product_status = true;

    // image access
    $product_image1 = $_FILES['product_image1']['name'];
    $product_image2 = $_FILES['product_image2']['name'];
    $product_image3 = $_FILES['product_image3']['name'];
   
    // access tmp image name
    $temp_image1 = $_FILES['product_image1']['tmp_name'];
    $temp_image2 = $_FILES['product_image2']['tmp_name'];
    $temp_image3 = $_FILES['product_image3']['tmp_name'];


    if($product_title=='' or $discription=='' or $Product_Keywords=='' or  $product_category=='' or $product_brand=='' or $product_price=='' or $product_image1=='' or $product_image2=='' or $product_image3=='' ){
            echo "<script> alert('Please Fill All the Fields')</script>";
    }
    // else{
    //     move_uploaded_file($temp_image1,"./product_images/$product_image1");
    //     move_uploaded_file($temp_image2,"./product_images/$product_image2");
    //     move_uploaded_file($temp_image3,"./product_images/$product_image3");
    // }
    else{
        move_uploaded_file($temp_image1, __DIR__ . '/product_images/' . $product_image1);
        move_uploaded_file($temp_image2, __DIR__ . '/product_images/' . $product_image2);
        move_uploaded_file($temp_image3, __DIR__ . '/product_images/' . $product_image3);
    }
    // inser querys
    $insert_products = "insert into `products`(product_title,product_description,product_keyword,category_id,brand_id,product_image1,product_image2,product_image3,product_price,date,status) values ('$product_title','$discription','$Product_Keywords','$product_category','$product_brand','$product_image1','$product_image2','$product_image3','$product_price',NOW(),'$product_status')";
    $result_query = mysqli_query($con,$insert_products);
    if($result_query){
            echo "<script>alert('Successfully Inserted the Product')</script>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Product Admin Page</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <!-- Bootstrap link-->
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <!-- Font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap JS Link-->
    <script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
</head>

<body class="bg-light">
    <div class="container mt-3">
        <h1 class="text-center">Insert Product</h1>
        <form action="" method="post" enctype="multipart/form-data">

            <!-- Title/name -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="product_title" class="form-lable" style="font-family:inherit; margin-top:2%">Product Name/Titlefont<font color="red";>*</font></label>
                <input type="text" name="product_title" id="product_title" class="form-control" placeholder="Enter Product name here" autocomplete="off">
            </div>

            <!-- discription -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="discription" class="form-lable" style="font-family:inherit; margin-top:4%">Product discription<font color="red";>*</font></label>
                <input type="text" name="discription" id="discription" class="form-control" placeholder="Enter Product discription" autocomplete="off">
            </div>

            <!-- Product Keywords -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product_Keywords" class="form-lable" style="font-family:inherit; margin-top:4%">Product Keywords<font color="red";>*</font></label>
                <input type="text" name="Product_Keywords" id="Product_Keywords" class="form-control" placeholder="Enter Product Keywords" autocomplete="off">
            </div>
            

            <!-- Category -->
            <div class="form-outline mb-4 w-50 m-auto mt-4">
                <select name="product_category" id="" style="margin-top:4%;" class="form-control">
                <option value="">select a Category</option>
            <?php

                $select_query = "SELECT * FROM categories";
                $result_query = mysqli_query($con, $select_query);
                while($row = mysqli_fetch_assoc($result_query)){
                    $category_title = $row['category_title']; 
                    $category_id = $row['category_id'];
                    echo "<option value='$category_id'>$category_title</option>";
                }
                ?>
                </select>
            </div>

            <!-- Select Brands -->
            <div class="form-outline mb-4 w-50 m-auto mt-4">
                <select name="product_brand" id="" style="margin-top:4%;" class="form-control">
                    <option value="">select a Brands</option>
                    <?php

                            $select_query="Select * from `brands`";
                            $result_query=mysqli_query($con, $select_query);
                            while($row=mysqli_fetch_assoc($result_query)) { $brand_title=$row['brand_title'];
                            $brand_id=$row['brand_id'];
                            echo "<option value='$brand_id'>$brand_title</option>";
                            }
                    ?>
                </select>
            </div>

            <!-- Image 1 -->
            <div class="form-outline mb-4 w-50 m-auto mt-4">
                <label for="product_image1" class="form-lable" style="font-family:inherit; margin-top:4%">Select image 1<font color="red";>*</font></label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="product_image1">
                        <label class="custom-file-label" for="product_image1">Choose Product Image</label>
                    </div>
                </div>
            </div>

            <!-- Image 2 -->
            <div class="form-outline mb-4 w-50 m-auto mt-4">
                <label for="product_image2" class="form-lable" style="font-family:inherit; margin-top:4%">Select image 2<font color="red";>*</font></label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="product_image2">
                        <label class="custom-file-label" for="product_image2">Choose Product Image</label>
                    </div>
                </div>
            </div>

                <!-- Image 3 -->
                <div class="form-outline mb-4 w-50 m-auto mt-4">
                <label for="product_image3" class="form-lable" style="font-family:inherit; margin-top:4%">Select image 3<font color="red";>*</font></label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile02" name="product_image3">
                        <label class="custom-file-label" for="product_image3">Choose Product Image</label>
                    </div>
                </div>
            </div>

            <!-- price -->
            <div class="form-outline mb-4 w-50 m-auto">
                <label for="Product_price" class="form-lable" style="font-family:inherit; margin-top:4%">Enter Product Price<font color="red";>*</font></label>
                <input type="text" name="Product_price" id="Product_price" class="form-control" placeholder="Enter Product Price" autocomplete="off">
            </div>
            <div class="form-outline mb-4 w-50 m-auto">
            <input type="submit" name="insert_product" class="btn btn-info" style="font-family:inherit; margin-top:4%; margin-bottom:4%;" value="insert Products">
        </div>
        
        </form>
    </div>
</body>

</html>