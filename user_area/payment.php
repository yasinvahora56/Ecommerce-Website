<?php
include('../includes/connect.php');
include_once('../functions/common_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommers Website</title>
    <meta charset="utf-8" name="viewport" content="width=device-width,intial-scale=1">
    <!-- Bootstrap link-->
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <!-- Font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap JS-->
    <script type="text/javascript" src="../bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <style>
        img {
            width: 100%;
        }
    </style>
</head>

<body>
    <?php
    $user_ip = getIPAddress();
    $get_user = "SELECT * FROM `user_table` WHERE user_ip ='$user_ip'";
    $result = mysqli_query($con, $get_user);
    $run_query = mysqli_fetch_array($result);
    $user_id = $run_query['user_id'];
    ?>

    <div class="col">
        <div class="container">
            <h1 class="text-info mt-5" style="margin-left: 40%;">Payment Option</h1>
            <div class="col-lg-4 mt-5 align-content-center">
                <a href="https://www.paypal.com/in/home" target="_blank"><div class="">
                        <img src="../images/paypal.png" alt="">
                    </div><button class="btn btn-primary mt-2">Paypal Payment</button>
                </a></div>
            <div class="col-md-6" style="margin-left: 50%; margin-top:-19%; margin-bottom:10%">
                <a href="../user_area/order.php?user_id=<?php echo $user_id ?>" class="">
                    <h1>Pay Ofline</h1>
                </a>
            </div>
        </div>
    </div>
    </div>

</body>
</html>