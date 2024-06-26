<?php include '../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<title>Register Page</title>
<?php include '../components/head.php'; ?>

<body class="bg-dark text-light">
    <div class="container col-md-3 my-5 py-5">
        <form method="post">
            <h1 class="h3 mb-3 fw-normal text-center border-bottom">Sign In</h1>
            <div class="form-floating my-2">
                <input type="text" class="form-control" id="username" name="username" placeholder="Enter User name" />
                <label for="username">User Name</label>
            </div>
            <div class="form-floating my-2">
                <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com" />
                <label for="email">Email address</label>
            </div>
            <div class="form-floating my-2">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
            </div>
            <div class="form-floating my-2">
                <span class="px-1">you have account?<a href="index.php">click Here</a></span>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit">Sign in</button>
        </form>
    </div>
</body>
<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);


    if (!empty($name) and !empty($email) and !empty($password)) {
        $sql = "INSERT INTO `register`(`name`,`email`,`password`) VALUE ('$name','$email','$password')";
        $result = $conn->query($sql);
        if ($result) {
            header('location:index.php');
        } else {
            echo 'data is not yet';
        }
    }
}
?>

</html>