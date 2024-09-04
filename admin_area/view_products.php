<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <table class="table table-bordered text-center text-nowrap">
        <h3 class="text-center mt-3 mb-3 text-info">All Products</h3>
        <thead class='bg-info text-light mt-2'>
            <tr>
                <th>Number</th>
                <th>product Title</th>
                <th>Product Image</th>
                <th>Product Price</th>
                <th>Total Sold</th>
                <th>Status</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            </thead'>

            <?php
            $number = 0;
            $sql = "select * from `products`";
            $run_sql = mysqli_query($con, $sql);
            while ($row_fetch = mysqli_fetch_assoc($run_sql)) {
                $product_id = $row_fetch['product_id'];
                $product_title = $row_fetch['product_title'];
                $product_image1 = $row_fetch['product_image1'];
                $product_price = $row_fetch['product_price'];
                $status = $row_fetch['status'];
                $number++;
            ?>
        <tbody class='bg-dark text-light'>
            <tr class=''>
                <td><?php echo "$number" ?></td>
                <td><?php echo "$product_title" ?></td>
                <td class='img_box'><?php echo "<img src='./product_images/$product_image1' class='product_img'/>" ?></td>
                <td><?php echo "$product_price" ?></td>
                <td><?php
                    $sql_query = "select * from `orders_pending` where product_id = '$product_id'";
                    $run_sql_query = mysqli_query($con, $sql_query);
                    $row_fet = mysqli_num_rows($run_sql_query);
                    echo "$row_fet";
                    ?></td>
                <td><?php echo "$status" ?></td>
                <td><a href='index.php?edit_products=<?php echo $product_id; ?>' class=''><i class='fas fa-edit fa-lg' style='color: #ffffff;'></i></a></td>
                <td><a href='index.php?delete=<?php echo $product_id; ?>'><i class='fa-solid fa-trash' style='color: #f2f2f2;'></i></a></td>
            </tr>
        </tbody>
    <?php
            }
    ?>

    </table>
</body>

</html>