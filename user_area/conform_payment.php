<?php
include('../includes/connect.php');
include_once('../functions/common_function.php');
session_start();
if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $query = "SELECT * FROM `user_orders` WHERE order_id = $order_id";
    $run_query = mysqli_query($con, $query);
    $row_fetch = mysqli_fetch_assoc($run_query);
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}
if(isset($_POST['Conform_Payment'])){
    $invoice_number = $_POST['invoice_number'];
    $amount = $_POST['amount'];
    $payment_Mode = $_POST['payment_Mode'];
    $inser_query = "INSERT INTO `user_payments`(`order_id`, `invoice_number`, `amount`, `payment_mode`) VALUES ($order_id, $invoice_number, $amount, '$payment_Mode')";
    $run_query = mysqli_query($con, $inser_query);
    if($run_query){
        echo "<h3>Conform</h3>";
        echo "<script>window.open('profile.php?my_orders','_self')</script>";
    }
    $update_query = "UPDATE `user_orders` SET order_status = 'Complate' WHERE order_id =$order_id";
    $run_update_query = mysqli_query($con, $update_query);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirm Payment</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <!-- Bootstrap link-->
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <!-- Font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap JS-->
    <script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style>
        label {
            margin-top: 5%;
        }
        .btn {
            margin-left: 25%;
            margin-top : 4%;
        }
    </style>
</head>

<body class="bg-dark">
    <div class="container w-50 m-auto text-light">
        <h1 class="mt-4 mb-3 text-center">Add Payment</h1>
        <form action="" method="post">
            <div class="form-group w-50 m-auto">
                <label for="invoice_number">Invoice Number</label>
                <input type="text" class="form-control" id="invoice_number" placeholder="Invoice Number" value="<?php echo $invoice_number; ?>" name="invoice_number">
            </div>
            <div class="form-group w-50 m-auto">
                <label for="amount">Amount</label>
                <input type="text" class="form-control" id="amount" placeholder="amount" value="<?php echo $amount_due; ?>" name="amount">
            </div>
            <div class="form-group w-50 m-auto">
                <label for="payment_Mode">Select Payment Method</label>
                <select class="form-control" id="payment_Mode" name="payment_Mode">
                    <option disabled selected>Select Payment Method</option>
                    <option>UPI</option>
                    <option>Net Banking</option>
                    <option>Paypal</option>
                    <option>Cash On Delivary</option>
                    <option>PayOffline</option>
                </select>
            </div>
            <input type="submit" class="btn btn-primary py-2 px-2" value="Confirm" name="Conform_Payment">
        </form>
        
    </div>
</body>

</html>