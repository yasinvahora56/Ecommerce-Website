<?php
include('../includes/connect.php');
include('../functions/common_function.php');

if (isset($_POST['admin_login'])) {
    $admin_pass = $_POST['admin_pass'];
    $admin_email = $_POST['admin_email'];
    
    // Query to check if email and password are correct
    $insert_query = "SELECT * FROM `admin_table` WHERE admin_email = '$admin_email' AND admin_password = '$admin_pass'";
    $run_query = mysqli_query($con, $insert_query);
    $row_data = mysqli_fetch_assoc($run_query);
    
    if ($row_data) {
        if ($admin_pass == $row_data['admin_password']) {
            echo "<script>alert('Login Successful'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Invalid Password');</script>";
        }
    } else {
        echo "<script>alert('No user found with this email');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="../bootstrap-4.4.1/css/bootstrap.min.css">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Bootstrap JS -->
    <script type="text/javascript" src="../bootstrap-4.4.1/js/jquery_latest.js"></script>
    <script type="text/javascript" src="../bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(to right, #e2e2e2, #ffffff);
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin-top: 50px;
        }

        .form-control:focus {
            border-color: #0056b3;
            box-shadow: 0 0 0 0.2rem rgba(38, 143, 255, 0.25);
        }

        .btn-info {
            background-color: #0056b3;
            border-color: #0056b3;
            color: #fff;
            font-weight: 600;
            transition: background-color 0.3s, border-color 0.3s;
        }

        .btn-info:hover {
            background-color: #004494;
            border-color: #003377;
        }

        .img-container img {
            width: 100%;
            border-radius: 15px;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: 600;
            color: #555;
        }

        .form-group input {
            border-radius: 8px;
            border: 1px solid #ced4da;
            padding: 12px;
            font-size: 1rem;
        }

        .form-group input::placeholder {
            color: #aaa;
        }

        h1 {
            font-size: 2.5rem;
            font-weight: 700;
            color: #333;
            margin-bottom: 30px;
        }

        .footer {
            background-color: #0056b3;
            color: #fff;
            padding: 15px;
            position: absolute;
            width: 100%;
            bottom: 0;
        }

        .footer p {
            margin: 0;
        }

        @media (max-width: 768px) {
            .row {
                flex-direction: column;
            }

            .img-container,
            .form-container {
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <h1 class="text-center">Admin Login</h1>
        <div class="row">
            <div class="col-lg-6 img-container">
                <img src="../images/admin_login.jpg" alt="Admin Login Image">
            </div>
            <div class="col-lg-6">
                <div class="form-container">
                    <form method="POST">
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="admin_email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="admin_pass">Password</label>
                            <input type="password" name="admin_pass" class="form-control" id="admin_pass" placeholder="Enter Password" required>
                        </div>
                        <button type="submit" class="btn btn-info" name="admin_login">Login</button>
                        <p class="mt-3">Don't have an account? <a href="admin_registration.php" class="font-weight-bold">Register</a></p>
                        
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer text-center">
        <p>All Rights Reserved ©- Design by Yasin <?php echo date("Y"); ?></p>
    </div>
</body>

</html>