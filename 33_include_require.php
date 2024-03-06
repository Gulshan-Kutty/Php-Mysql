<?php

include '_dbconnect.php'; // if file not present then throws just warning and executes the remaining code.
require '_dbconnect.php'; // if file not present then throws error and terminates the entire code.

include '_dbconnect1.php'; // if file not present then shows just warning and executes the remaining code.
echo "Good";
require '_dbconnect1.php'; // if file not present then throws error and terminates the entire code.
echo "Good";

?>