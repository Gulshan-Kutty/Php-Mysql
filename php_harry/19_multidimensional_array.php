<?php

// 2-dimensional array
$multiarr = array(
    array("rohan", 34, 56),
    array("vijay",67,78),
    array("Shubham", 55, 66)
);

echo var_dump($multiarr);
echo "<br>";
echo $multiarr[1][2];
echo "<br><br>";

for ($i=0; $i < count($multiarr) ; $i++) { 
    echo var_dump($multiarr[$i]);
    echo "<br>";
}

echo "<br>";

// to print in matrix form
for ($i=0; $i <count($multiarr) ; $i++) { 
    for ($j=0; $j < count($multiarr[$i]); $j++) { 
        echo $multiarr[$i][$j];
        echo " ";
    }
    echo "<br>";
}



?>


























