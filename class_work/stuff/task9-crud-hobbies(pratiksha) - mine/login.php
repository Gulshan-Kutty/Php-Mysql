<?php
// require_once("includes/config.php");
$conn=mysqli_connect("localhost","root","0011","login");


if(isset($_POST['login']))
{
	
	// To call external php file for validation
	require_once("includes/validations.php");

	// call function for validations which is created into validations.php file
		$errors = validate_login();
		//print_r($_POST); exit;
	// if(empty($errors))
	// {
	// 	
	// 	$checkUser=mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM users WHERE email='".$_POST['email']."' and password = '".MD5($_POST['password'])."'"));
	// 	if(!empty($checkUser))
	// 	{
	// 		print_r("Login Successfully done."); 
	// 	}
	// 	else{
	// 		print_r("Invalid login credentials.");
	// 	}

	// 	//print_r($checkUser); exit;


	// }$check_login_row=mysqli_fetch_assoc(mysqli_query($conn,"select count(*) as total_count from attempts where try_time> $time and ip_address='$ip_address'"));
	$time=time()-30;
	$check_login_row=mysqli_fetch_assoc(mysqli_query($conn,"select count(*) as total_count from attempts where try_time> $time"));

	$total_count=$check_login_row['total_count'];
	if($total_count==3){
		$msg="Too many login attempts. Please try after 30sec";
	}
	else{
		$email=mysqli_real_escape_string($conn,$_POST['email']);
		// $password=mysqli_real_escape_string($conn,$_POST['password']);
		$sql="select * from users where email='$email';";

		$res=mysqli_query($conn,$sql);

		if (mysqli_num_rows($res) > 0) {
			
			$row = mysqli_fetch_assoc($res);
			if($email==isset($row['email']))
			{
					echo "email already exists";
			}
			else{
				$email=mysqli_real_escape_string($conn,$_POST['email']);
				$password=mysqli_real_escape_string($conn,$_POST['password']);
				$sql="select * from users where email='".$email."' and password='".$password."'";
				$res=mysqli_query($conn,$sql);
		//print_r($res);
				if(mysqli_num_rows($res)){
					$msg="login successful";
					// mysqli_query($conn,"delete from attempts where ip_address='$ip_address'");

					if($msg=="login successful"){
						header("location:index.php");
						exit();
					}

			
				}
			}
			
			}
		else{
	
//do your insert code here or do something (run your code)
	// $row = mysqli_fetch_assoc(mysqli_query($conn,"INSERT INTO `users` (`email`, `password`) VALUES ('$email','$password')"));
	// $insertuser = "INSERT INTO `users` (`email`, `password`) VALUES ('$email','$password')";
	// $res = mysqli_query($conn,$insertuser);
	// if(!empty($res)){
	// 	echo "login successfull";
	// }
	// else{
	// 	echo "invalid login credentials";
	// }
	
		// else{
		// 	$total_count++;
		// 	$rem_attm=3-$total_count;
		// 	if($rem_attm==0){
		// 		$msg="Too many login attempts. Please try after 30sec";

		// 	}
		// 	else{
		// 		$msg="Please Enter Valid Login Details.<br> $rem_attm attempts remaining";

		// 	}
		// 	$try_time=time();
		// 	// mysqli_query($conn,"INSERT INTO attempts (ip_address,try_time) values('$ip_address','$try_time')");
		// }
	
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