<?php

setcookie("user", "Pramit", time()+3600);

if(isset($_COOKIE['user'])){
    echo "Welcome " . $_COOKIE['user'];
}else{
    echo "Cookie set. Refresh page.";
}

?>
<br><br>
Name:Pramit Maharjan<br>
Symbol no:20800605