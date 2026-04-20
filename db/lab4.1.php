<?php
//  Q1 - Establish connection to MySQL database
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "csit";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}
echo "Connection established successfully!";
?>
<br><br>
Name:Pramit Maharjan<br>
Symbol no:20800605