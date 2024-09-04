<div class="container">
    <table class="table table-bordered text-center">
        <thead class="bg-info text-light">
            <tr>
                <th>ID</th>
                <th>Invoice Number</th>
                <th>Amount</th>
                <th>Payment Mode</th>
                <th>Date</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody class="bg-dark text-light">
            <?php
            $select_query = "SELECT * FROM `user_payments`";
            $result = mysqli_query($con, $select_query);
            $number = 1;
            if ($result) {
                while ($row_fetch = mysqli_fetch_assoc($result)) {
                    $payment_id = $row_fetch['payment_id'];
                    $invoice_number = $row_fetch['invoice_number'];
                    $amount = $row_fetch['amount'];
                    $payment_mode = $row_fetch['payment_mode'];
                    $date = $row_fetch['date'];
                    echo "<tr>
                <td>$number</td>
                <td>$invoice_number</td>
                <td>$amount</td>
                <td>$payment_mode</td>
                <td>$date</td>
                <td><a href='index.php?delete_payment=$payment_id'><i class='fa-solid fa-trash' style='color: #ffffff;'></i></a></td>
            </tr>";
                    $number++;
                }
            }
            ?>
        </tbody>
    </table>
</div>