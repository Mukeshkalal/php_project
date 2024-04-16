<?php
include 'config.php';
include 'boot.php';

$sql = 'SELECT * FROM `register`';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while ($rows = $result->fetch_assoc()) {
        $id = $rows['id'];
        $email = $rows['email'];
        $name = $rows['name'];
        $password = $rows['password'];

        // if (isset($email) and isset($password)) {
        //     header('location:Home.php');
        // }
        // else {
        // header('location:login.php');
        // }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body class="d-flex flex-column h-100">
    <header>
        Fixed navbar
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

    Begin page content
    <main class="flex-shrink-0 mt-4">
        <div class="container">
            <h1 class="mt-5">Sticky Wel Come To <u><?php echo ucfirst(strtolower($name)); ?></u></h1>
            <p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with <code class="small">padding-top: 60px;</code> on the <code class="small">main &gt; .container</code>.</p>
            <p>Back to <a href="/docs/5.3/examples/sticky-footer/">the default sticky footer</a> minus the navbar.</p>
        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-body-tertiary">
        <div class="container">
            <span class="text-body-secondary">Place sticky footer content here.</span>
        </div>
    </footer>

</body>

</html>