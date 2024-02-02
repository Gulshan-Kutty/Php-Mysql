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

$sql = 'UPDATE emp SET mob_no = 9988776688 WHERE eno in (103,104)';
$result = mysqli_query($conn, $sql);
echo var_dump($result);

$aff = mysqli_affected_rows($conn);
echo "<br>Number of affected rows: $aff<br>";

if($result){
    echo "We updated the records successfully";

}
else{
    echo "We could not update the records";
}


?>