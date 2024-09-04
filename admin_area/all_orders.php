<?php
if (isset($_GET['all_orders'])) {
    $all_order_id = ($_GET['all_orders']);
    $select_query = "SELECT * FROM `user_orders`";
    $result = mysqli_query($con, $select_query);
    $fetch_row = mysqli_num_rows($result);
    echo "<table class='table table-bordered text-nowrap text-center'>
    <thead>
        <tr class='bg-info text-light'>
            <th>SI No</th>
            <th>Invoice Number</th>
            <th>Total Products</th>
            <th>Order Date</th>
            <th>Deo Amount</th>
            <th>Status</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>";
    if ($fetch_row == 0) {
        echo "<h3 class='text-center'>No Products</h3>";
    } else {
        $number = 0;
        while ($row_fetch = mysqli_fetch_assoc($result)) {
            $order_id = $row_fetch['order_id'];
            $user_id = $row_fetch['user_id'];
            $amount_due = $row_fetch['amount_due'];
            $invoice_number = $row_fetch['invoice_number'];
            $total_products = $row_fetch['total_products'];
            $order_date = $row_fetch['order_date'];
            $order_status = $row_fetch['order_status'];
            $number++;
            echo "<tr class='bg-dark text-light'>
            <td>$number</td>
            <td>$invoice_number</td>
            <td>$total_products</td>
            <td>$order_date</td>
            <td>$amount_due</td>
            <td>$order_status</td>
            <td><a href='index.php?delete_products=$order_id'><i class='fa-solid fa-trash' style='color: #ffffff;'></i></a></td>
        </tr>";   
        }
    }
}
?>
<h3 class="text-center">All Orders</h3>
</tbody>
</table>