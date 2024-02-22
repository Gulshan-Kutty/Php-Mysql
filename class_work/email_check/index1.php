<?php
require_once("includes/config.php");



// Fetch all allowed emails from the database
$sql = "SELECT email FROM users";
$result = mysqli_query($conn, $sql);

$allowed_emails = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $allowed_emails[] = $row["email"];
    }
	// print_r($allowed_emails);
} else {
    // No allowed emails found in the database
    die("No allowed emails found in the database.");
}

// Check if the user has submitted the form
if(isset($_POST['login'])) {
    // Get the entered email
    $email = $_POST['email'];

    // Check if the email is in the list of allowed emails
    if(in_array($email, $allowed_emails)) {
        // Successful login
        echo "Login successful!";
    } else {
        // Increment the login attempts
        if(!isset($_SESSION['login_attempts'])) {
            $_SESSION['login_attempts'] = 1;
        } else {
            $_SESSION['login_attempts']++;
        }

        // Check the number of login attempts
        if($_SESSION['login_attempts'] < 3) {
            // Wrong email
            echo "Wrong email. Please try again.";
        } else {
            // Blocked after 3 failed attempts
            echo "You are blocked.";
            // You might want to add additional logic here like logging the IP address and time of the attempt, or sending a notification to the admin
        }
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
						<label class="control-label">Email</label><span class="text text-danger"> * <?php //echo(isset($errors['name']))?$errors['name']:'';?></span> 
						<input type="text" class="form-control" name="email" placeholder="Enter Your Email" value="<?php echo(isset($_POST['email']))?$_POST['email']:'';?>"/>
					</div>
					
				</div>
			
				<div class="form-group col-md-1">
					<button type="submit" class="btn btn-danger" name="login">Login</button>
				</div>
			</form>
		</div>
		<script src="assets/js/jquery.min.js"></script>
		<script src="assets/js/bootstrap.min.js"></script>
		<script src="assets/js/main.js"></script>
	</body>
</html>