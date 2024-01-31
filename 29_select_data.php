<?php

// Connecting to the Database
$servername = "localhost";
$username = "root";
$password = "757449";
$database = "contact_us";

// Create a connection
$conn = mysqli_connect($servername, $username, $password, $database);

// Die if connection was not successful
if (!$conn){
    die("Sorry we failed to connect:".mysqli_connect_error());
}
else{
    echo "connection was successful<br>";
}

$sql = 'select * from contacts';
$result = mysqli_query($conn, $sql);

// find the no of rows/records present in the table.
$num = mysqli_num_rows($result); 
echo $num;
echo '<br>';

// display the rows returned by the sql query
if($num>0){
    $row = mysqli_fetch_assoc($result);
    echo var_dump($row);
    echo '<br>';
    $row = mysqli_fetch_assoc($result);
    echo var_dump($row);
    echo '<br>';
    $row = mysqli_fetch_assoc($result);
    echo var_dump($row);
    echo '<br>';
    $row = mysqli_fetch_assoc($result);
    echo var_dump($row);
    echo '<br>';
    $row = mysqli_fetch_assoc($result);
    echo var_dump($row);
    echo '<br>';
    $row = mysqli_fetch_assoc($result);
    echo var_dump($row);
    echo '<br>';
    $row = mysqli_fetch_assoc($result);
    echo var_dump($row);
    echo '<br>';

}

?>