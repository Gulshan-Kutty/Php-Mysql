<?php

if(isset($_POST['save'])){
    echo "Your Name is: ". $_POST['name'];
    echo "<br>";
    echo "Your Role is: ". $_POST['role'];
    echo "<br>";
    echo "Your Email is: ". $_POST['email'];
}else{
    echo "Hello";
}

?>