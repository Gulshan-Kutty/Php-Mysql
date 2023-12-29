<?php
// Operators in PHP
/*
1. Arithmetic Operators
2. Assignment Operators
3. Comparison Operators
4. Logical Operators
*/

$a = 45;
$b = 5;

// 1. Arithmetic Operators
echo "For a + b, the result is ". ($a + $b). "<br>"; 
echo "For a - b, the result is ". ($a - $b). "<br>"; 
echo "For a * b, the result is ". ($a * $b). "<br>"; 
echo "For a / b, the result is ". ($a / $b). "<br>"; 
echo "For a % b, the result is ". ($a % $b). "<br>"; 
echo "For a ** b, the result is ". ($a ** $b). "<br>"; 

// 2. Assignment Operator
$x = $a;
echo "For x, the value is ". $x . "<br>"; 
$a += 6;
echo "For a, the value is ". $a. "<br>"; 

echo $a;
echo '<br>';

// 3. Comparison Operator
$x = 7;
$y = 9;

echo "For x == y, the result is ";
echo var_dump($x == $y);
echo "<br>"; 
echo "For x > y, the result is ";
echo var_dump($x > $y);
echo "<br>";
echo "For x < y, the result is ";
echo var_dump($x < $y);
echo "<br>"; 
echo "For x <> y, the result is ";
echo var_dump($x <> $y);
echo "<br>"; 
echo "For x <= y, the result is ";
echo var_dump($x <= $y);
echo "<br>";
echo "For x >= y, the result is ";
echo var_dump($x >= $y);
echo "<br>";

// 4. Logical Operators
$m = true;
$n = false;
echo "For m and n, the result is ";
echo var_dump($m and $n);  // and--> &&
echo "<br>";
echo "For m or n, the result is ";
echo var_dump($m or $n);  // or-->||
echo "<br>";
echo "For m && n, the result is ";
echo var_dump($m and $n);  // and--> &&
echo "<br>";
echo "For m || n, the result is ";
echo var_dump($m or $n);  // or-->||
echo "<br>";
echo "For !m, the result is ";
echo var_dump(!$m); 
echo "<br>";
?>