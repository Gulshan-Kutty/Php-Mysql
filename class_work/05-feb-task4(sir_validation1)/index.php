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
			<form class="form-horizontal" role="form" method="post" action="files.php" enctype="multipart/form-data">
				<h1 class="text-center">Form With PHP</h1>
				<div class="form-group">
					<label class="col-sm-2 col-md-2 col-xs-12 control-label">Name</label>
					<div class="col-sm-10 col-md-10 col-xs-12">
						<input type="text" class="form-control" name="name" placeholder="Enter Your Name"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 col-md-2 col-xs-12 control-label">Password</label>
					<div class="col-sm-10 col-md-10 col-xs-12">
						<input type="password" class="form-control" name="password" placeholder="Enter Your Passwords"/>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 col-md-2 col-xs-12 control-label">Address</label>
					<div class="col-sm-10 col-md-10 col-xs-12">
						<textarea class="form-control" name="address" placeholder="Enter Your Address"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Gender</label>
					<div class="col-sm-10">
						<label class="radio-inline">
							<input type="radio" name="gender" value="male"/>Male
						</label>
						<label class="radio-inline">
							<input type="radio" name="gender" value="female" />Female
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Hobbies</label>
					<div class="col-sm-10">
						<label class="checkbox-inline">
							<input type="checkbox" name="hobbies[]" value="reading" />Reading
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="hobbies[]" value="singing" />Singing
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="hobbies[]" value="dancing" />Dancing
						</label>
						<label class="checkbox-inline">
							<input type="checkbox" name="hobbies[]" value="playing" />Playing
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Select</label>
					<div class="col-sm-10 ">
						<select class="form-control" name="city">
							<option value="0">-- Select City --</option>
							<option value="Nagpur">Nagpur</option>
							<option value="Pune">Pune</option>
							<option value="Mumbai">Mumbai</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">Photo</label>
					<div class="col-sm-10">
						<input type="file" class="form-control" name="photo" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button type="submit" class="btn btn-danger" name="save">Save</button>
					</div>
				</div>
			</form>
		</div>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/main.js"></script>
	</body>
</html>