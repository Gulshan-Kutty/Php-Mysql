<?php

require_once("includes/config.php");
$getallcities = mysqli_query($conn, "SELECT row_number() over () as sr_no, name, email_address, password, photo FROM users");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">


    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Fetch data from  database in php</title>
    
  </head>
  <body class="bg-dark">
    <div class="container" >
      <div class="row">
        <div class="col">
          <div class="card mt-2 ">
       <div class="card-body color-white">
      <table class="table table-bordered text-center text-black ">
        <tr class=" text-center">
          <th> sr_no</th>
          <th> password</th>
          <th> name</th>
          <th> email_address</th>
          <th> photo</th>
         
          
        </tr>
        <tr >
         <?php 
        //  $count = 1;
         while($cityrow = mysqli_fetch_array($getallcities))
         {
  
          ?>
           <td><?php echo $cityrow['sr_no']; ?></td>
           <td><?php echo $cityrow['name']; ?></td>
           <td><?php echo $cityrow['email_address']; ?></td>
           <td><?php echo $cityrow['password']; ?></td>
        
           <td><img src="uploads/photo/<?php echo $cityrow['photo']; ?>" height="100px" width="100px"/></td>
           <?php// $count++;  ?>
           
        </tr>
           <?php
         }
         
         ?>
       
          
        
            </div>
          </div>
        </div>
      </div>

      </table>
    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script> -->
  </body>
</html>