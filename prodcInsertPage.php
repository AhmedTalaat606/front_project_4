<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Page</title>
</head>

<body>
    <!-- <?php $descrp =  "" ?> -->
    <center>
        <form method="post">
            <label for="fname">Product Namme:</label><br>
            <input type="text" name="productName"><br>
            <label for="lname">Comment:</label><br>
            <textarea name="descrp" rows="10">
            <?php echo "   "; ?></textarea>
            <br><br>
            <label for="lname">Date:</label><br>
            <input type="date" name="dateEnter"><br>
            <input type="submit" value="Submit">
        </form>
    </center>
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

    $productName = $descrp = $dateEnter = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $productName = $_POST["productName"];
        $descrp = $_POST["descrp"];
        $dateEnter = $_POST["dateEnter"];

        $sql = "INSERT INTO product (productName, descrp, dateEnter)
        VALUES ('$productName', '$descrp', '$dateEnter')";

        if (mysqli_query($conn, $sql)) {
            echo "New record  created  successfully </br>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    $sql = "SELECT pid, productName, descrp,dateEnter FROM product";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        echo " Data Exists ";
    } else {
        echo "<h3>No Data</h3>";
    }

    mysqli_close($conn);
    ?>
    <br>
    <br>
    <a href="prodcShowDB.php">Show Data</a>

</body>

</html>