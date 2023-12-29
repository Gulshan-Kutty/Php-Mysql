<?php
$name = "Gulshan";
$a = "He is a good boy";
echo $name;
echo "<br>";
echo gettype(strlen($name));
echo "<br>";

echo "The length of my "."string is ". strlen($name);
// . is the concatenation operator i.e it helps to join the strings
echo "<br>";
echo str_word_count($a);
echo "<br>";
echo strrev($name);
echo "<br>";
echo strpos($a,"is"); // gives the index position of start of query string/character.
echo "<br>";
echo str_replace("He","Ishwar",$a);
echo "<br>";
echo str_repeat($name, 5);
echo "<br>";
echo "<pre>"; // if we have many spaces in a string and if we them as it is to render then <pre> helps to keep that as it is.
echo rtrim("    this is a good boy    ");
echo "<br>";
echo ltrim("    this is a good boy    ");
echo "</pre>";


?>