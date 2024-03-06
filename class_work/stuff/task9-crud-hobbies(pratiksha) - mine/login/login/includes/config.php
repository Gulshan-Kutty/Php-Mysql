<?php

$conn=mysqli_connect("localhost","root","1100") or die("unable to connect server");

mysqli_select_db($conn,"login") or die("unable to select database");

date_default_timezone_set("asia/kolkata");

?>