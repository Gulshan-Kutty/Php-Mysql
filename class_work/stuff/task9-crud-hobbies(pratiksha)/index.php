<?php
require_once("includes/config.php");
$msg='';
if(isset($_POST['login'])){
    require_once("includes/validations.php");
    $errors = validate_login();

    $check_login_row=mysqli_fetch_assoc(mysqli_query($conn,"select count(*) as total_count from attempts where email ='" . ($_POST['email']) . "'"));
    $total_count=$check_login_row['total_count'];
	//print_r($total_count);exit();
    if($total_count >= 3){
		
		$msg ="Too many login attempts. You have been BLOCKED!";
		$update = "UPDATE attempts SET  
        status='Inactive'
        WHERE email = '".($_POST['email'])."'";
        if (mysqli_query($conn, $update)) {
			$update1 = "UPDATE users SET  
        status='Inactive'
        WHERE email = '".($_POST['email'])."'";
		if (mysqli_query($conn, $update1)) {
        unset($_POST);
        $success = 'true';
        } else {
        $success = 'false';
        }
	}

		
        
	}
	if(isset($_POST['login'])){
    $checkemail = mysqli_fetch_assoc(mysqli_query($conn, "SELECT email FROM users WHERE email='".$_POST['email']."'"));
    if(!empty($checkemail)){
        $checkepassword = mysqli_fetch_assoc(mysqli_query($conn, "SELECT email,password FROM users WHERE email='". $_POST['email'] . "' and password='" . $_POST['password'] . "'"));
        if(!empty($checkepassword)){
            $checkstatus = mysqli_fetch_assoc(mysqli_query($conn, "SELECT status FROM users WHERE status='Active'"));
            if(!empty($checkstatus)){
                $msg= "login successful";
                header("location:frontpage.php");
                exit();
            }
			
        }
        elseif(empty($checkepassword)){
            $insertpassword = "INSERT INTO attempts set 
            email='" . ($_POST['email']) . "',
            password='" . ($_POST['password']) . "'";
            unset($_POST);
            if (mysqli_query($conn, $insertpassword)) {
            unset($_POST);
            }
        }
       
		
		//$msg=" wrong password.";
			$total_count++;
			$rem_attempt = 3-$total_count;
			if($rem_attempt==0){
				$msg="Too many login attempts. You have been blocked!";
			}
			else{
				$msg="wrong password. $rem_attempt attempts remaining";
			}
		
    }
    elseif (empty($checkemail)) {
        $checkemail = mysqli_fetch_assoc(mysqli_query($conn, "SELECT email FROM users WHERE email='". $_POST['email']."'"));
        if (empty($checkemail)) {
            $msg= "Email Doesn't Exist";
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
			<br/>
			<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
				<div class="panel panel-primary">
					<div>
						<?php //require_once("includes/navigation.php"); ?>
					</div>
					<div class="panel-body">
						<!-- <?php 
							//if(isset($success) && $success=="true")
							//{ ?>
								<div class="alert alert-success"><?php// echo "//user has been created successfully"; ?></div>
							<?php// } ?>
							<?php 
							//if(isset($success) && $success=="false")
							//{ ?>
								<div class="alert alert-danger"><?php //echo "Unable to create user please try again"; ?></div>
							<?php// } ?> -->
							
						<div class="panel-heading  panel-primary">
							<h4 class="panel-title">Login</h4>
						</div>
						<br/>
						<div class="col-md-12">
							

							<div class="form-group">
								<label class="control-label">Email</label><span class="text text-danger"> * <?php echo(isset($errors['email']))?$errors['email']:'';?></span>
								<input type="text" class="form-control" name="email" placeholder="Enter email" value="<?php echo(isset($_POST['email']))?$_POST['email']:'';?>" autocomplete="off" required/>
							</div>
							<div class="form-group">
								<label class="control-label">Password</label><span class="text text-danger"> * <?php echo(isset($errors['password']))?$errors['password']:'';?></span>
								<input type="password" class="form-control" name="password" placeholder="Enter password" value="<?php echo(isset($_POST['password']))?$_POST['password']:'';?>" autocomplete="off" required/>
								<?php 
								echo "<h5>$msg</h5>";
								?>
							</div>


							
						</div>
					</div>
					<div class="panel-footer">
						<div class="form-group">
							&emsp; &nbsp;<button type="submit" class="btn btn-success btn-sm" name="login">Login</button>
							<button type="button" class="btn btn-danger btn-sm" name="back" onclick="window.location='sign_up.php'">Sign up</button>
						</div>
					</div>
				</div>
			</form>
            
		</div>
	<?php require_once("includes/scripts.php"); ?>
	</body>
</html>