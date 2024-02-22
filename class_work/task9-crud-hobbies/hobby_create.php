<?php
require_once("includes/config.php");

if(isset($_POST['save']))
{
	// To call external php file for validation
	require_once("includes/validations.php");

	// call function for validations which is created into validations.php file
	$errors = validate_create_hobby();
		
	if(empty($errors))
	{
		$checkhobbyname=mysqli_fetch_assoc(mysqli_query($conn,"SELECT hobbyname FROM hobbies WHERE hobbyname='".$_POST['hobbyname']."'"));

		
		
		if(!empty($checkhobbyname))
		{
			$errors['hobbyname']= "Hobby already exist ";
		}
		else
		{
			$inserthobby = "INSERT INTO hobbies set 
			tokenid='".md5("hobbies_".date('y-m-d-h-i-s').rand(100000,999999))."', 
			hobbyname='".ucwords($_POST['hobbyname'])."', 
			status='".ucfirst($_POST['status'])."',
			created='".date("Y-m-d h:i:s")."'";
			if(mysqli_query($conn,$inserthobby))
			{
				unset($_POST);

				//$success ='true';
				
				header("Location: hobby_manage.php"); 
				exit;
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
		<title>Create - Manage Hobbies</title>
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
								<div class="alert alert-success"><?php echo "Hobby has been created successfully"; ?></div>
							<?php } ?>
							<?php 
							if(isset($success) && $success=="false")
							{ ?>
								<div class="alert alert-danger"><?php echo "Unable to create hobby please try again"; ?></div>
							<?php } ?>
							
						<div class="panel-heading  panel-primary">
							<h4 class="panel-title">Create Hobby</h4>
						</div>
						<br/>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label">Hobby</label><span class="text text-danger"> *
									 <?php echo(isset($errors['hobbyname']))?$errors['hobbyname']:'';?>
							
							</span>
								<input type="text" class="form-control" name="hobbyname" placeholder="Enter Hobby" value="<?php echo(isset($_POST['hobbyname']))?$_POST['hobbyname']:'';?>" autocomplete="off"/>
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
							&emsp; &nbsp;<button type="submit" class="btn btn-success btn-sm" name="save">Create</button>
							<button type="button" class="btn btn-danger btn-sm" name="back" onclick="window.location='hobby_manage.php'">Cancel</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	<?php require_once("includes/scripts.php"); ?>
	</body>
</html>