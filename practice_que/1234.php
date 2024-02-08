<?php
$a = 10;

function gul(){
    global $b;
    $b = 23;
    global $a;
    echo "$a<br>";
    echo "$b<br>";
}

gul();
// echo $a;
echo "$b<br>";
?>