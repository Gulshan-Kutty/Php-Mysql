<?php
// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "1100";
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

// Create a table in database
$sql = "create table emp (eno int(10) primary key, ename varchar(10) , mob_no int(10))";
$result = mysqli_query($conn, $sql);

// Check for the table creation success
if($result){
    echo "The table was created successfully<br>";
}
else{
    echo "The table was not created successfully because of this error.--->". mysqli_error($conn);
}
?>