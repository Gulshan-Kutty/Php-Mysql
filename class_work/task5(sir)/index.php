<?php
if(isset($_POST['save']))
{
	// To call external php file for validation
	require_once("includes/validations.php");



	// call function for validations which is created into validations.php file
	$errors = validate_form();

	// print_r($errors);exit;
	
}
?>
<?php include_once("includes/header.php"); ?>


		<div class="container">
			<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
				<h1 class="text-center">Form With PHP</h1>
				<!-- <?php if(isset($errors) && !empty($errors)){?>
				<div class="alert alert-danger">
				<?php echo implode("<br/>",$errors);?>
				</div>	
				<?php } ?> -->
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label">Name</label><span class="text text-danger"> * <?php echo(isset($errors['name']))?$errors['name']:'';?></span>
						<input type="text" class="form-control" name="name" placeholder="Enter Your Name" value="<?php echo(isset($_POST['name']))?$_POST['name']:'';?>"/>
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
						<label class="control-label">City</label><span class="text text-danger"> * <?php echo(isset($errors['city']))?$errors['city']:'';?></span>
							<select class="form-control" name="city" value="<?php echo(isset($_POST['city']))?$_POST['city']:'';?>">
								<option value="0" <?php echo(isset($_POST['city']) && $_POST['city']==0)?'selected':' ';?>>-- Select City --</option>
								<option value="1" <?php echo(isset($_POST['city']) && $_POST['city']==1)?'selected':' ';?>>Nagpur</option>
								<option value="2" <?php echo(isset($_POST['city']) && $_POST['city']==2)?'selected':' ';?>>Pune</option>
								<option value="3" <?php echo(isset($_POST['city']) && $_POST['city']==3)?'selected':' ';?>>Mumbai</option>
							</select>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
						<label class="control-label">Photo</label><span class="text text-danger"> * <?php echo(isset($errors['photo']))?$errors['photo']:'';?></span>
						<input type="file" class="form-control" name="photo" />
					</div>
				</div>
				<div class="form-group col-md-1">
					<button type="submit" class="btn btn-danger" name="save">Save</button>
				</div>
			</form>
		</div>
		<?php require_once("includes/footer.php"); ?>		