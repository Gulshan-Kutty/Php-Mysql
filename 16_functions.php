<?php

function process_marks($marksArr){
    $sum = 0;

    foreach ($marksArr as $value) {
        # code...
        $sum += $value;
    }

    return $sum;
}

$rohan = [23,34,45,56,67,77];

$sumMarks = process_marks($rohan);

echo "Total marks scored by rohan out of 600 is $sumMarks";

?>