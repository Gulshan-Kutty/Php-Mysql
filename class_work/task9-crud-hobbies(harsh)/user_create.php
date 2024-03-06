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
			// print_r($_POST); exit();
			$insertUser = "INSERT INTO users set 
			tokenid='".md5("user_".date('y-m-d-h-i-s').rand(100000,999999))."', 
			name='".ucwords($_POST['name'])."', 
			email='".$_POST['email']."',
			password='".$_POST['password']."',  
			country_id='".$_POST['country_id']."', 
            state_id='".$_POST['state_id']."', 
            city_id='".$_POST['city_id']."', 
			status='".ucfirst($_POST['status'])."',
			created='".date("Y-m-d h:i:s")."',
			modified='".date("Y-m-d h:i:s")."'";
			// print_r($insertUser); exit();
			if(mysqli_query($conn,$insertUser))
			{
				unset($_POST);

				$success ='true';
				header("Location: user_manage.php");
				
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
		<title>Create - Manage Users</title>
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
								<div class="alert alert-success"><?php echo "user has been created successfully";
								echo "<script>setTimeout(\"location.href = 'http://localhost/Php-Mysql/class_work/task9-crud-hobbies(harsh)/user_manage.php';\",1500);</script>";
								?></div>
							<?php } ?>
							<?php 
							if(isset($success) && $success=="false")
							{ ?>
								<div class="alert alert-danger"><?php echo "Unable to create user please try again"; ?></div>
							<?php } ?>
							
						<div class="panel-heading  panel-primary">
							<h4 class="panel-title">Create User</h4>
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
								<input type="text" class="form-control" name="password" placeholder="Enter password" value="<?php echo(isset($_POST['password']))?$_POST['password']:'';?>" autocomplete="off"/>
							</div>
							<div class="form-group">	
						    	<label class="control-label">Country</label><span class="text text-danger"> * <?php echo(isset($errors['country_id']))?$errors['country_id']:'';?></span>
									<select class="form-control" name="country_id" value="<?php echo(isset($_POST['country_id']))?$_POST['country_id']:'';?>">
									<option value="0" <?php echo(isset($_POST['country_id']) && $_POST['country_id']==0)?'selected':' ';?>>-- Select Country --</option>
									<?php 
									$getallcountries = mysqli_query($conn, "SELECT id, countryname FROM countries WHERE status='Active' ORDER BY countryname");
									
									while($countryrow = mysqli_fetch_array($getallcountries)){
									?>
									<option value="<?php echo $countryrow['id']; ?>"><?php echo $countryrow['countryname']; ?></option>

									<?php 	} ?>
									</select>		
							</div>
							<div class="form-group">	
						    	<label class="control-label">State</label><span class="text text-danger"> * <?php echo(isset($errors['state_id']))?$errors['state_id']:'';?></span>
									<select class="form-control" name="state_id" value="<?php echo(isset($_POST['state_id']))?$_POST['state_id']:'';?>">
									<option value="0" <?php echo(isset($_POST['state_id']) && $_POST['state_id']==0)?'selected':' ';?>>-- Select State --</option>
									<?php 
									$getallstates = mysqli_query($conn, "SELECT id, statename FROM states WHERE status='Active' ORDER BY statename");
									
									while($staterow = mysqli_fetch_array($getallstates)){
									?>
									<option value="<?php echo $staterow['id']; ?>"><?php echo $staterow['statename']; ?></option>

									<?php 	} ?>
									</select>		
							</div>

							<div class="form-group">	
						    	<label class="control-label">City</label><span class="text text-danger"> * <?php echo(isset($errors['city_id']))?$errors['city_id']:'';?></span>
									<select class="form-control" name="city_id" value="<?php echo(isset($_POST['city_id']))?$_POST['city_id']:'';?>">
									<option value="0" <?php echo(isset($_POST['city_id']) && $_POST['city_id']==0)?'selected':' ';?>>-- Select State --</option>
									<?php 
									$getallcities = mysqli_query($conn, "SELECT id, cityname FROM cities WHERE status='Active' ORDER BY cityname");
									
									while($cityrow = mysqli_fetch_array($getallcities)){
									?>
									<option value="<?php echo $cityrow['id']; ?>"><?php echo $cityrow['cityname']; ?></option>

									<?php 	} ?>
									</select>		
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
							<button type="button" class="btn btn-danger btn-sm" name="back" onclick="window.location='user_manage.php'">Cancel</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	<?php require_once("includes/scripts.php"); ?>
	</body>
</html>