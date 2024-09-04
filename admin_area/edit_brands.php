<?php
if (isset($_GET['edit_brands'])) {
    $edit_brand = $_GET['edit_brands'];
    $select_query = "SELECT * FROM `brands` WHERE brand_id = $edit_brand";
    $result = mysqli_query($con, $select_query);
    if ($result) {
        $row_fetch = mysqli_fetch_assoc($result);
        $brand_id = $row_fetch['brand_id'];
        $brand_title = $row_fetch['brand_title'];
    }
}
if (isset($_POST['update_button']) && isset($_POST['brand_title'])) {
    $brand_tit = $_POST['brand_title'];
    if ($_POST['brand_title'] = '') {
        echo "<script>alert('Fill Brand')</script>";
    } else {
        $update_query = "UPDATE `brands` SET brand_title = '$brand_tit' WHERE brand_id = $edit_brand";
         $resulut = mysqli_query($con, $update_query);
        if ($resulut) {
            echo "<script>alert('Brand Updated Successfully `$brand_title` as a `$brand_tit`')</script>";
            echo "<script>window.open('index.php', '_self')</script>";
        }
    }
}

?>

<div class="container m-auto">
    <h1 class="text-center">Edit Brand</h1>
    <form action="" class=" mt-4" method="post">
        <div class="m-auto">
            <label for="" class="" style="margin-left:25%;">Update Brand</label>
            <input type='text' class='form-control w-50 m-auto' name='brand_title' value='<?php echo $brand_title; ?>'>
        </div>
        <div style="margin-left: 25%; margin-top:1%">
            <input type="submit" name="update_button" value="Update Brands" class="btn btn-info">
        </div>
    </form>
</div>