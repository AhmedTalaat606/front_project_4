<?php

$servername = '127.0.0.1:3325';
$username = 'root';
$password = '';
$dbname = 'labmarket';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


$sql = "SELECT pid, productName, descrp ,reg_date FROM product";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
?>
    <center>
        <table border=2>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Date</th>
                
            </tr>
            <?php
            // output data of each row
            while ($row = mysqli_fetch_assoc($result)) {
            ?>
                <tr>
                    <td>
                        <?php echo $row["pid"]; ?>
                    </td>
                    <td>
                        <?php echo $row["productName"]; ?>
                    </td>
                    <td>
                        <?php echo $row["descrp"]; ?>
                    </td>
                    <td>
                        <?php echo $row["reg_date"]; ?>
                    </td>
                    
                </tr>
            <?php
            }
            ?>
        </table>
    </center>
    
  <center>

  <?php
  } else {
    echo "<h1>No product</h1>";
  }
  mysqli_close($conn);
 ?>
 <br>
 <br>
 <br>
 <a href="prodcIndex.php"><h1>Back to Home Page</h1></a>
  </center>
   