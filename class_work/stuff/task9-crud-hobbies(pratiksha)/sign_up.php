<?php
require_once("includes/config.php");
$msg='';
if(isset($_POST['login'])){
    require_once("includes/validations.php");
    $errors = validate_signup();
	if(empty( $errors )){
    $checkemail = mysqli_fetch_assoc(mysqli_query($conn, "SELECT email FROM users WHERE email='".$_POST['email']."'"));
    if(!empty($checkemail)){
        echo "Email already exist";
    }
    else{
        $checkepassword = mysqli_fetch_assoc(mysqli_query($conn, "SELECT email,password,name FROM users WHERE email='". $_POST['email'] . "' and password='" . $_POST['password'] . "'"));
        if(empty($checkepassword)){
            echo "sign up successful";
			echo "<script>setTimeout(\"location.href = 'http://localhost/TBS-PHP/MY-PHP/task9-crud-hobbies/';\",1500);</script>" ;

            //header("location:login.php");
            //exit();
            $insertuser = "INSERT INTO users set 
			name='" . ($_POST['name']) . "',
            email='" . ($_POST['email']) . "',
            password='" . ($_POST['password']) . "'";
            //unset($_POST);
            if (mysqli_query($conn, $insertuser)) {
            unset($_POST);
            }
        }
    }
}

	

}
    


?>
<!DOCTYPE html>
<html>
	<head>
		<title>Sign UP</title>
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
						<?php 
							if(isset($success) && $success=="true")
							 { ?>
							<div class="alert alert-success"><?php echo "user has been created successfully"; ?></div>
							<?php } ?>
							<?php 
							if(isset($success) && $success=="false")
							{ ?>
								<div class="alert alert-danger"><?php echo "Unable to create user please try again"; ?></div>
							<?php } ?>
							
						<div class="panel-heading  panel-primary">
							<h4 class="panel-title">Sign Up</h4>
						</div>
						<br/>
						<div class="col-md-12">
						<div class="form-group">
								<label class="control-label">Name</label><span class="text text-danger"> * <?php echo(isset($errors['name']))?$errors['name']:'';?></span>
								<input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo(isset($_POST['name']))?$_POST['name']:'';?>" autocomplete="off" />
							</div>

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
							&emsp; &nbsp;<button type="submit" class="btn btn-success btn-sm" name="login">Sign Up</button>
							<!-- <button type="button" class="btn btn-danger btn-sm" name="back" onclick="window.location='sign_up.php'">Sign up</button> -->
						</div>
					</div>
				</div>
			</form>
            
		</div>
	<?php require_once("includes/scripts.php"); ?>
	</body>
</html>