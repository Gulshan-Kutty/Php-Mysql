<?php

$file_pointer = fopen("myfile.txt", "r");
// echo $file_pointer;
if (!$file_pointer){
    die("Unable to open this file. Please enter valid filename");

}

else{
    $content = fread($file_pointer, filesize("myfile.txt"));
    // fclose($file_pointer); // as soon we read the file, don't forget to close the file.
    print_r($content);
}

fclose($file_pointer);
?>