<?php
require_once("includes/config.php");

// To fetch all cities from table with id

//print_r($getallcities);exit();

if(isset($_POST['save']))
{
	// To call external php file for validation
	require_once("includes/validations.php");

	// call function for validations which is created into validations.php file
	$errors = validate_form();

	if(empty($errors))
	{
		if($_FILES['photo']['error']==0)
		{
			$attachment = time().$_FILES['photo']['name'];
			// print_r($attachment); exit;
			$src = $_FILES['photo']['tmp_name'];
			$dest = "uploads/photo/".$attachment;
			if(move_uploaded_file($src,$dest))
			{
				$_POST['photo'] = $attachment;
			}
		}
		
		// print_r($_POST); exit;
		$insertuser = "INSERT INTO users set 
		name='".ucwords($_POST['name'])."',
		email='".$_POST['email']."',
		password='".md5($_POST['password'])."',
		address='".$_POST['address']."',
		gender='".$_POST['gender']."',
		hobbies='".implode(", ",$_POST['hobbies'])."',
		city_id='".$_POST['city_id']."',
		photo='".$_POST['photo']."',
		created_at='".date("Y-m-d H:i:s")."',
		modified_at='".date("Y-m-d H:i:s")."'";

		// print_r($insertuser);

		if(mysqli_query($conn,$insertuser))
			echo "User has been created successfully";
		else
			echo "Unable to create please try again";	
	}
}


?>

<!DOCTYPE html>
<html>
	<head>
		<title>Form With PHP</title>
		<meta name="charset" content="utf-8"/>
		<meta name="viewport" content="width = device-width , initial-scale= 1.0"/>
		<link href="assets/css/bootstrap.min.css" type="text/css" rel="stylesheet"/>
		<link href="assets/css/style.css" type="text/css" rel="stylesheet"/>
	</head>
	<body>
		<div class="container">
			<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
				<h1 class="text-center">Form With PHP</h1>
				<?php if(isset($errors) && !empty($errors)){?>
				<div class="alert alert-danger">
				<?php echo implode("<br/>",$errors);?>
				</div>	
				<?php } ?>
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label">Name</label><span class="text text-danger"> * <?php echo(isset($errors['name']))?$errors['name']:'';?></span> 
						<input type="text" class="form-control" name="name" placeholder="Enter Your Name" value="<?php echo(isset($_POST['name']))?$_POST['name']:'';?>"/>
					</div>
					<div class="form-group">
						<label class="control-label">Email</label><span class="text text-danger"> * <?php echo(isset($errors['name']))?$errors['name']:'';?></span> 
						<input type="text" class="form-control" name="email" placeholder="Enter Your Email" value="<?php echo(isset($_POST['email']))?$_POST['email']:'';?>"/>
					</div>
					<div class="form-group">
						<label class="control-label">Password</label><span class="text text-danger"> * <?php echo(isset($errors['password']))?$errors['password']:'';?></span>
						<input type="password" class="form-control" name="password" placeholder="Enter Your Passwords"/>
					</div>
					<div class="form-group">
						<label class="control-label">Address</label><span class="text text-danger"> * <?php echo(isset($errors['address']))?$errors['address']:'';?></span>
						<textarea class="form-control" name="address" placeholder="Enter Your Address"><?php echo(isset($_POST['address']))?$_POST['address']:'';?></textarea>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label class=" control-label">Gender</label><span class="text text-danger"> * <?php echo(isset($errors['gender']))?$errors['gender']:'';?></span>
						<br/>
						<label class="radio-inline">
							<input type="radio" name="gender" value="male" <?php echo(isset($_POST['gender'])) && $_POST['gender']=="male"?'checked':' ';?> />Male
						</label>
						<label class="radio-inline">
							<input type="radio" name="gender" value="female" <?php echo(isset($_POST['gender'])) && $_POST['gender']=="female"?'checked':' ';?>/>Female
						</label>
					</div>
					<div class="form-group">
						<label class="control-label">Hobbies</label><span class="text text-danger"> * <?php echo(isset($errors['hobbies']))?$errors['hobbies']:'';?></span>
						<br/>
						<label class="checkbox-inline">
							<input type="checkbox" name="hobbies[]" value="reading" <?php echo(isset($_POST['hobbies'])) && in_array("reading",$_POST['hobbies'])?'checked':' ';?>/>Reading
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="hobbies[]" value="singing" <?php echo(isset($_POST['hobbies'])) && in_array("singing",$_POST['hobbies'])?'checked':' ';?>/>Singing
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="hobbies[]" value="dancing" <?php echo(isset($_POST['hobbies'])) && in_array("dancing",$_POST['hobbies'])?'checked':' ';?>/>Dancings
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="hobbies[]" value="playing" <?php echo(isset($_POST['hobbies'])) && in_array("playing",$_POST['hobbies'])?'checked':' ';?>/>Playing
						</label>
					</div>
					<div class="form-group">
				
								
						<label class="control-label">City</label><span class="text text-danger"> * <?php echo(isset($errors['city_id']))?$errors['city_id']:'';?></span>
							<select class="form-control" name="city_id" value="<?php echo(isset($_POST['city_id']))?$_POST['city_id']:'';?>">
								<option value="0" <?php echo(isset($_POST['city_id']) && $_POST['city_id']==0)?'selected':' ';?>>-- Select City --</option>
								
								<?php 
								$getallcities = mysqli_query($conn, "SELECT id,city_name FROM cities WHERE status='Active' ORDER BY city_name");
								while($cityrow = mysqli_fetch_array($getallcities)){
									
									?>
								<option value="<?php echo $cityrow['id']; ?>"><?php echo $cityrow['city_name']; ?></option>

							<?php 	} ?>
							</select>
					</div>

					<div class="form-group">
				
								
						<label class="control-label">countries</label><span class="text text-danger"> * <?php echo(isset($errors['countrie_id']))?$errors['countrie_id']:'';?></span>
							<select class="form-control" name="countrie_id" value="<?php echo(isset($_POST['countrie_id']))?$_POST['countrie_id']:'';?>">
								<option value="0" <?php echo(isset($_POST['countrie_id']) && $_POST['countrie_id']==0)?'selected':' ';?>>-- Select countrie --</option>
								
								<?php 
								$getallcountries = mysqli_query($conn, "SELECT id,country_name FROM countries WHERE status='Active' ORDER BY country_name");
								while($countrierow = mysqli_fetch_array($getallcountries)){
									
									?>
								<option value="<?php echo $countrierow['id']; ?>"><?php echo $countrierow['country_name']; ?></option>

							<?php 	} ?>
							</select>
					</div>

					<div class="form-group">
				
								
						<label class="control-label">state</label><span class="text text-danger"> * <?php echo(isset($errors['state_id']))?$errors['state_id']:'';?></span>
							<select class="form-control" name="state_id" value="<?php echo(isset($_POST['state_id']))?$_POST['state_id']:'';?>">
								<option value="0" <?php echo(isset($_POST['state_id']) && $_POST['state_id']==0)?'selected':' ';?>>-- Select state --</option>
								
								<?php 
								$getallstates = mysqli_query($conn, "SELECT id,state_name FROM states WHERE status='Active' ORDER BY state_name");
								while($staterow = mysqli_fetch_array($getallstates)){
									
									?>
								<option value="<?php echo $staterow['id']; ?>"><?php echo $staterow['state_name']; ?></option>

							<?php 	} ?>
							</select>
					</div>


				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label">Photo</label><span class="text text-danger"> * <?php echo(isset($errors['photo']))?$errors['photo']:'';?></span>
						<?php print_r($_FILES['photo'])?>
						<input type="file" class="form-control" name="photo" />
						<img src="uploads/photo/<?php echo $_POST['photo']; ?>" height="100px" width="100px"/>
					</div>
				</div>
				<div class="form-group col-md-1">
					<button type="submit" class="btn btn-danger" name="save">Save</button>
				</div>
			</form>
		</div>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/main.js"></script>
	</body>
</html>