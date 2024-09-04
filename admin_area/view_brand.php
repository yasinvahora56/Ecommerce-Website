<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1 class="text-center my-4">Brands</h1>
    <table class="table table-bordered text-center text-nowrap">
        <thead class="bg-info">
        <tr class="text-light">
            <th>No</th>
            <th>Brand</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody class="bg-dark text-light">
        <?php
            
            $number = 0;
            
                $select_query = "SELECT * FROM `brands`";
                $result = mysqli_query($con, $select_query);
                if($result){
                    while($row_fetch = mysqli_fetch_assoc($result)){
                        $brand_id = $row_fetch['brand_id'];
                        $brand_title = $row_fetch['brand_title'];
                    
            $number++;
        ?>
        <tr>
                <td><?php echo $number; ?></td>
                <td><?php echo $brand_title; ?></td>
                <td><a href="index.php?edit_brands=<?php echo $brand_id;?>"><i class="fas fa-edit" style="color: #ffffff;"></i></a></td>
                <td><a href="index.php?delete_brands=<?php echo $brand_id;?>"><i class="fa-solid fa-trash" style="color: #ffffff;"></i></a></td>
            </tr>
            <?php
            }
        }
            ?>
        </tbody>
    </table>
</body>
</html>