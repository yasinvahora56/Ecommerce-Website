<?php
include('../includes/connect.php');
    if(isset($_POST['cat_title'])){
      $category_title = $_POST['cat_title'];

      $select_query="SELECT * FROM `categories` WHERE category_title = '$category_title'";
      $result_select =mysqli_query($con,$select_query);
      $number=mysqli_num_rows($result_select);
      if($number>0){
        echo "<script>alert('`$category_title` hasbeen All redy Exist')
        window.location.href = 'index.php?insert_category';
        </script>";
      }else{
      $query="INSERT INTO `categories`(category_title) VALUES ('$category_title') ";
      $result=mysqli_query($con, $query);
      if($result){
        echo "<script>alert('`$category_title` Added Succesfully')
        window.location.href = 'index.php?insert_category';
        </script>";
      }
    }
    }
?>
<h2 class="text-center">Insert Categories</h2>
<form action="" method="post" class="mb-2">
  <div class="input-group w-90 mb-2">
    <span class="input-group-text bg-info" id="basic-addon1"><i class="fa-solid fa-receipt fa-flip"></i></span>
    <input type="text" class="form-control" name="cat_title" placeholder="Insert categories" aria-label="Categories"
    aria-describedby="basic-addon1">
  </div>
  <div class="input-group w-10 mb-2 m-auto">
  <!-- <input type="submit" class="form-control bg-info"
name="insert_cat" value="Insert Categories"> -->
    <button class="btn btn bg-info p-2 my-1 border-0 text-light">Insert Categories</button>
  </div>
</form> 