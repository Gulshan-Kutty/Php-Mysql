<?php
require_once("includes/config.php");

if(isset($_POST['save']))
{
	// To call external php file for validation
	require_once("includes/validations.php");

	// call function for validations which is created into validations.php file
	$errors = validate_create_state();
		
	if(empty($errors))
	{
		$checkstatename=mysqli_fetch_assoc(mysqli_query($conn,"SELECT statename FROM states WHERE statename='".$_POST['statename']."'"));

		
		// print_r($_POST);
		if(!empty($checkstatename))
		{
			$errors['statename']= "state already exist ";
		}
		else
		{
			$insertstate = "INSERT INTO states set 
			tokenid='".md5("states_".date('y-m-d-h-i-s').rand(100000,999999))."',
            country_id='".$_POST['country_id']."', 
			statename='".ucwords($_POST['statename'])."', 
			status='".ucfirst($_POST['status'])."',
			created='".date("Y-m-d h:i:s")."',
			modified='".date("Y-m-d h:i:s")."'";
			// print_r($inserthobby);exit();
			if(mysqli_query($conn,$insertstate))

			{
				unset($_POST);

				$success ='true';
			//	header("Location:state_manage.php");
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
		<title>Create - Manage State</title>
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
								<div class="alert alert-success"><?php echo "state has been created successfully";
								echo "<script>setTimeout(\"location.href = 'http://localhost/Php-Mysql/class_work/task9-crud-hobbies(harsh)/state_manage.php';\",1500);</script>";
								?></div>
							<?php } ?>
							<?php 
							if(isset($success) && $success=="false")
							{ ?>
								<div class="alert alert-danger"><?php echo "Unable to create state please try again"; ?></div>
							<?php } ?>
							
						<div class="panel-heading  panel-primary">
							<h4 class="panel-title">Create State</h4>
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
								<label class="control-label">State</label><span class="text text-danger"> *
									 <?php echo(isset($errors['statename']))?$errors['statename']:'';?>
							
							</span>
								<input type="text" class="form-control" name="statename" placeholder="Enter state" value="<?php echo(isset($_POST['statename']))?$_POST['statename']:'';?>" autocomplete="off"/>
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
							<button type="button" class="btn btn-danger btn-sm" name="back" onclick="window.location='state_manage.php'">Cancel</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	<?php require_once("includes/scripts.php"); ?>
	</body>
</html>