<?php
	//connection with mysql server
	$conn = mysqli_connect("localhost","root","757449")or die("Unable to connect server please contact admin");
	
	mysqli_select_db($conn,"user_login") or die("Unable to Select Database");

	// Setup for timezone 
	date_default_timezone_set("asia/kolkata");
?>