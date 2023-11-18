<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
</head>

<body>
    <center>
        <?php

        $id = $_GET['usid'];
        $servername = "127.0.0.1:3325";
        $username = "root";
        $password = "";
        $dbname = "labmarket";

        // Create connection
        $conn = mysqli_connect($servername, $username, $password, $dbname);
        // Check connection
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $firstname = $lastname = $email = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["usid"];
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $sql = "UPDATE users SET lastname='$lastname', firstname='$firstname', email='$email' WHERE usid=$id";

            if (mysqli_query($conn, $sql)) {
                echo "Record number " . "$id" . " updated successfully";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        } else {
            $id = $_GET["usid"];
            $sql = "SELECT  firstname, lastname, email FROM users WHERE usid=$id;";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    $firstname = $row["firstname"];
                    $lastname = $row["lastname"];
                    $email = $row["email"];
                }
            }
        }
        ?>
        <form method="post">
            <label for="fname">First name:</label><br>
            <input type="text" name="firstname" value="<?php echo $firstname; ?>"><br>
            <label for="lname">Last name:</label><br>
            <input type="text" name="lastname" value="<?php echo $lastname; ?>"><br>
            <label for="lname">Email:</label><br>
            <input type="email" name="email" value="<?php echo $email; ?>"><br><br>
            <input type="submit" value="Update">
            <input type="hidden" name="usid" value="<?php echo $id; ?>">
        </form>
        <?php

        mysqli_close($conn);

        ?>
        <br>
        <br>
        <a href="userIndex.php">Back to Home Page</a>
        <br>
        <br>
        <a href="userShowDB.php">Show Data</a>
        <br>
        <br>
        <a href="userShowUpdate.php">update other one?</a>
    </center>

</body>

</html>