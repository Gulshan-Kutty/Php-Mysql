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

$sql = 'DELETE FROM emp WHERE eno = 104';
$result = mysqli_query($conn, $sql);

$aff = mysqli_affected_rows($conn);
echo "Number of affected rows: $aff<br>";

if($result){
    echo "We deleted the records successfully";

}
else{
    $err = mysqli_error($conn);
    echo "We could not delete the records due to this error---> $err";
}


?>