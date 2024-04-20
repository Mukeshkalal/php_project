    <?php
    include '../sarver/config.php';

    $sql = "SELECT * FROM `register`";
    $result = $conn->query($sql);

    if (isset($_REQUEST['delete_all'])) {
        $delete_id = $_REQUEST['delete'];
        foreach ($delete_id as $id) {
            $sql = "DELETE FROM `register` WHERE id=$id ";
            $conn->query($sql);
        }
        header('location:view.php');
    }

    if (isset($_REQUEST['id'])) {
        $id = $_REQUEST['id'];
        $sql = "DELETE FROM `register` WHERE id=$id";
        $conn->query($sql);
        header('location:view.php');
    }
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <title>View Page</title>
   <?php include '../components/head.php';?>

    <body>
        <?php include '../components/header.php' ?>
        <div class="container my-5">
            <h1 class="text-center fw-bolder border-bottom py-2">view pages</h1>
            <form method="post">
                <table class="table table-success table-striped-columns">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Sr No.</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 1;
                        if ($result->num_rows >= 1) {
                            while ($rows = $result->fetch_assoc()) {
                                $id = $rows['id'];
                                $email = $rows['email'];
                                $name = $rows['name'];
                                echo "<tr>
                        <th>
                        <input type='checkbox' name='delete[]' value='$id' />
                        </th>
                        <th scope='row'>$i</th>
                        <td>$name</td>
                        <td>$email</td>
                        <td>
                        <a href='update.php?id=$id' class='btn btn-primary my-1'>Edit</a>
                        <a href='?id=$id' class='btn btn-danger my-1'>Delete</a>
                        </td>
                        </tr>";
                                $i++;
                            }
                        }
                        ?>
                    </tbody>
                </table>
                <div class="d-flex my-2 justify-content-between">
                    <button class="btn btn-primary">Prev</button>
                    <button class="btn btn-primary">Next</button>
                </div>
                <div>
                    <button class="btn btn-danger" name="delete_all" type="submit">Delete All</button>
                </div>
            </form>
        </div>

    </body>

    </html>