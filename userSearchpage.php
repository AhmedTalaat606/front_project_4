<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Page</title>
</head>

<body>
    <form action="" method="GET">
        <div class="input-group mb-3">
            <input type="text" name="search" required value="<?php if (isset($_GET['search'])) {
                                                                    echo $_GET['search'];
                                                                } ?>" class="form-control" placeholder="Search data">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>
    <table border="5" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Password</th>
                <th>Date of Birth</th>
                <th>Age</th>
                <th>Gender</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            <?php


            $servername = '127.0.0.1:3325';
            $username = 'root';
            $password = '';
            $dbname = 'labmarket';

            // Create connection
            $conn = mysqli_connect($servername, $username, $password, $dbname);

            if (isset($_GET['search'])) {
                $filtervalues = $_GET['search'];
                $query = "SELECT * FROM users WHERE CONCAT(firstname,lastname,email) LIKE '%$filtervalues%' ";
                $query_run = mysqli_query($conn, $query);

                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $items) {
            ?>
                        <tr>
                            <td><?= $items['usid']; ?></td>
                            <td><?= $items['firstname']; ?></td>
                            <td><?= $items['lastname']; ?></td>
                            <td><?= $items['email']; ?></td>
                            <td><?= $items['pasword']; ?></td>
                            <td><?= $items['dob']; ?></td>
                            <td><?= $items['age']; ?></td>
                            <td><?= $items['gender']; ?></td>
                            <td><?= $items['telephone']; ?></td>
                        </tr>
                    <?php
                    }
                } else {
                    ?>
                    <tr>
                        <td colspan="4">No Record Found</td>
                    </tr>
            <?php
                }
            }
            ?>
        </tbody>
    </table>
    <a href="userIndex.php">
        <h3>Back to home page</h3>
    </a>
    <br>

    <a href="userInsertPage.php">
        <h3>go to insert</h3>
    </a>


</body>

</html>