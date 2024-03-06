<?php
require_once("includes/config.php");
//$conn=mysqli_connect("localhost","root","1100","login");

$res = '';
$ans = '';

if (isset($_POST['login'])) {

  require_once("includes/validations.php");
  $errors =  validate_login();

  if (empty($errors)) {

    $check_login_row = mysqli_fetch_assoc(mysqli_query($conn, "select count(*) as total_count from attempts WHERE email = '" . ($_POST['email']) . "' and status='Active'"));
    $wrongentries = $check_login_row['total_count'];

    if ($wrongentries >= 3) {

        $ans = "Too Many Failed Attempts<br> You Have Been 'BLOCKED' Please Contact Admin.";

        $update = "UPDATE users SET  
				status='Inactive'
				WHERE email = '" . ($_POST['email']) . "'";
        if (mysqli_query($conn, $update)) {
        $update1 = "UPDATE attempts SET  
        status='Inactive'
        WHERE email = '" . ($_POST['email']) . "'";
        if (mysqli_query($conn, $update1)) {

            unset($_POST);
            $success = 'true';
          } else {
            $success = 'false';
          }
        }
      
    } 
    else {
      $checkemail = mysqli_fetch_assoc(mysqli_query($conn, "SELECT email  FROM users WHERE email='" . $_POST['email'] . "'")); // checks if email is available in database. 

      if (!empty($checkemail)) {
        $checkpassword = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id,password,email,status FROM users WHERE password='" . ($_POST['password']) . "' and email='" . $_POST['email'] . "' and status='Active'")); // checks if the entered password is associated with the entered email and user status should be 'Active'. 

        print_r($checkpassword); exit();

        if (!empty($checkpassword)) {
          $res = "login Successfully";
          // header("location:frontpage.php");
          echo "<script>setTimeout(\"location.href = 'http://localhost/Php-Mysql/class_work/task9-crud-hobbies(harsh)/frontpage.php';\",1500);</script>"; // it prints the message "

        } elseif (empty($checkpassword)) {
          $insertpassword = "INSERT INTO attempts set 
                created_at=now(),
                modified_at=now(),
                  email='" . ($_POST['email']) . "',
                  password='" . md5($_POST['password']) . "'";
          unset($_POST);
          if (mysqli_query($conn, $insertpassword)) {
            unset($_POST);
          }
        


        //$res = 'Wrong Password';
        $wrongentries++;
        $w_attempts = 3 - $wrongentries;
        if ($w_attempts == 0) {
      
          $ans = "Too Many Failed Attempts<br> You Have Been 'BLOCKED' Please Contact Admin.";
        } else {
          $ans = "Wrong Password<br>$w_attempts attempts remaining";
        }
      }
     } elseif (empty($checkemail)) {
        $ans = "Email Doesn't Exist";
      }
    }
  }
}


?>
<!DOCTYPE html>
<html>

<head>
  <title>Login</title>
  <?php require_once("includes/head.php"); ?>
</head>

<body>
  <div class="container">
    <br />
    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
      <div class="panel panel-primary">
        <div>
          <?php //require_once("includes/navigation.php"); 
          ?>
        </div>
        <div class="panel-body">

          <div class="panel-heading  panel-primary">
            <h4 class="panel-title">Login</h4>
            <div style="color: green" ;><?php echo $res;    ?></div>
            <div style="color: red" ;><?php echo $ans;    ?></div>
          </div>
          <br />
          <div class="col-md-12">


            <div class="form-group">
              <label class="control-label">Email</label><span class="text text-danger"> * <?php echo (isset($errors['email'])) ? $errors['email'] : ''; ?></span>
              <input type="text" class="form-control" name="email" placeholder="Enter email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ''; ?>" autocomplete="off" />
            </div>
            <div class="form-group">
              <label class="control-label">Password</label><span class="text text-danger"> * <?php echo (isset($errors['password'])) ? $errors['password'] : ''; ?></span>
              <input type="password" class="form-control" name="password" placeholder="Enter password" value="<?php echo (isset($_POST['password'])) ? $_POST['password'] : ''; ?>" autocomplete="off" />
            </div>



          </div>
        </div>
        <div class="panel-footer">
          <div class="form-group">
            &emsp; &nbsp;<button type="submit" class="btn btn-success btn-sm" name="login">Login</button>
            <button type="button" class="btn btn-danger btn-sm" name="back" onclick="window.location='signup.php'">Sign up</button>
          </div>
        </div>
      </div>
    </form>
  </div>
  <?php require_once("includes/scripts.php"); ?>
</body>

</html>