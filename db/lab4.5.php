<?php
// Q5 - Delete a record with dropdown (Simple fix)
include "lab4.1.php";

$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST["id"]);
    $sql = "DELETE FROM student WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        header("location:lab4.5_delete.php?del=true");
        exit;
    } else {
        $msg = "Deletion failed: " . mysqli_error($conn);
    }
}

// Load all students for dropdown
$sql = "SELECT * FROM student";
$res = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .error { color: red; }
    </style>
</head>
<body>
<h2>Delete a Record</h2>

<?php 
if (isset($_GET["del"]) && $_GET["del"] == "true") {
    echo "<p style='color: green;'>Record deleted successfully!</p>";
}
if ($msg) echo "<p class='error'>$msg</p>"; 
?>

<form method="post" action="">
    Select Student to Delete:
    <select name="id">
        <option value="">-- Select Student --</option>
        <?php while ($row = mysqli_fetch_assoc($res)): ?>
            <option value="<?php echo $row['id']; ?>"><?php echo htmlspecialchars($row['name']) . " (ID: " . $row['id'] . ")"; ?></option>
        <?php endwhile; ?>
    </select><br><br>
    <input type="submit" value="Delete Selected" onclick="return confirm('Sure to delete?')">
</form>
<br>
<a href="lab4.3.php">View All Records</a>
</body>
</html>
<br><br>
Name:Pramit Maharjan<br>
Symbol no:20800605