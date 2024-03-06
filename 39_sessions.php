<?php

// what is a session?
// used to manage information accross different pages

// verify the user login info
session_start();
$_SESSION['username']="Harry";
$_SESSION['favcat']="Books";
echo "we have saved your session";



?>