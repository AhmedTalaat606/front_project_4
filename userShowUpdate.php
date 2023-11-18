<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>choose update</title>
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
        $firstname = $_POST["firstname"];
        $lastname = $_POST["lastname"];
        $email = $_POST["email"];
        $pasword = $_POST["pasword"];
        $dob = $_POST["dob"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
        $telephone = $_POST["telephone"];
        $sql = "INSERT INTO users (firstname, lastname, email,pasword, dob,age, gender,telephone)
VALUES ('$firstname', '$lastname', '$email','$pasword','$dob','$age','$gender','$telephone')";

        if (mysqli_query($conn, $sql)) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    $sql = "SELECT usid, firstname, lastname ,email,pasword,dob,age,gender,telephone FROM users";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
    ?>
        <center>
            <table border=2>
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
                <?php
                // output data of each row
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                    <tr>
                        <td>
                            <?php echo $row["usid"]; ?>
                        </td>
                        <td>
                            <?php echo $row["firstname"]; ?>
                        </td>
                        <td>
                            <?php echo $row["lastname"]; ?>
                        </td>
                        <td>
                            <?php echo $row["email"]; ?>
                        </td>
                        <td>
                            <?php echo $row["pasword"]; ?>
                        </td>
                        <td>
                            <?php echo $row["dob"]; ?>
                        </td>
                        <td>
                            <?php echo $row["age"]; ?>
                        </td>
                        <td>
                            <?php echo $row["gender"]; ?>
                        </td>
                        <td>
                            <?php echo $row["telephone"]; ?>
                        </td>
                        <td>
                            <?php echo '<a href="userUpdatePage.php?usid=' . $row["usid"] . '">update</a>' ?>
                        </td>
                    </tr>
                <?php
                }
                ?>
            </table>
        </center>
    <?php
    } else {
        echo "<h1>No Data</h1>";
    }

    mysqli_close($conn);
    ?>
    <br>
    <br>
    <a href="userIndex.php">
        <h1>Back to Home Page</h1>
    </a>
</body>

</html>