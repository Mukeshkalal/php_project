    <?php
    session_start();
    include 'config.php';
    include 'boot.php'; ?>
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
    </head>

    <body class="bg-dark text-light">
        <div class="container col-md-3 my-5">
            <form method="post">
                <h1 class="h3 mb-3 fw-normal text-center">Sign Up</h1>
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
    <?php
    if (isset($_REQUEST['email'])) {
        $email = $_SESSION[$_REQUEST['email']];
        $password = password_verify($_REQUEST['password'], PASSWORD_DEFAULT);
        $sql = "SELECT * FROM `register` WHERE `email`= '$email'";
        $result = $conn->query($sql);
        if ($result) {
            header('location:Home.php');
        }
    }
    ?>

    </html>