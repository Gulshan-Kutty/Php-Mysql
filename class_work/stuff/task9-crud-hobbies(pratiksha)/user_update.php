<?php
require_once("includes/config.php");

// print_r($_GET['id']); exit;
if(!isset($_GET['tokenid']) && empty($_GET['tokenid']))
{

	header("location:user_manage.php");
}
else
{
	if(isset($_POST['update']))
	{
		// To call external php file for validation
		require_once("includes/validations.php");

		// call function for validations which is created into validations.php file
		$errors = validate_update_user();
			
		if(empty($errors))
		{
			$checkuserduplication=mysqli_fetch_assoc(mysqli_query($conn,"SELECT id,name FROM users WHERE name='".$_POST['name']."' and tokenid != '".base64_decode($_GET['tokenid'])."'"));



			if(!empty($checkuserduplication))
			{
				$errors['name']= "User already exist ";
			}
			else
			{
				$updateuser = "UPDATE users SET 
				name='".ucwords($_POST['name'])."',
				email='".($_POST['email'])."', 
				password='".($_POST['password'])."', 
				status='".ucfirst($_POST['status'])."',
				modified=now() WHERE tokenid = '".base64_decode($_GET['tokenid'])."'";
				if(mysqli_query($conn,$updateuser))
				{
					unset($_POST);
					$success ='true'; 
				} 
				else 
				{
					$success ='false'; 
				}	
			}	
		}
	}
	$_POST = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id, name, email,status FROM users WHERE tokenid = '".base64_decode($_GET['tokenid'])."'"));

	// print_r($_POST); exit;

	if(empty($_POST))
	{
		header("location:user_manage.php");
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Update User</title>
		<?php require_once("includes/head.php"); ?>
	</head>
	<body>
		<div class="container">
			<br/>
			<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
				<div class="panel panel-primary">
					<div>
						<?php require_once("includes/navigation.php"); ?>
					</div>
					<div class="panel-body">
						<?php 
							if(isset($success) && $success=="true")
							{ ?>
								<div class="alert alert-success"><?php echo "User has been updated successfully"; 
								echo "<script>setTimeout(\"location.href = 'http://localhost/TBS-PHP/MY-PHP/task9-crud-hobbies/user_manage.php';\",1500);</script>" ;
								?></div>
							<?php } ?>
							<?php 
							if(isset($success) && $success=="false")
							{ ?>
								<div class="alert alert-danger"><?php echo "Unable to update user please try again"; ?></div>
							<?php } ?>
							
						<div class="panel-heading  panel-primary">
							<h4 class="panel-title">Update User</h4>
						</div>
						<br/>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label">User</label><span class="text text-danger"> * <?php echo(isset($errors['name']))?$errors['name']:'';?></span>


								<input type="text" class="form-control" name="name" placeholder="Enter name" value="<?php echo(isset($_POST['name']))?$_POST['name']:'';?>" autocomplete="off"/>


							</div>
							<div class="form-group">
								<label class="control-label">Email</label><span class="text text-danger"> * <?php echo(isset($errors['email']))?$errors['email']:'';?></span>


								<input type="text" class="form-control" name="email" placeholder="Enter email" value="<?php echo(isset($_POST['email']))?$_POST['email']:'';?>" autocomplete="off"/>


							</div>
							<div class="form-group">
								<label class="control-label">Password</label><span class="text text-danger"> * <?php echo(isset($errors['password']))?$errors['password']:'';?></span>


								<input type="text" class="form-control" name="password" placeholder="Enter password" value="<?php echo(isset($_POST['password']))?$_POST['password']:'';?>" autocomplete="off"/>


							</div>
							<div class="form-group">
								<label class=" control-label">Status</label><span class="text text-danger"> * <?php echo(isset($errors['status']))?$errors['status']:'';?></span>
								<br/>
								<label class="radio-inline">
									<input type="radio" name="status" value="Active" <?php echo(isset($_POST['status'])) && $_POST['status']=="Active"?'checked':' ';?> />Active
								</label>
								<label class="radio-inline">
									<input type="radio" name="status" value="Block" <?php echo(isset($_POST['status'])) && $_POST['status']=="Block"?'checked':' ';?>/>Block
								</label>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<div class="form-group">
							&emsp; &nbsp;<button type="submit" class="btn btn-success btn-sm" name="update">Update</button>
							<button type="button" class="btn btn-danger btn-sm" name="back" onclick="window.location='user_manage.php'">Cancel</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	<?php require_once("includes/scripts.php"); ?>
	</body>
</html>