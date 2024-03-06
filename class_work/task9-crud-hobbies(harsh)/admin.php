<?php
require_once("includes/config.php");

$res = '';
$ans = '';

if (isset($_POST['login'])) {
  $check_login_row = mysqli_fetch_assoc(mysqli_query($conn, "select count(*) as total_count from attempts WHERE email = '" . ($_POST['email']) . "'"));
  $wrongentries = $check_login_row['total_count'];
  //print_r($wrongentries);
  if ($wrongentries >= 2) {
    //print_r($wrongentries);
    $ans = "Too Many Failed Attempts<br> You Have Been 'BLOCKED' Please Contact Admin.";
    
    $update = "UPDATE admin SET  
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

  require_once("includes/validations.php");
  //$errors =  validate_signin();


  if (isset($_POST['login'])) {
    $checkemail = mysqli_fetch_assoc(mysqli_query($conn, "SELECT email FROM admin WHERE email='" . $_POST['email'] . "'"));

    if (!empty($checkemail)) {
      $checkpassword = mysqli_fetch_assoc(mysqli_query($conn, "SELECT id,password,email FROM admin WHERE password='" . $_POST['password'] . "' and email='" . $_POST['email'] . "'"));

      if (!empty($checkpassword)) {

        $checkstatus = mysqli_fetch_assoc(mysqli_query($conn, "SELECT status FROM admin WHERE status='Active'"));
        if (!empty($checkstatus)) {
          $res = "login Successfully";
         
          //print_r($checkemail);
          if ($_POST['email'] == "harshbhoyar@gmail.com" ) {
            echo "<script>setTimeout(\"location.href = 'http://localhost/TBS-PHP/SIR-PHP/task9-crud-hobbies/admin1.php';\",1500);</script>";

            //header("location:http://localhost/TBS-PHP/signin/project/PROJECT1.html");
          }
        }
      } elseif (empty($checkpassword)) {
        $checkpassword = mysqli_fetch_assoc(mysqli_query($conn, "SELECT password FROM admin WHERE password='" . $_POST['password'] . "'"));


        if (empty($checkpassword)) {
          $insertpassword = "INSERT INTO attempts set 
                  email='" . ($_POST['email']) . "',
                  entries='" . ($_POST['password']) . "'";
          unset($_POST);
          if (mysqli_query($conn, $insertpassword)) {
            unset($_POST);
          }
        }

        //$res = 'Wrong Password';
        $wrongentries++;
        $w_attempts=3-$wrongentries;
        if($w_attempts==0){
          $ans = "Too Many Failed Attempts<br> You Have Been 'BLOCKED' Please Contact SuperAdmin.";
        }
        else{
          $ans="Wrong Password<br>$w_attempts attempts remaining";
        }
      }
    } elseif (empty($checkemail)) {
      $checkemail = mysqli_fetch_assoc(mysqli_query($conn, "SELECT email FROM admin WHERE email='" . $_POST['email'] . "'"));
      if (empty($checkemail)) {
        $ans = "Admin Doesn't Exist";
      }
    }
  }
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Admin </title>
		<?php require_once("includes/head.php"); ?>
	</head>
	<body>
		<div class="container">
			<br/>
			<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
				<div class="panel panel-primary">
					<div>
						<?php //require_once("includes/navigation.php"); ?>
					</div>
					<div class="panel-body">
							
						<div class="panel-heading  panel-primary">
							<h4 class="panel-title">Admin</h4>
              <div style="color: green";><?php echo $res;    ?></div>
              <div style="color: red";><?php echo $ans;    ?></div>
						</div>
						<br/>
						<div class="col-md-12">
							

							<div class="form-group">
								<label class="control-label">Admin Email</label><span class="text text-danger"> * <?php echo(isset($errors['email']))?$errors['email']:'';?></span>
								<input type="text" class="form-control" name="email" placeholder="Enter email" value="<?php echo(isset($_POST['email']))?$_POST['email']:'';?>" autocomplete="off"/>
							</div>
							<div class="form-group">
								<label class="control-label">Password</label><span class="text text-danger"> * <?php echo(isset($errors['password']))?$errors['password']:'';?></span>
								<input type="password" class="form-control" name="password" placeholder="Enter password" value="<?php echo(isset($_POST['password']))?$_POST['password']:'';?>" autocomplete="off"/>
							</div>


							
						</div>
					</div>
					<div class="panel-footer">
						<div class="form-group">
							&emsp; &nbsp;<button type="submit" class="btn btn-success btn-sm" name="login">Login</button>						</div>
					</div>
				</div>
			</form>
		</div>
	<?php require_once("includes/scripts.php"); ?>
	</body>
</html>