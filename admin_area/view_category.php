<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <table class="table table-bordered text-center text-nowrap">
        <thead class="bg-info text-light">
            <tr>
                <th>No</th>
                <th>Categories</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-dark text-light">
            <?php
                $number = 0;
                
                $select_query = "SELECT * FROM `categories`";
                $result = mysqli_query ($con, $select_query);
                while($row_fetch = mysqli_fetch_assoc($result)){
                    $cat_id = $row_fetch['category_id'];
                    $cat_title = $row_fetch['category_title'];
                    $number++;

            ?>
            <tr>
                <td><?php echo $number; ?></td>
                <td><?php echo $cat_title; ?></td>
                <td><a href="index.php?edit_category=<?php echo $cat_id ?>"><i class="fas fa-edit" style="color: #ffffff;"></i></a></td>
                <td><a href="index.php?delete_category=<?php echo $cat_id; ?>"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></a></td>
            </tr>
            <?php
            }
            
            ?>
        </tbody>
    </table>
</body>

</html>