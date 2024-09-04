<?php
include('../includes/connect.php');
    if(isset($_POST['brand_title'])){
      $brand_title = $_POST['brand_title'];

      $select_query="SELECT * FROM `brands` WHERE brand_title = '$brand_title'";
      $result_select =mysqli_query($con,$select_query);
      $number=mysqli_num_rows($result_select);
      if($number>0){
        echo "<script>alert('Brand `$brand_title` has been All redy Exist')
        window.location.href = 'index.php?insert_brand';
        </script>";
      }else{
      $query="INSERT INTO `brands`(brand_title) VALUES ('$brand_title') ";
      $result=mysqli_query($con, $query);
      if($result){
        echo "<script>alert('`$brand_title` Added Succesfully')
        window.location.href = 'index.php?insert_brand';
        </script>";
      }
    }
    }
?>
<h2 class="text-center">Insert Brands</h2>
<form action="" method="post" class="mb-2">
    <div class="input-group w-90 mb-2">
        <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt fa-flip"></i></span>
        <input type="text" class="form-control" name="brand_title" placeholder="Insert Brands" aria-label="brands"
            aria-describedby="basic-addon1">
    </div>
    <div class="input-group w-10 mb-2 m-auto">
        <!-- <input type="submit" class="form-control bg-info"
name="insert_cat" value="Insert brands"> -->
        <button class="btn btn bg-info p-2 my-1 border-0 text-light">Insert Brands</button>
    </div>
</form>