<?php
  require_once("includes/config.php");
  $getallusers = mysqli_query($conn,"SELECT * FROM users  WHERE status='Inactive' order by name");
  $userrow = mysqli_fetch_array($getallusers);

   $unblock=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE name='".$userrow['name']."' and email= '".$userrow['email']."'"));
      
   $unblock = "UPDATE users SET 
             status='Active',
             modified=now() WHERE email= '".$userrow['email']."'";
           
             if(mysqli_query($conn,$unblock))
             {
                
                mysqli_query($conn,"DELETE FROM attempts WHERE email= '".$userrow['email']."'");
               
               unset($_POST);
             header("location:admin1.php"); 
              // echo "<script>setTimeout(\"location.href = 'http://localhost/TBS-PHP/signin/users_details.php';\",1500);</script>";
 
                 
             } 
             else 
             {
                echo'false'; 
             }	    

?>