
<?php

$file_pointer = fopen("myfile.txt", "r");
// echo fgets($file_pointer); // reads first line.
// reading a file line by line
/*
while($a = fgets($file_pointer)){ 
    echo $a;
}
*/
/*

// reading a file character by character
while($a = fgetc($file_pointer)){ 
    echo $a;
}
*/

// Write a program which reads the content of a file until . has been encountered

while($a = fgetc($file_pointer)){ 
    echo $a;
    if($a == "."){
        break;
    }
}

fclose($file_pointer);


?>