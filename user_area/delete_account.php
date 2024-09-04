<!DOCTYPE html>
<html lang="en">
<head>
    
</head>
<body>
    <!-- PHP code to check if form was submitted -->
    <?php

    if (isset($_POST['delete'])) {
        $username = $_SESSION['uname'];
        $username = mysqli_real_escape_string($con, $username);
        $sql = "DELETE FROM `user_table` WHERE username = '$username'";
        $run_sql = mysqli_query($con, $sql);
        if ($run_sql) {
            echo '<div class="alert alert-success text-center">Account deleted successfully.</div>';
            echo "<script>window.open('../logout/user_logout.php','_self')</script>";
        }
    }
    if(isset($_POST['dont_delete'])){
        echo "<script>window.open('../includes/index.php','_self')</script>";
    }
    ?>
    
    <form id="delete-form" method="post" style="margin-left: -40%; margin-top:20%;">
        <h1 class="text-danger mt-5 text-center" style="margin-top:-20%;">Delete Account !!</h1>
        <div class="form-group m-auto text-center">
            <input class="btn btn-light w-50 mt-3 mb-2" type="button" value="Delete Account" onclick="confirmDeletion()" style="border: 1px solid #ccc;">
        </div>
        <div class="form-group m-auto text-center">
            <input type="submit" class="btn btn-light w-50" name="dont_delete" value="Don't Delete Account"  style="border: 1px solid #ccc;">
        </div>
    </form>

    <script>
        function confirmDeletion() {
            if (confirm("Are you sure you want to delete your account?")) {
                document.getElementById('delete-form').innerHTML += '<input type="hidden" name="delete">';
                document.getElementById('delete-form').submit();
            }
        }
    </script>
</body>
</html>
