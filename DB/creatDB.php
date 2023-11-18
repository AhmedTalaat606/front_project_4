<?php
$servername = "127.0.0.1:3325";
$username = "root";
$password = "";
$dbname = "labmarket";


// Create connection
$connection = mysqli_connect($servername, $username, $password);
// Check connection
if (!$connection) {
  die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE labmarket";
if (mysqli_query($connection, $sql)) {
  echo "Database created successfully <br>";
} else {
  echo "Error creating database: " . mysqli_error($connection);
}

mysqli_close($connection);

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// sql to create table
$sql0 = "CREATE TABLE users (
usid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
email VARCHAR(50),
pasword VARCHAR(50),
gender VARCHAR(5),
age INT(5),
telephone INT(11),
isadmin BOOLEAN ,
dob DATE NULL ;
reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

if (mysqli_query($conn, $sql0)) {
  echo "All Tables created successfully <br>";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}


$sql1 = "CREATE TABLE product (
    pid INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    productName VARCHAR(30) NOT NULL,
    descrp VARCHAR(300) NOT NULL,
    dateEnter VARCHAR(50),
    reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

if (mysqli_query($conn, $sql1)) {
  echo "All Tables created successfully <br>";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}

$sql2 = "CREATE TABLE product (
  email VARCHAR(50) PRIMARY KEY,
  fullname VARCHAR(30) NOT NULL,
  commect VARCHAR(300) NOT NULL,
  
  reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
  )";

if (mysqli_query($conn, $sql2)) {
  echo "All Tables created successfully <br>";
} else {
  echo "Error creating table: " . mysqli_error($conn);
}
mysqli_close($conn);
