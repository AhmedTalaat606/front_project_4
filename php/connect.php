<?php
$con_name = $con_email = $con_massage = "" ;

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $con_name = $_POST["con_name"];
    $con_email = $_POST["con_email"];
    $con_massage = $_POST["con_massage"];
}

?>


