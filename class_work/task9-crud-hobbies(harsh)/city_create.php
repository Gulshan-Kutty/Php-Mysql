<?php
require_once("includes/config.php");

if(isset($_POST['save']))
{
	// To call external php file for validation
	require_once("includes/validations.php");

	// call function for validations which is created into validations.php file
	$errors = validate_create_city();
		
	if(empty($errors))
	{
		$checkcityname=mysqli_fetch_assoc(mysqli_query($conn,"SELECT cityname FROM cities WHERE cityname='".$_POST['cityname']."'"));

		
		// print_r($_POST);
		if(!empty($checkcityname))
		{
			$errors['cityname']= "city already exist ";
		}
		else
		{
			$insertcity = "INSERT INTO cities set 
			tokenid='".md5("cities_".date('y-m-d-h-i-s').rand(100000,999999))."',
            country_id='".$_POST['country_id']."', 
            state_id='".$_POST['state_id']."', 
			cityname='".ucwords($_POST['cityname'])."', 
			status='".ucfirst($_POST['status'])."',
			created='".date("Y-m-d h:i:s")."',
			modified='".date("Y-m-d h:i:s")."'";
			// print_r($inserthobby);exit();
			if(mysqli_query($conn,$insertcity))

			{
				unset($_POST);

				$success ='true';
			//	header("Location:city_manage.php");
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
		<title>Create - Manage city</title>
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
								<div class="alert alert-success"><?php echo "city has been created successfully";
								echo "<script>setTimeout(\"location.href = 'http://localhost/Php-Mysql/class_work/task9-crud-hobbies(harsh)/city_manage.php';\",1500);</script>";
								?></div>
							<?php } ?>
							<?php 
							if(isset($success) && $success=="false")
							{ ?>
								<div class="alert alert-danger"><?php echo "Unable to create city please try again"; ?></div>
							<?php } ?>
							
						<div class="panel-heading  panel-primary">
							<h4 class="panel-title">Create city</h4>
						</div>
						<br/>
						<div class="col-md-12">
							
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
									<select class="form-control" name="state_id" value="<?php echo(isset($_POST['state_id']))?$_POST['country_id']:'';?>">
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
								<label class="control-label">City</label><span class="text text-danger"> *
									 <?php echo(isset($errors['cityname']))?$errors['cityname']:'';?>
							
							</span>
								<input type="text" class="form-control" name="cityname" placeholder="Enter city" value="<?php echo(isset($_POST['cityname']))?$_POST['cityname']:'';?>" autocomplete="off"/>
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
							<button type="button" class="btn btn-danger btn-sm" name="back" onclick="window.location='city_manage.php'">Cancel</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	<?php require_once("includes/scripts.php"); ?>
	</body>
</html>