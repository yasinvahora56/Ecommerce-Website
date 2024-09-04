<?php
include('../includes/connect.php');
include('../functions/common_function.php');

if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $confirm_password = $_POST['confirm_password'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    if ($password != $confirm_password) {
        echo "<script>alert('Passwords do not match');</script>";
    } else {
        if (!empty($username) && !empty($email) && !empty($password)) {
            $insert_query = "INSERT INTO `admin_table` (admin_name, admin_email, admin_password) VALUES ('$username', '$email', '$password')";
            $result = mysqli_query($con, $insert_query);
            if ($result) {
                echo "<script>alert('Registration Successful. You can now log in.'); window.location.href='admin_login.php';</script>";
            } else {
                echo "<script>alert('Registration failed. Please try again.');</script>";
            }
        }
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
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(to right, #f4f7fa, #ffffff);
            font-family: 'Arial', sans-serif;
            color: #333;
        }

        .container {
            max-width: 900px;
            margin-top: 30px;
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

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }

        .card-header {
            background-color: #0056b3;
            color: #fff;
            border-bottom: none;
            padding: 20px;
            text-align: center;
            font-size: 1.5rem;
            font-weight: 700;
        }

        .card-body {
            padding: 30px;
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
            margin-bottom: 20px;
        }

        .text-muted {
            color: #6c757d;
        }

        @media (max-width: 768px) {
            .row {
                flex-direction: column;
            }

            .img-container, .form-container {
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card">
            <div class="card-header">
                Admin Registration
            </div>
            <div class="row">
                <div class="col-lg-6 img-container">
                    <img src="../images/admin_reg.jpg" alt="Admin Registration Image">
                </div>
                <div class="col-lg-6">
                    <div class="card-body">
                        <form method="POST">
                            <div class="form-group">
                                <label for="username">Admin Name</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Enter username" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email Address</label>
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password" required>
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm Password</label>
                                <input type="password" name="confirm_password" class="form-control" id="confirm_password" placeholder="Confirm Password" required>
                            </div>
                            <button type="submit" class="btn btn-info" name="register">Register</button>
                            <p class="mt-3 text-muted">Already have an account? <a href="admin_login.php"><b>Login</b></a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<?php

// if (isset($_POST['register'])) {
//     $username = $_POST['username'];
//     $confirm_password = $_POST['confirm_password'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];
    
//     if ($password != $confirm_password) {
//         echo "<script>alert('Password Do Not Match');</script>";
//     } 
//     else {
//         if (!empty($username) && !empty($email) && !empty($password)) {
//             $insert_query = "INSERT INTO `admin_table`(admin_name, admin_email, admin_password) VALUES ('$username',  '$email', '$password')";
//             $result = mysqli_query($con, $insert_query);
//             if ($result) {
//                 echo "<script>alert('Inserted Successfully Now You can Login');</script>";
//                 echo "<script>window.open('admin_login.php', '_self')</script>";
//             }
//         }
//     }
// }

?>
