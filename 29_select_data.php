<?php

// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "757449";
$database = "contacts";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect:".mysqli_connect_error());
}
else{
    echo "connection was successful<br>";
}

$sql = 'select * from emp';
$result = mysqli_query($conn, $sql);

// find no of rows/records present in the table.
$num = mysqli_num_rows($result); 
echo $num;
echo '<br>';

// display the rows returned by the sql query

?>