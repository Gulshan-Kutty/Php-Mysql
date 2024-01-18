<?php
echo "Welcome to Mysql database<br>";
/* Ways to connect to a Mysql database
1. MySQLi extension( i stands for improved)
2. PDO
*/

// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "757449";

// Create a connection
$conn = mysqli_connect($servername, $username, $password);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect:".mysqli_connect_error());
}
else{
    echo "connection was successful<br>";
}

?>


