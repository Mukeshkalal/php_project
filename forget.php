<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input {
            background-color: #160f0f00 !important;
            color: white !important;
        }
    </style>
    <?php include 'config.php';
    include 'boot.php';


    if (isset($_REQUEST['update'])) {
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];
        $password = password_verify($_REQUEST['password'], PASSWORD_DEFAULT);
        $sql = "UPDATE `register` SET `password`= '$password' WHERE email= '$email'";
        $result = $conn->query($sql);
        if ($result) {
            header('location:login.php');
        }
    }

    if (isset($_REQUEST['email'])) {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];

        echo var_dump($email);
        echo var_dump($password);
        $sql = "SELECT * FROM `register` WHERE email= '$email'";
        $result = $conn->query($sql);
        if ($result) {
            echo   "Success";
        }
    }
    ?>
</head>

<body class="bg-dark text-light">
    <div class="container col-md-3 my-5 py-5">
        <form method="post">
            <h1 class="h3 mb-3 fw-normal text-center">Forget Password</h1>

            <div class="form-floating my-2">
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" />
                <label for="email">email enter</label>
            </div>
            <div class="form-floating my-2"><input type="text" class="form-control" value="<?php echo $password ?>" name="odpassword" vlaue="<?php echo $password ?>" /></div>
           
            <div class="form-floating my-2">
                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                <label for="password">Password</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit" name="update">Submit</button>
        </form>
    </div>
</body>


</html>