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


 $email = $pasword = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email"]) && isset($_POST["pasword"])) { // Check if email and password are set
        $email = $_POST["email"];
        $pasword = $_POST["pasword"];

        // $passwordHash = password_hash($pasword, PASSWORD_DEFAULT);

        //echo $passwordHash;

       
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $sqlx = "SELECT isadmin FROM users WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);
        $resultx = mysqli_query($conn, $sqlx);

        // print_r($resultx);

        if ($result) {
            $users = mysqli_fetch_array($result, MYSQLI_ASSOC);

            echo  $pasword ;
            echo "<br>";
            // echo $passwordHash;
           echo $users["pasword"];

            if ($users["isadmin"] == "1") {
                session_start();
                $_SESSION["users"] = "yes";
                header("Location: user_product.php");
                die();
            
            

            }elseif (password_verify($pasword , $users["pasword"] )) { // the error in this line 
                // Rest of the code for successful login

                // if ($user["isadmin"] == "1") {
                //     session_start();
                //     $_SESSION["user"] = "yes";
                //     header("Location: user_product.php");
                //     die();
                // }else{

                session_start();
                $_SESSION["users"] = "yes";
                header("Location: index.php");
                die();
            } else {
                echo "<div class='alert alert-danger'>Password does not match</div>";
            }
        } else {
            echo "<div class='alert alert-danger'>Email does not match</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Email and/or password missing</div>";
    }
}
