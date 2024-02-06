<?php
// $arr = array('this','that','what');
// echo "$arr[0]<br>";
// echo "$arr[1]<br>";
// echo "$arr[2]<br>";


// Associative arrays
$favcol = array('arun'=>'red', 'rohan'=>'green', 'harry'=>'blue', 8=>'pink');
/*
echo $favcol['arun'];
echo "<br>";
echo $favcol['rohan'];
echo "<br>";
echo $favcol['harry'];
echo "<br>";
echo $favcol[8];
echo "<br>";
*/

foreach ($favcol as $key => $value) {
    echo "Fav color of $key is $value<br>";
}
?>