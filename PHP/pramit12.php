<?php
// Q12. Delete a specific record based on user input
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "conn.php";
$id  = intval($_POST["id"]);
$sql = "DELETE FROM student WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $msg = "Record with ID $id deleted successfully!";
    } else {
        $msg = "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .success { color: green; }
        .error   { color: red; }
    </style>
</head>
<body>
<h2>Q12: Delete a Record by ID</h2>

<?php if ($msg) {
    $cls = str_contains($msg, "Error") ? "error" : "success";
    echo "<p class='$cls'>$msg</p>";
} ?>

<form method="post" action="">
    Enter Student ID to Delete:<br>
    <input type="number" name="id" placeholder="Student ID" required><br><br>
    <input type="submit" value="Delete Record" onclick="return confirm('Are you sure?')">
</form>
<br>
<a href="pramits10.php">View Records</a>
</body>
</html>
<br><br>
Name:Pramit Maharjan<br>
Symbol no:20800605
