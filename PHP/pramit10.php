<?php
// Q10. Establish a connection to MySQL and display records from a table
include "conn.php";

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
    </style>
</head>
<body>
<h2>Records from Student Table</h2>
<table>
    <thead>
        <tr>
            <th>SN</th>
            <th>Name</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>

    </thead>
    <tbody>
    <?php
    $sn = 1;
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $student_id = $row["id"];
            echo "<tr>";
            echo "<td>" . $sn . "</td>";
            echo "<td>" . htmlspecialchars($row["name"]) . "</td>";
            echo "<td>" . htmlspecialchars($row["phone_number"]) . "</td>";
            echo "<td>
                <a href='13.php?id=$student_id'>Edit</a> |
                <a href='12.php?id=$student_id' onclick='return confirm(\"Delete?\")'>Delete</a>
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
