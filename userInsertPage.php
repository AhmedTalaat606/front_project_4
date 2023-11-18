<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Page</title>
</head>

<body>
    <center>
        <form method="post">
            <label for="fname">First name:</label><br>
            <input type="text" name="firstname" placeholder="first name"><br><br>
            <label for="lname">Last name:</label><br>
            <input type="text" name="lastname"><br><br>
            <label for="lname">Email:</label><br>
            <input type="email" name="email"><br><br>
            <label for="pwd">Password:</label><br>
            <input type="password" name="pasword"><br><br>
            <label for="lname">BirthDate:</label><br>
            <input type="date" name="dob"><br><br>
            <label for="age">Age: </label>
            <input type="number"  name="age" min="1" max="100"><br><br>
            Gender:
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male<br><br>
            <label for="phone">Enter your phone number:</label>
            <input type="tel" name="telephone" placeholder="01146375820"><br><br>

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

    $firstname = $lastname = $email = $dob = $gender =$pasword =$age =$telephone= "";

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
            echo "New record  created  successfully </br>";
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        }
    }

    $sql = "SELECT usid, firstname, lastname, email, pasword, dob, age, gender, telephone FROM users";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        echo " Data Exists ";
    } else {
        echo "<h1>No Data</h1>";
    }

    mysqli_close($conn);
    ?>
    <br>
    <br>
    <a href="userShowDB.php">Show Data</a>

</body>

</html>