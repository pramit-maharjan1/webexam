<?php
// Q11. Insert multiple records into the database table at once
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "conn.php";
    $names  = $_POST["name"];
    $phones = $_POST["phone"];

    $success = 0;
    for ($i = 0; $i < count($names); $i++) {
        $name  = mysqli_real_escape_string($conn, $names[$i]);
        $phone = mysqli_real_escape_string($conn, $phones[$i]);
        if ($name != "" && $phone != "") {
            $sql = "INSERT INTO student (name, phone_number) VALUES ('$name', '$phone')";
            if (mysqli_query($conn, $sql)) {
                $success++;
            }
        }
    }
    $msg = "$success record(s) inserted successfully!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .success { color: green; }
        table { border-collapse: collapse; }
        td { padding: 4px 8px; }
    </style>
</head>
<body>
<h2>Insert Multiple Records</h2>

<?php if ($msg) echo "<p class='success'>$msg</p>"; ?>

<form method="post" action="">
    <table border="1" cellpadding="5">
        <tr><th>Name</th><th>Phone</th></tr>
        <?php for ($i = 0; $i < 3; $i++) { ?>
        <tr>
            <td><input type="text" name="name[]" placeholder="Name <?php echo $i+1; ?>"></td>
            <td><input type="text" name="phone[]" placeholder="Phone <?php echo $i+1; ?>"></td>
        </tr>
        <?php } ?>
    </table>
    <br>
    <input type="submit" value="Insert All">
</form>
<br>
<a href="pramit10.php">View Records</a>
</body>
</html>
<br><br>
Name:Pramit Maharjan<br>
Symbol no:20800605
