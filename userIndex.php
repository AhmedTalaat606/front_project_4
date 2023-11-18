<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRUD User Page</title>
</head>

<body>
  <center>
    <a href="userShowDB.php">
      <h3>Show Data</h3>
    </a>
    <br>
    <br>
    <a href="userInsertPage.php">
      <h3>Insert record</h3>
    </a>
    <br>
    <br>
    <a href="userShowUpdate.php">
      <h3>Update record</h3>
    </a>
    <br>
    <br>
    <a href="userShowDelete.php">
      <h3>Delete record</h3>
    </a>
    <br>
    <br>
    <a href="userSearchpage.php">
      <h3>Search</h3>
    </a>
    <br>
    <br>
    <a href="user_product.php">
      <h3>Home page</h3>
    </a>
  </center>


  <?php
  $servername = "127.0.0.1:3325";
  $username = "root";
  $password = "";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password);

  // Check connection
  if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
  }
  // echo "Connected done";


  mysqli_close($conn);
  ?>

</body>

</html>