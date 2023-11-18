<?php
session_start();
if (isset($_SESSION["users"])) {
  header("Loction: userIndex.php");
}
?>

<html>

<head>
  <link rel="stylesheet" href="css/all.min.css" />
  <link rel="stylesheet" href="css/bootstrap.min.css" />
  <link rel="stylesheet" href="css/style.css" />
</head>

<body>
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

  $firstname = $lastname = $email = $dob = $gender = $pasword = $age = $telephone = $passwordRep = "";
  $error =  $errors =[];
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST["firstname"];
    $lastname = $_POST["lastname"];
    $email = $_POST["email"];
    $pasword = $_POST["pasword"];
    $passwordRep = $_POST["paswordd"];
    $dob = $_POST["dob"];
    $age = $_POST["age"];
    $gender = $_POST["gender"];
    $telephone = $_POST["telephone"];

    $passwordHash = password_hash($pasword, PASSWORD_DEFAULT);

    $errors = array();
    if (empty($firstname) or empty($lastname) or empty($email) or empty($pasword) or empty($passwordRep) or empty($gender) ) {
      array_push($errors, "All fields are required");
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      array_push($errors, "Email is not valid");
    }
    if (strlen($pasword) < 8) {
      array_push($errors, "Password must be at least 8 characters long");
    }
    if ($pasword !== $passwordRep) {
      array_push($errors, "Password does not match");
    }
    // require_once("DB/fullCreatDB.php");

    $sql0 = "SELECT * FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql0);
    $rowCount = mysqli_num_rows($result);
    if ($rowCount > 0) {
      array_push($error, "Email already exists");
      // print_r($error);
    }
    if (count($errors) > 0) {
      foreach ($errors as $error) {
        echo "<div class='alert alert-danger'>$error</div>";
      }
    } else {

      // $sql = "INSERT INTO users (full_name, email, password) VALUES (?, ?, ?)";
      // $sql = "INSERT INTO users (firstname, lastname, email, pasword, dob , age, gender , telephone)
      // VALUES ('$firstname', '$lastname', '$email', '$passwordHash',  '$dob', '$age',  '$gender' , '$telephone')";
      $sql1 = "INSERT INTO users (firstname, lastname, email, pasword, dob , age, gender , telephone)
      VALUES (?, ?, ?, ?,  ?, ?,  ? , ?)";
      $stmt = mysqli_stmt_init($conn);
      $prepareStmt = mysqli_stmt_prepare($stmt, $sql1);
      if ($prepareStmt) {
        mysqli_stmt_bind_param($stmt, "ssssssss", $firstname,$lastname, $email, $passwordHash,$dob,$age,$gender,$telephone);
        mysqli_stmt_execute($stmt);
        echo "<div class='alert alert-success'>you are registed successfully.</div>";
      } else {
        die("something went wrong");
      }
    }
  }
  $sql2 = "SELECT usid, firstname, lastname, email, pasword, dob, age, gender, telephone FROM users";
    $result = mysqli_query($conn, $sql2);

    if (mysqli_num_rows($result) > 0) {

        echo " Data Exists ";
    } else {
        echo "<h1>No Data</h1>";
    }

    mysqli_close($conn);
  ?>
  <form action="reg.php" method="post">
    <div class="container mt-5">
      <div class="row">
        <div class="col-lg-8 m-auto">
          <div class="content text-center shadow-lg p-5">
            <h1 class="pb-3">Smart Login System</h1>

            <label for="fname">First name:</label><br>
            <input type="text" name="firstname" placeholder="first name"><br><br>
            <label for="lname">Last name:</label><br>
            <input type="text" name="lastname"><br><br>
            <label for="lname">Email:</label><br>
            <input type="email" name="email"><br><br>
            <label for="pwd">Password:</label><br>
            <input type="password" name="pasword"><br><br>
            <label for="pwd">Password Confirm:</label><br>
            <input type="password" name="paswordd"><br><br>
            <label for="lname">BirthDate:</label><br>
            <input type="date" name="dob"><br><br>
            <label for="age">Age: </label>
            <input type="number"  name="age" min="1" max="100"><br><br>
            Gender:
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "female") echo "checked"; ?> value="female">Female
            <input type="radio" name="gender" <?php if (isset($gender) && $gender == "male") echo "checked"; ?> value="male">Male<br><br>
            <label for="phone">Enter your phone number:</label>
            <input type="tel" name="telephone" placeholder="01146375820"><br><br>

            <!-- <input type="text" name="fullname" class="form-control text-black mb-2 mt-2" placeholder="Full Name" />
            <input type="email" name="email" class="form-control text-black mb-2 mt-2" placeholder="Email" />
            <input type="password" name="password" class="form-control text-black mb-2 mt-2" placeholder="Password" />
            <input type="password" name="passwordRep" class="form-control text-black mb-2 mt-2" placeholder="Repeat Password" />
            <p class="text-primary" id="Success"></p>
            <p class="text-danger" id="inputs1"></p> -->
            <button type="submit" class="button1 btn btn-outline-info w-100 mb-4 mt-4">
              Sign Up
            </button>
            <p class="text-black">
              You have an account?
              <a class="text-decoration-none text-black" href="loginPage.php">Sign In</a>
            </p>
          </div>
        </div>
      </div>
    </div>
  </form>

</body>

</html>