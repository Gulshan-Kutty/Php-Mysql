<?php
require_once("includes/config.php");



// Function to validate login
function login($email, $password, $conn) {
    // Check if email exists in users table and user status is active
    $sql = "SELECT id, password, status FROM users WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // Email exists
        $row = mysqli_fetch_assoc($result);
        $user_id = $row["id"];
        $correct_password = $row["password"];
        $user_status = $row["status"];

        if ($user_status == "active") {
            // User status is active, check password
            $sql = "SELECT COUNT(*) AS attempts_count FROM attempts WHERE user_id = $user_id AND password = '$password'";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $attempts_count = $row["attempts_count"];

            if ($attempts_count >= 3) {
                echo "You are blocked.";
            } else {
                if ($password === $correct_password) {
                    echo "Login successful!";
                } else {
                    echo "Wrong password.";
                    // Insert attempt record
                    $sql = "INSERT INTO attempts (user_id, password) VALUES ($user_id, '$password')";
                    if (!mysqli_query($conn, $sql)) {
                        echo "Error: " . mysqli_error($conn);
                    }
                }
            }
        } else {
            echo "Your account is not active. Please contact support.";
        }
    } else {
        echo "Email doesn't exist.";
    }
}

// Check if form is submitted and if email and password are set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["password"])) {
    $email = $_POST["email"];
    $password = md5($_POST["password"]);

    // Call login function
    login($email, $password, $conn);
}

// Close connection
mysqli_close($conn);

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login</title>
		<?php require_once("includes/head.php"); ?>
	</head>
	<body>
		<div class="container">
			<br/>
			<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
				<div class="panel panel-primary">
					<div>
						<?php //require_once("includes/navigation.php"); ?>
					</div>
					<div class="panel-body">
						<!-- <?php 
							//if(isset($success) && $success=="true")
							//{ ?>
								<div class="alert alert-success"><?php// echo "//user has been created successfully"; ?></div>
							<?php// } ?>
							<?php 
							//if(isset($success) && $success=="false")
							//{ ?>
								<div class="alert alert-danger"><?php //echo "Unable to create user please try again"; ?></div>
							<?php// } ?> -->
							
						<div class="panel-heading  panel-primary">
							<h4 class="panel-title">Login</h4>
						</div>
						<br/>
						<div class="col-md-12">
							

							<div class="form-group">
								<label class="control-label">Email</label><span class="text text-danger"> * <?php echo(isset($errors['email']))?$errors['email']:'';?></span>
								<input type="text" class="form-control" name="email" placeholder="Enter email" value="<?php echo(isset($_POST['email']))?$_POST['email']:'';?>" autocomplete="off" required/>
							</div>
							<div class="form-group">
								<label class="control-label">Password</label><span class="text text-danger"> * <?php echo(isset($errors['password']))?$errors['password']:'';?></span>
								<input type="password" class="form-control" name="password" placeholder="Enter password" value="<?php echo(isset($_POST['password']))?$_POST['password']:'';?>" autocomplete="off" required/>
							
							</div>


							
						</div>
					</div>
					<div class="panel-footer">
						<div class="form-group">
							&emsp; &nbsp;<button type="submit" class="btn btn-success btn-sm" name="login">Login</button>
							<button type="button" class="btn btn-danger btn-sm" name="back" onclick="window.location='sign_up.php'">Sign up</button>
						</div>
					</div>
				</div>
			</form>
            
		</div>
	<?php require_once("includes/scripts.php"); ?>
	</body>
</html>