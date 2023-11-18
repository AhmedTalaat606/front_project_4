<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
</head>

<body>

    <!-- showing table data -->
    <?php
    $servername = '127.0.0.1:3325';
    $username = 'root';
    $password = '';
    $dbname = 'labmarket';

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $firstname = $lastname = $email = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productName = $_POST["productName"];
        $descrp = $_POST["descrp"];
        $dateEnter = $_POST["dateEnter"];

        $sql = "INSERT INTO product (productName, descrp, dateEnter)
        VALUES ('$productName', '$descrp', '$dateEnter')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    $sql = "SELECT pid, productName, descrp,dateEnter FROM product";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    ?>
        <center>
            <table border=2>
                <tr>
                    <th>ID</th>
                    <th>Product Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Update</th>
                </tr>
                <?php
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td>
                            <?php echo $row["pid"]; ?>
                        </td>
                        <td>
                            <?php echo $row["productName"]; ?>
                        </td>
                        <td>
                            <?php echo $row["descrp"]; ?>
                        </td>
                        <td>
                            <?php echo $row["dateEnter"]; ?>
                        </td>
                        <td>
                            <?php echo '<a href="prodcUpdatePage.php?pid=' . $row["pid"] . '">update</a>' ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </center>
    <?php
    } else {
        echo "<h3>No Data</h3>";
    }

    mysqli_close($conn);
    ?>
    <br>
    <br>
    <a href="prodcIndex.php">Back to Home Page</a>
</body>

</html>