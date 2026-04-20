<?php
//Q3 - Retrieve and display all records from student table
include "lab4.1.php";
$sql = "SELECT * FROM student";
$res = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        table { border-collapse: collapse; }
        th, td { border: 1px solid #333; padding: 6px 12px; }
        th { background: #eee; }
        .success { color: green; }
    </style>
</head>
<body>
<h2>All Student Records</h2>

<?php if (!empty($_GET["ins"])) echo "<p class='success'>Record inserted successfully!</p>"; ?>
<?php if (!empty($_GET["del"])) echo "<p class='success'>Record deleted successfully!</p>"; ?>
<?php if (!empty($_GET["up"]))  echo "<p class='success'>Record updated successfully!</p>"; ?>

<table>
    <thead>
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $sn = 1;
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            echo "<tr>";
            echo "<td>" . $sn . "</td>";
            echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["phone_number"]) . "</td>";
            echo "<td>
                <a href='lab4.4_edit.php?id=" . intval($row["id"]) . "'>Edit</a> ||
                <a href='lab4.5_delete.php?id=" . intval($row["id"]) . "' onclick=\"return confirm('Delete this record?')\">Delete</a>
                </td>";
            echo "</tr>";
            $sn++;
        }
    } else {
        echo "<tr><td colspan='4'>No records found</td></tr>";
    }
    ?>
    </tbody>
</table>
<br>
</body>
</html>
<br><br>
Name:Pramit Maharjan<br>
Symbol no:20800605