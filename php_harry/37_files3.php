<?php
// Writing to a file in php
echo "Welcome to write files in php";
// $file_pointer = fopen("myfile2.txt", "w");
// fwrite($file_pointer, "This is the best file on this planet.\n");
// fwrite($file_pointer, "This is another content.\n");
// fwrite($file_pointer, "This is another content2.\n");

// Appending to a file in php
$file_pointer = fopen("myfile2.txt", "a");
fwrite($file_pointer, "This is being appended to the file.\n");

fclose($file_pointer);
?>