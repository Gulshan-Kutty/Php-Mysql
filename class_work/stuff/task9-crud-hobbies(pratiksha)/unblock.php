<?php 
$conn=mysqli_connect("localhost","root","0011","ci_guestbook");
// To fetch all record from users table
$getallusers = mysqli_query($conn,"SELECT * FROM users  WHERE status='Inactive' order by name");
$row=mysqli_fetch_assoc($getallusers );
$unblock=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE name='".$row['name']."'and email='".$row['email']."'"));

$unblock = "UPDATE users SET  
        status='Active', modified=now()
        WHERE email = '".($row['email'])."'";
        if (mysqli_query($conn, $unblock)) {

            mysqli_query($conn,"DELETE FROM attempts WHERE email='".$row['email']."'");
            unset($_POST);
            header("location:user_details.php");
        }

?>