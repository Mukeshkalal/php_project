<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View</title>
    <?php


    include 'config.php';
    include 'boot.php';
    $sql = "SELECT * FROM `register`";
    $result = $conn->query($sql);

    if (isset($_POST['delete_all'])) {
        $delete_id = $_REQUEST['delete'];
        foreach ($delete_id as $id) {
            $sql = "DELETE FROM `register` WHERE id=$id";
            $conn->query($sql);
        }
    }
    ?>
</head>

<body>

    <header>
        <!-- Fixed navbar -->
        <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
            <div class="container">
                <a class="navbar-brand" href="#">Fixed navbar</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ms-auto mb-2 mb-md-0">
                        <li class="nav-item">
                            <a class="nav-link active" href="Home.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="view.php">View</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.php">Register</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.php">Login</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    </header>
    <div class="container my-5">
        <h1 class="text-center fw-bolder border-bottom py-2">view pages</h1>
        <form action="" method="post">
            <table class="table table-success table-striped-columns">
                <thead>
                    <tr>
                        <th scope="col"></th>
                        <th scope="col">Sr No.</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Password</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $i = 1;
                    if ($result->num_rows >=1) {
                        while ($rows = $result->fetch_assoc()) {
                            $id = $rows['id'];
                            $email = $rows['email'];
                            $password = $rows['password'];
                            $name = $rows['name'];
                            echo " <tr>
                        <th>
                        <input type='checkbox' name='delete[]' />
                        </th>
                        <th scope='row'>$i</th>
                        <td>$name</td>
                        <td>$email</td>
                        <td>$password</td>
                        <td>
                        <a href='update.php?id=$id' class='btn btn-primary'>Update</a>
                        <a href='delete.php?id=$id' class='btn btn-danger'>Delete</a>
                        </td>
                    </tr>";
                            $i++;
                        }
                    }
                    ?>
                </tbody>
            </table>
        </form>
        <div>
            <button class="btn btn-danger" name="delete_all">Delete All</button>
        </div>
    </div>

</body>

</html>