<?php
include '../sarver/config.php';
if (isset($_REQUEST['update'])) {
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $password = password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
    $sql = "UPDATE `register` SET `password`= '$password' WHERE `email`= '$email' and  `password`='$password'";
    $result = $conn->query($sql);
    if ($result) {
        header('location:login.php');
    }
}
if (isset($_REQUEST['email'])) {
    $email = $_REQUEST['email'];
    $password = password_verify($_REQUEST['password'], PASSWORD_DEFAULT);
    $sql = "SELECT * FROM `register` WHERE email= '$email'";
    $conn->query($sql);
    if ($result) {
        echo   "Success";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include '../components/head.php'; ?>
    <title>Document</title>
</head>

<body class="bg-dark text-light">
    <div class="container col-md-3 my-5 py-5">
        <form method="post">
            <h1 class="h3 mb-3 fw-normal text-center">Forget Password</h1>
            <div class="form-floating my-2">
                <input type="email" class="form-control" id="email" name="email" value="" />
                <label for="email">email enter</label>
            </div>
            <div class="form-floating my-2">
                <a href="login.php">login</a>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit" name="update">Sand Opt</button>
        </form>
    </div>
</body>

</html>