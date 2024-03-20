<?php
$conn = mysqli_connect("localhost","root", "757449", "test_ajax") or die("Connection Failed");

$result = mysqli_query($conn, "SELECT * FROM students");
while ($row = mysqli_fetch_assoc($result)) {
    echo $row['first_name'] . "<br>"; // Accessing a column value by its name
}

echo "-----------------------<br>";


$result1 = mysqli_query($conn, "SELECT * FROM students");
while ($row = mysqli_fetch_array($result1)) {
    echo $row['first_name'] . "<br>"; // Accessing a column value by its name
    echo $row[0] . "<br>"; // Accessing a column value by its offset
}

?>