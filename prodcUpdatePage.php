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
        $productName = $descrp = $dateEnter = "";
        $id = $_GET['pid'];
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

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id = $_POST["pid"];
            $productName = $_POST["productName"];
            $descrp = $_POST["descrp"];
            $dateEnter = $_POST["dateEnter"];
            $sql = "UPDATE product SET productName='$productName', descrp='$descrp', dateEnter='$dateEnter' 
            WHERE pid=$id";

            if (mysqli_query($conn, $sql)) {
                echo "Record number " . "$id" . " updated successfully";
            } else {
                echo "Error updating record: " . mysqli_error($conn);
            }
        } else {
            $id = $_GET["pid"];
            $sql = "SELECT pid, productName, descrp,dateEnter FROM product";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                    $productName = $row["productName"];
                    $descrp = $row["descrp"];
                    $dateEnter = $row["dateEnter"];
                }
            }
        }
        ?>
        <form method="post">
            <label for="fname">Product Name :</label><br>
            <input type="text" name="productName" value="<?php echo $productName; ?>"><br>
            <label for="lname">Comment:</label><br>
            <textarea name="descrp" value="<?php echo $descrp; ?>" rows="10">
            <?php echo "   "; ?></textarea>
            <br><br>
            <!-- <input type="text" name="descrp" value="<?php echo $descrp; ?>" rows="10"><br> -->
            <label for="lname">Date:</label><br>
            <input type="date" name="dateEnter" value="<?php echo $dateEnter; ?>"><br><br>
            <input type="submit" value="Update">
            <input type="hidden" name="pid" value="<?php echo $id; ?>">
            <!-- </form>
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
        </form> -->
            <?php

            mysqli_close($conn);

            ?>
            <br>
            <br>
            <a href="prodcIndex.php">Back to Home Page</a>
            <br>
            <br>
            <a href="prodcShowDB.php">Show Data</a>
            <br>
            <br>
            <a href="prodcShowUpdate.php">update other one?</a>
    </center>

</body>

</html>