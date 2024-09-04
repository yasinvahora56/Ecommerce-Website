<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        th,
        td {
            text-align: center;
            vertical-align: middle;
        }

        th {
            white-space: nowrap;
        }
    </style>
</head>

<body>
    <?php
    $username = $_SESSION['uname'];
    $select_query = "select * from `user_table` where username = '$username'";
    $result = mysqli_query($con, $select_query);
    $fetch_deta = mysqli_fetch_assoc($result);
    $user_id = $fetch_deta['user_id'];
    ?>
    <table class="table table-bordered" style="margin-left:-35%; margin-top:15%; width:100%">
        <thead class="bg-info text-center text-light">
            <tr>
                <th>Order Id</th>
                <th>Amount Due</th>
                <th>quantity</th>
                <th>Invoice Number</th>
                <th>Date</th>
                <th>Complate/incomplate</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody class="bg-dark text-light">
            <?php
            $get_order_detail = "select * from `user_orders` where user_id = $user_id";
            $run_detail = mysqli_query($con, $get_order_detail);
            $number = 0;
            while ($fetch_deta = mysqli_fetch_assoc($run_detail)) {
                $order_id = $fetch_deta['order_id'];
                $amount_due = $fetch_deta['amount_due'];
                $total_products = $fetch_deta['total_products'];
                $invoice_number = $fetch_deta['invoice_number'];
                $order_status = $fetch_deta['order_status'];
                if ($order_status == 'pending') {
                    $order_status = 'Incomplete';
                } else {
                    $order_status = 'complate';
                }
                $order_date = $fetch_deta['order_date'];
                
                $number++;
                echo "<tr>
                <td>$number</td>
                <td>$amount_due</td>
                <td>$total_products</td>
                <td>$invoice_number</td>
                <td style='white-space: nowrap'>$order_date</td>
                <td>$order_status</td>";
            ?>
            <?php
                if ($order_status == 'complate') {
                    echo "<td>Paid</td>";
                } else {
                    echo "<td><a href='conform_payment.php?order_id=$order_id' class='text-light'>Confirm</a></td></tr>";
                }
                
            }
            ?>
        </tbody>
    </table>

</body>

</html>