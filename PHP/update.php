<?php
// Q13 - Update record (Simple)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "conn.php";
    $id = intval($_POST["id"]);
    $name = mysqli_real_escape_string($conn, $_POST["name"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);

    $sql = "UPDATE student SET name='$name', phone_number='$phone' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        header("Location:13.php?up=true");
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
