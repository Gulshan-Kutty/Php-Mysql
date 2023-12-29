<?php

// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "";
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

// insert data into the table
$sql = "insert into emp(eno, ename, mob_no) values (101,'mithun',123456)";
$result = mysqli_query($conn, $sql);

// Check for the data insertion success
if($result){
    echo "The data was inserted successfully<br>";
}
else{
    echo "The data was not inserted successfully because of this error.--->". mysqli_error($conn);
}

?>