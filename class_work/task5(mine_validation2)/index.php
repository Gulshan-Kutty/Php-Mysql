<?php
if(isset($_POST['save'])) //It checks if a form element with the name "save" has been submitted using the HTTP POST method. If it has been submitted, the condition evaluates to true.
{
	// To call external php file for validation
	require_once("includes/validations.php"); //The require_once statement ensures that the file is included only once in the script execution, preventing duplicate inclusions.



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
						<input type="password" class="form-control" name="password" placeholder="Enter Your Passwords" value="<?php echo(isset($_POST['password']))?$_POST['password']:'';?>"/>
					</div>
					<div class="form-group">
						<label class="control-label">Pincode</label><span class="text text-danger"> * <?php echo(isset($errors['pin']))?$errors['pin']:'';?></span>
						<input type="text" class="form-control" name="pin" placeholder="Enter Your Pincode" value="<?php echo(isset($_POST['pin']))?$_POST['pin']:'';?>" maxlength="6"/>
					</div>
					<div class="form-group">
						<label class="control-label">Pan</label><span class="text text-danger"> * <?php echo(isset($errors['pan']))?$errors['pan']:'';?></span>
						<input type="text" class="form-control" name="pan" placeholder="Enter Your Pan Number" value="<?php echo(isset($_POST['pan']))?$_POST['pan']:'';?>" maxlength="10"/>
					</div>
					<div class="form-group">
						<label class="control-label">Aadhar Number</label><span class="text text-danger"> * <?php echo(isset($errors['aadhar']))?$errors['aadhar']:'';?></span>
						<input type="text" class="form-control" name="aadhar" placeholder="Enter Your Aadhar Number" value="<?php echo(isset($_POST['aadhar']))?$_POST['aadhar']:'';?>" maxlength="12"/>
					</div>
					<div class="form-group">
						<label class="control-label">Email Address</label><span class="text text-danger"> * <?php echo(isset($errors['email']))?$errors['email']:'';?></span>
						<input type="text" class="form-control" name="email" placeholder="Enter Your Email" value="<?php echo(isset($_POST['email']))?$_POST['email']:'';?>"/>
					</div>
					<div class="form-group">
						<label class="control-label">Mobile</label><span class="text text-danger"> * <?php echo(isset($errors['mobile']))?$errors['mobile']:'';?></span>
						<input type="text" class="form-control" name="mobile" placeholder="Enter Your Mobile Number" value="<?php echo(isset($_POST['mobile']))?$_POST['mobile']:'';?>" maxlength="10"/>
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