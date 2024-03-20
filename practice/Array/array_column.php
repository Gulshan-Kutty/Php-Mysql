<?php
// Multidimensional associative array
$marks = array(
    'Krishna'=>array('physics'=>85, 'chemistry'=>89, 'math'=>78),
    'Salman'=>array('physics'=>68, 'chemistry'=>79, 'math'=>73),
    'Mohan'=>array('physics'=>62, 'chemistry'=>92, 'math'=>67)
);

print_r($marks);
echo "<br>";

$arr_col = array_column($marks, 'chemistry');
print_r($arr_col);

?>