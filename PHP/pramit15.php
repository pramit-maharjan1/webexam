<?php
// Q15. Read content from a text file, modify it, and write back
$filename = "data.txt";
$msg = "";
$content = "";

if (!file_exists($filename)) {
    file_put_contents($filename, "Hello, this is the original content.\nLine 2: PHP file handling.\nLine 3: Read, modify, write.");
}


$content = file_get_contents($filename);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newContent = $_POST["content"];

    file_put_contents($filename, $newContent);
    $content = $newContent;
    $msg = "File updated successfully!";
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .success { color: green; }
        textarea { width: 500px; height: 150px; }
    </style>
</head>
<body>
<h2>Read, Modify and Write Text File</h2>
<p>File: <strong><?php echo $filename; ?></strong></p>

<?php if ($msg) echo "<p class='success'>$msg</p>"; ?>

<form method="post" action="">
    <textarea name="content"><?php echo htmlspecialchars($content); ?></textarea><br><br>
    <input type="submit" value="Save Changes">
</form>
<br>
</body>
</html>
<br><br>
Name:Pramit Maharjan<br>
Symbol no:20800605
