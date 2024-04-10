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
    <?php
    include 'config.php';
    include 'boot.php';


    if (isset($_REQUEST['update'])) {
        $id = $_REQUEST['id'];
        $name = $_REQUEST['name'];
        $email = $_REQUEST['email'];

        $sql = "UPDATE `register` SET `name`='$name',`email`='$email' WHERE id=$id";
        $result = $conn->query($sql);
        if ($result) {
            echo var_dump('seccess');
            header('location:view.php');
        }
    }


    if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
        $sql = "SELECT * FROM `register` WHERE id=$id";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($rows = $result->fetch_assoc()) {
                $name = $rows['name'];
                $email = $rows['email'];
            }
        }
    }
    ?>
</head>

<body class="bg-dark text-light">
    <div class="container col-md-3 my-5 py-5">
        <form method="post">
            <h1 class="h3 mb-3 fw-normal text-center">Sign In</h1>
            <div class="form-floating my-2">
                <input type="text" class="form-control" id="name" name="name" value="<?php echo $name; ?>" placeholder="Enter User name" />
                <label for="name">User Name</label>
            </div>
            <div class="form-floating my-2">
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $email; ?>" placeholder="name@example.com" />
                <label for="email">Email address</label>
            </div>
            <button class="btn btn-primary w-100 py-2" type="submit" name="update">Submit</button>
        </form>
    </div>
</body>

</html>