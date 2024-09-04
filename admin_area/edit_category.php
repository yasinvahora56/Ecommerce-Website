<?php

if (isset($_GET['edit_category'])) {
    $cat_id = $_GET['edit_category'];
    $select_query = "SELECT * FROM `categories` WHERE category_id = $cat_id";
    $result = mysqli_query($con, $select_query);
    $fetch_row = mysqli_fetch_assoc($result);
    $cat_title = $fetch_row['category_title'];
}
if (empty($_POST['categorie_title'])) {
    echo "<script>alert('Please Fill Categorie')</script>";
} else {
    if (isset($_POST['update_button']) && isset($_POST['categorie_title']) && !empty($_POST['categorie_title'])) {
        $cat_tit = $_POST['categorie_title'];
        $update_quary = "UPDATE `categories` SET category_title ='$cat_tit' WHERE category_id = $cat_id";
        $update_result = mysqli_query($con, $update_quary);
        if ($update_result) {
            echo "<script>alert('Categorie `$cat_tit` Updated Succefully')</script>";
            echo "<script>window.open('index.php?view_category.php','_self')</script>";
        }
    }
}

?>
<h1 class='text-center'>Update Categories</h1>
<form action='' method='post'>
    <div class='input-group w-90 mb-2 mt-4'>
        <input type='text' class='form-control' name='categorie_title' value='<?php echo $cat_title; ?>'>
    </div>
    <input type="submit" name="update_button" value="Update Category" class="btn btn-info">
</form>

<!-- <h1 class='text-center'>Update Categories</h1>
<form action='' method='post'>
    <div class='input-group w-90 mb-2 mt-4'>
        <input type='text' class='form-control' name='categorie_title' value='<?php echo htmlspecialchars($cat_title); ?>'>
    </div>
    <input type="submit" name="update_button" value="Update Category" class="btn btn-info">
</form> -->