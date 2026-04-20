<?php
// Q10 / Lab 4.1 Q1 - Database connection
$servername = "localhost";
$username   = "root";
$password   = "";
$dbname     = "csit";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}else {
    echo "Connected successfully";
}
?>