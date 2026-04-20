<?php
// Q4 - Edit + Update in ONE FILE
include "lab4.1.php";

$name = $phone = "";
$id = 0;
$msg = "";
$show_form = false;
$show_dropdown = true;

// -------------------- UPDATE RECORD --------------------
if (isset($_POST["update"])) {
    $id    = intval($_POST["id"]);
    $name  = mysqli_real_escape_string($conn, $_POST["name"]);
    $phone = mysqli_real_escape_string($conn, $_POST["phone"]);

    $sql = "UPDATE student 
            SET name='$name', phone_number='$phone' 
            WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        $msg = "Record updated successfully!";
        $show_dropdown = true;
        $show_form = false;
    } else {
        $msg = "Update failed!";
    }
}

// -------------------- LOAD RECORD FOR EDIT --------------------
if (isset($_POST["select_id"]) && is_numeric($_POST["select_id"])) {
    $id = intval($_POST["select_id"]);
    $sql = "SELECT * FROM student WHERE id = $id";
    $res = mysqli_query($conn, $sql);

    if ($res && $row = mysqli_fetch_assoc($res)) {
        $name = $row["name"];
        $phone = $row["phone_number"];
        $show_form = true;
        $show_dropdown = false;
    } else {
        $msg = "Record not found!";
    }
}

// -------------------- LOAD ALL FOR DROPDOWN --------------------
$sql_all = "SELECT * FROM student";
$res_all = mysqli_query($conn, $sql_all);
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Student</title>
<style>
.success { color: green; }
.error { color: red; }
</style>
</head>

<body>

<h2>Update a Record</h2>

<?php if ($msg) echo "<p class='success'>$msg</p>"; ?>

<form method="post">

<?php if ($show_dropdown): ?>

Select Student to Update:
<select name="select_id" required>
<option value="">-- Select Student --</option>

<?php while ($row = mysqli_fetch_assoc($res_all)): ?>
<option value="<?php echo $row['id']; ?>">
<?php echo htmlspecialchars($row['name']) . " (ID: " . $row['id'] . ")"; ?>
</option>
<?php endwhile; ?>

</select>

<br><br>
<input type="submit" value="Load for Edit">

<?php else: ?>

<input type="hidden" name="id" value="<?php echo $id; ?>">

Student ID: <?php echo $id; ?>
<br><br>

Name:
<input type="text" name="name"
value="<?php echo htmlspecialchars($name); ?>" required>

<br><br>

Phone:
<input type="text" name="phone"
value="<?php echo htmlspecialchars($phone); ?>" required>

<br><br>

<input type="submit" name="update" value="Update Record">

<?php endif; ?>

</form>

<br>
<a href="lab4.3.php">View All Records</a>

</body>
</html>
<br><br>
Name:Pramit Maharjan<br>
Symbol no:20800605