<?php
require_once("includes/config.php");

if(isset($_POST['login']))
{
	
	// To call external php file for validation
	require_once("includes/validations.php");

	// call function for validations which is created into validations.php file
		$errors = validate_login();
		//print_r($_POST); exit;
	if(empty($errors))
	{
		$checkUser=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE email='".$_POST['email']."' and password = '".MD5($_POST['password'])."'"));
		if(!empty($checkUser))
		{
			print_r("Login Successfully done."); exit;
		}
		else{
			print_r("Invalid login credentials."); exit;
		}

		//print_r($checkUser); exit;


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
							<h4 class="panel-title">Login</h4>
						</div>
						<br/>
						<div class="col-md-12">
							

							<div class="form-group">
								<label class="control-label">Email</label><span class="text text-danger"> * <?php echo(isset($errors['email']))?$errors['email']:'';?></span>
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
							&emsp; &nbsp;<button type="submit" class="btn btn-success btn-sm" name="login">Login</button>
							<button type="button" class="btn btn-danger btn-sm" name="back" onclick="window.location='hobby_manage.php'">Sign up</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	<?php require_once("includes/scripts.php"); ?>
	</body>
</html>