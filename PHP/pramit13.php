<?php
// Q13 - Edit form: fetch record and show in form (Simple fix)
$msg = "";
$name = $phone = "";
$id = 0;
include "conn.php";

if (isset($_GET["up"]) && $_GET["up"] == "true") {
    $msg = "Record updated successfully!";
}

if (isset($_GET["id"])) {
    $id = intval($_GET["id"]);
    $sql = "SELECT * FROM student WHERE id = " . $id;
    $res = mysqli_query($conn, $sql);
    if ($res && $row = mysqli_fetch_assoc($res)) {
        $name = $row["name"];
        $phone = $row["phone_number"];
    } else {
        $msg = "Record not found or invalid ID!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .success { color: green; }
        .error { color: red; }
    </style>
</head>
<body>
<h2>Update a Record</h2>
<?php if ($msg) echo "<p class='" . (strpos($msg, 'success') ? 'success' : 'error') . "'>$msg</p>"; ?>

<form method="post" action="update.php">
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    Name: <input type="text" name="name" value="<?php echo htmlspecialchars($name); ?>"><br><br>
    Phone: <input type="text" name="phone" value="<?php echo htmlspecialchars($phone); ?>"><br><br>
    <input type="submit" value="Update">
</form>
<br>
<a href="pramit10.php">View Records</a>
</body>
</html>
<br><br>
Name:Pramit Maharjan<br>
Symbol no:20800605
