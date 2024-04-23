<?php
session_start();

$base_url = 'localhost/mukesh/registerform/auth/';

if (isset($_SESSION['name'])) {
} else {
    header($base_url . 'header:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
<title>Home</title>
<?php include './components/head.php'
?>

<body class="d-flex flex-column h-100 py-1">
    <?php include 'components/header.php'
    ?>
    Begin page content
    <main class="flex-shrink-0 mt-4">
        <div class="container">
            <h1 class="mt-5">Sticky Wel Come To <?php echo $_SESSION['name']; ?></h1>
            <p class="lead">Pin a footer to the bottom of the viewport in desktop browsers with this custom HTML and CSS. A fixed navbar has been added with</p>
            <p>Back to the default sticky footer minus the navbar.</p>
        </div>
    </main>

    <footer class="footer mt-auto py-3 bg-body-tertiary">
        <div class="container">
            <span class="text-body-secondary">Place sticky footer content here.</span>
        </div>
    </footer>

</body>

</html>