<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delet Record</title>
</head>

<body>
    <center>
        <?php
        $id = $_GET["pid"];

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

        // sql to delete a record
        $sql = "DELETE FROM product WHERE pid=$id";

        if (mysqli_query($conn, $sql)) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

        mysqli_close($conn);
        ?>
        <br>
        <br>
        <a href="prodcIndex.php">Back to Home Page</a>
        <br>
        <br>
        <a href="prodcShowDB.php">Show Data</a>
    </center>

</body>

</html>