<?php
require_once("includes/config.php");

if(isset($_POST['save']))
{
  
	// To call external php file for validation
	require_once("includes/validations.php");
   
	// call function for validations which is created into validations.php file
		$errors = validate_create_usernew();
		
	if(empty($errors))
	{
		$checkUserEmail=mysqli_fetch_assoc(mysqli_query($conn,"SELECT email FROM users WHERE email='".$_POST['email']."'"));
		if(!empty($checkUserEmail))
		{
			$errors['email']= "Email already exist ";
		}
		else
		{
			$insertUser = "INSERT INTO users set 
			tokenid='".md5("user_".date('y-m-d-h-i-s').rand(100000,999999))."', 
			name='".ucwords($_POST['name'])."', 
			email='".$_POST['email']."', 
            password='".$_POST['password']."', 
			status='".ucfirst($_POST['status'])."',
			created='".date("Y-m-d h:i:s")."'";
			if(mysqli_query($conn,$insertUser))
			{
				unset($_POST);
                header("location:signup.php");
				$success ='true';
				
			} 
			else 
			{
				$success ='false'; 
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
							
						<div class="panel-heading  panel-primary">
							<h4 class="panel-title">Signup</h4>
              <!-- <div style="color: green";><?php //echo $success;    ?></div> -->
              <!-- <div style="color: red";><?php //echo $errors;    ?></div> -->
						</div>
						<br/>
						<div class="col-md-12">
                        <div class="form-group">
								<label class="control-label">Name</label><span class="text text-danger"> * <?php echo(isset($errors['name']))?$errors['name']:'';?></span>
								<input type="text" class="form-control" name="name" placeholder="Enter Name" value="<?php echo(isset($_POST['name']))?$_POST['name']:'';?>" autocomplete="off"/>
							</div>

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
							&emsp; &nbsp;
							<button type="submit" class="btn btn-success btn-sm" name="save" value="save">Sign up</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	<?php require_once("includes/scripts.php"); ?>
	</body>
</html>