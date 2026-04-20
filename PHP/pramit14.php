<?php
// Q14. Build a form with various elements and display selected values
$name = $gender = $color = "";
$hobbies = [];
$submitted = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = htmlspecialchars($_POST["name"]   ?? "");
    $gender  = htmlspecialchars($_POST["gender"] ?? "");
    $color   = htmlspecialchars($_POST["color"]  ?? "");
    $hobbies = $_POST["hobby"] ?? [];
    $submitted = true;
}
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        .result { background: #f0fff0; padding: 10px; border: 1px solid green; }
        label   { display: block; margin-top: 8px; }
    </style>
</head>
<body>
<h2>Form with Various Elements</h2>

<form method="post" action="">
    <label>Name (Textbox):
        <input type="text" name="name" value="<?php echo $name; ?>">
    </label>

    <label>Gender (Radio Buttons):</label>
    <input type="radio" name="gender" value="Male"   <?php if($gender=="Male")   echo "checked"; ?>> Male
    <input type="radio" name="gender" value="Female" <?php if($gender=="Female") echo "checked"; ?>> Female
    <input type="radio" name="gender" value="Other"  <?php if($gender=="Other")  echo "checked"; ?>> Other

    <label>Hobbies (Checkboxes):</label>
    <input type="checkbox" name="hobby[]" value="Reading" <?php if(in_array("Reading",$hobbies)) echo "checked"; ?>> Reading
    <input type="checkbox" name="hobby[]" value="Sports"  <?php if(in_array("Sports", $hobbies)) echo "checked"; ?>> Sports
    <input type="checkbox" name="hobby[]" value="Music"   <?php if(in_array("Music",  $hobbies)) echo "checked"; ?>> Music

    <label>Favorite Color (Dropdown/Select):
        <select name="color">
            <option value="">-- Select --</option>
            <option value="Red"   <?php if($color=="Red")   echo "selected"; ?>>Red</option>
            <option value="Blue"  <?php if($color=="Blue")  echo "selected"; ?>>Blue</option>
            <option value="Green" <?php if($color=="Green") echo "selected"; ?>>Green</option>
        </select>
    </label>

    <br>
    <input type="submit" value="Submit">
</form>

<?php if ($submitted) { ?>
<div class="result">
    <h3>Submitted Values:</h3>
    <p>Name: <?php echo $name; ?></p>
    <p>Gender: <?php echo $gender; ?></p>
    <p>Hobbies: <?php echo empty($hobbies) ? "None" : implode(", ", $hobbies); ?></p>
    <p>Favorite Color: <?php echo $color; ?></p>
</div>
<?php } ?>
<br>
</body>
</html>
<br><br>
Name:Pramit Maharjan<br>
Symbol no:20800605
