<?php
include "lab4.1.php";

$success = "";
$errors = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name  = trim($_POST["name"] ?? "");
    $phone = trim($_POST["phone"] ?? "");

    // Validation
    if ($name == "") {
        $errors[] = "Name is required.";
    } elseif (!preg_match("/^[a-zA-Z ]+$/", $name)) {
        $errors[] = "Name must contain letters only.";
    }

    if ($phone == "") {
        $errors[] = "Phone is required.";
    } elseif (!preg_match("/^(98|97)[0-9]{8}$/", $phone)) {
        $errors[] = "Phone must be valid.";
    }

    // If no errors
    if (empty($errors)) {

        // Sanitization
        $name  = mysqli_real_escape_string($conn, $name);
        $phone = mysqli_real_escape_string($conn, $phone);

        // Insert
        $sql = "INSERT INTO student (name, phone_number)
                VALUES ('$name', '$phone')";

        if (mysqli_query($conn, $sql)) {
            $success = "Record inserted successfully!";
        } else {
            $errors[] = "Insertion failed";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Student Insert Form</title>
<style>
.success { color: green; }
.error { color: red; }
</style>
</head>

<body>

<h2>Insert Student Record</h2>

<?php
if ($success) {
    echo "<p class='success'>$success</p>";
}

foreach ($errors as $err) {
    echo "<p class='error'>$err</p>";
}
?>

<form method="post">

Name:
<input type="text" name="name" required><br><br>

Phone:
<input type="text" name="phone" required><br><br>

<input type="submit" value="Insert Record">

</form>

</body>
</html>
<br><br>
Name:Pramit Maharjan<br>
Symbol no:20800605