<?php
$name = "gulshan";
$income = 200;

/* php data types
1. String
2. Integer
3. Float
4. Boolean
5. Object
6. Array
7. NULL
*/

// String -  Sequence of characters
$name = "Gulshan";
$friend = "Rohan";
echo "$name is friend of $friend<br>";

// Integer - non decimal number
$income = 455;
$debts = 655;
echo "$income<br>";
echo $debts;  // -- same as echo "$debts";
echo "<br>";

// Float - Decimal point number
$income = 344.5;
$debts = -45.5;
echo $income;
echo "<br>";
echo $debts;
echo "<br>";

// Boolean - can be either true or false
$x = TRUE;
$is_friend = false;
echo $x;
echo "<br>";
echo $is_friend; // -- returns empty 

echo "<br>";
echo var_dump($x);
echo "<br>";
echo var_dump($is_friend);

// Object - Instances of classes

// Array - Used to store multiple values in a single variable
echo "<br>";
$friends = array('rohan','sumit','ajay','rajat');
echo "<br>";
echo var_dump($friends);
echo "<br>";
echo $friends[0];
echo "<br>";
echo $friends[1];
echo "<br>";
echo $friends[2];
echo "<br>";
echo $friends[3];
echo "<br>";
// echo $friends[4]; // will throw an error as the size of array is 4.


// Null
$name = null;
echo var_dump($name);
?>