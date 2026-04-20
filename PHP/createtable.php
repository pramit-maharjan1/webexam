<?php
include "conn.php";

$sql = "CREATE TABLE IF NOT EXISTS student (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    phone_number VARCHAR(20)
)";

if (mysqli_query($conn, $sql)) {
    echo "Student table created successfully (or already exists).";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
