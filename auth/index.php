<?php
include '../config.php';
session_start();

$base_url = 'localhost/mukesh/registerform/';

if (isset($_SESSION['name'])) {
    header($base_url . 'Home.php');
} else {
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $sql = "SELECT * FROM `register` WHERE `email`= '$email'";
        $result = $conn->query($sql);

        if ($result && $result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $stored_password = $row['password'];
            $name = $row['name'];

            if (password_verify($password, $stored_password)) {
                $_SESSION['name'] = $name;
                header('location:../Home.php');
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>You missing samting!</strong> You are Miss Same data to Enter the target.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
    }
} ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/head.php' ?>
    <title>Login</title>
</head>

<body class="bg-dark text-light">
    <div class="container col-md-3 my-5">
        <form method="post">
            <h1 class="h3 mb-3 fw-normal text-center  border-bottom">Sign Up</h1>
            <div class="form-floating my-2">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" />
                <label for="email">Email address</label>
            </div>
            <div class="form-floating my-2">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
            </div>
            <div class="form-floating my-2">
                <span class="px-1 mx-1">cann't account?<a href="register.php">click Here</a></span>
                <a href="forget.php">Forget Password</a>
            </div>
            <button class="btn btn-primary w-100 py-2 mt-4" type="submit">Sign Up</button>
        </form>
    </div>
</body>

</html>