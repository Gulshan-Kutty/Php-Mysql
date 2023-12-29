<?php

// $a = 40; // global variable
// $b = 56;

// function printvalue(){
//     $a = 97; // local variable
//     // if the local variable name is same as global variable name then it will give preference to local variable first

//     global $a,$b; // give access to global variables and also allow us to modify global varibles.
//     echo "$b<br>";
//     echo "The value of your variable is $a";
//     echo "<br>";
// }
// echo "$a<br>";
// printvalue();
$a = 10;

function gul(){
    global $a;
    echo $a;
}
  
gul();
?>


