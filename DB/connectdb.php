<?php
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
?>