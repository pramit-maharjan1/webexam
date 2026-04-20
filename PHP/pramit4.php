<?php

function average($arr){
    $sum = array_sum($arr);
    $count = count($arr);
    return $sum / $count;
}

$numbers = [10,20,30,40];

echo "Average = " . average($numbers);

?>
<br><br>
Name:Pramit Maharjan<br>
Symbol no:20800605
