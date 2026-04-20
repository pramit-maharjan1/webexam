<form method="POST">
Email: <input type="text" name="email"><br>
Phone: <input type="text" name="phone"><br>
<input type="submit">
</form>

<?php
if($_POST){

$email = $_POST['email'];
$phone = $_POST['phone'];

if(empty($email) || empty($phone)){
    echo "All fields required";
}
elseif(!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/", $email)){
    echo "Invalid Email";
}
elseif(!preg_match("/^(98|97)[0-9]{8}$/", $phone)){
    echo "Phone must start with 98 or 97";
}
else{
    echo "Valid Data";
}

}
?>

<br><br>
Name:Pramit Maharjan<br>
Symbol no:20800605