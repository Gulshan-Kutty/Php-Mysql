<?php

$arr = array('bananas', 'apples', 'harpic','bread'); // numeric array/indexed array

for ($i=0 ; $i < count($arr) ; $i++ ) { 
    # code...
    echo $arr[$i];
    echo '<br>';
}  // not a good method for iterable object

echo '-------------------------<br>';

// better way to do this is using foreach loop as it is used to for iterable/sequential object
foreach ($arr as $value) {
    # code...
    echo $value;
    echo "<br>";
}



?>