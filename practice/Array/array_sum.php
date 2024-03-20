<?php
$arr = [1,2,3,4,5,6,7,8];

// using for loop
$sum = 0;
for ($i=0; $i < count($arr); $i++) { 
    # code...
    $sum += $arr[$i];
}
echo $sum;
echo "<br>";


// using foreach loop
$sum = 0;
foreach ($arr  as $key => $value) {
    # code...
    $sum += $value;
}
echo $sum;
echo "<br>";

// using array_sum()
echo array_sum($arr);


?>