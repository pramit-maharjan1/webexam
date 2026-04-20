<?php
$servername = "localhost";
$username   = "root";
$password   = "";

// Connect without database
$conn = mysqli_connect($servername, $username, $password);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE csit";

if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error: " . mysqli_error($conn);
}

mysqli_close($conn);
?>