<?php

// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "757449";
$database = "dbgul";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect:".mysqli_connect_error());
}
else{
    echo "connection was successful<br>";
}
// Variables to be inserted into the table
$empno = 102;
$name = 'Samrat';
$contact = 9786859593;

// sql query to be executed
$sql = "insert into emp(eno, ename, mob_no) values ('$empno','$name','$contact')";
$result = mysqli_query($conn, $sql);

// Check for the data insertion success
if($result){
    echo "The data was inserted successfully<br>";
}
else{
    echo "The data was not inserted successfully because of this error.--->". mysqli_error($conn);
}

?>