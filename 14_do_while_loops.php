<?php
/*
$i = 1;
while($i<11){
    echo $i;
    echo "<br>";
    $i += 1;  // or $i++;
}
*/

$i = 1;
do{
    echo "$i <br>"; // even if the condition becomes false, this line will execute once for sure.
    $i++;
} while($i<5);

?>
