<?php
require_once("includes/config.php");

// Function to validate login
function login($email, $password, $conn) {
    // Check if email exists in users table and user status is active
    $sql = "SELECT id, password, status FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Email exists
        $row = $result->fetch_assoc();
        $user_id = $row["id"];
        $correct_password = $row["password"];
        $user_status = $row["status"];

        if ($user_status == "active") {
            // User status is active, check password
            // Check attempts left and update status
            $sql = "SELECT attempts_left, status FROM attempts WHERE user_id = $user_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $attempts_left = $row["attempts_left"];
                $status = $row["status"];

                if ($attempts_left > 1) {
                    if ($status == "inactive") {
                        $sql = "UPDATE attempts SET status = 'active' WHERE user_id = $user_id";
                        $conn->query($sql);
                    }
                    if ($password === $correct_password) {
                        echo "Login successful!";
                    } else {
                        echo "Wrong password, $attempts_left attempts left.";
                        $attempts_left--;
                        $sql = "UPDATE attempts SET attempts_left = $attempts_left WHERE user_id = $user_id";
                        $conn->query($sql);
                    }
                } elseif ($attempts_left == 1) {
                    if ($status == "inactive") {
                        $sql = "UPDATE attempts SET status = 'active' WHERE user_id = $user_id";
                        $conn->query($sql);
                    }
                    if ($password === $correct_password) {
                        echo "Login successful!";
                    } else {
                        echo "Wrong password, 1 attempt left. Your account will be blocked after this attempt.";
                        $attempts_left--;
                        $sql = "UPDATE attempts SET attempts_left = $attempts_left WHERE user_id = $user_id";
                        $conn->query($sql);
                    }
                } else {
                    // Third wrong attempt
                    echo "Your account has been blocked.";
                    // Insert user data into attempts table
                    $sql = "INSERT INTO attempts (user_id, status) VALUES ($user_id, 'active')";
                    $conn->query($sql);
                    // Set status to inactive for all previous attempts
                    $sql = "UPDATE attempts SET status = 'inactive' WHERE user_id = $user_id";
                    $conn->query($sql);
                }
            } else {
                echo "Error: Unable to fetch attempts left.";
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
    $password = $_POST["password"];

    // Call login function
    login($email, $password, $conn);
}

// Close connection
$conn->close();

?>


<!DOCTYPE html>
<html>

<head>
	<title>Login</title>
	<?php require_once("includes/head.php"); ?>
</head>

<body>
	<div class="container">
		<br />
		<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
			<div class="panel panel-primary">
				<div>
					<?php //require_once("includes/navigation.php"); 
					?>
				</div>
				<div class="panel-body">
					<!-- <?php
							//if (isset($success) && $success == "true") { 
							?>
						<div class="alert alert-success"><?php //echo "user has been created successfully"; 
															?></div>
					<?php // } 
					?>
					<?php
					//if (isset($success) && $success == "false") { 
					?>
						<div class="alert alert-danger"><?php //echo "Unable to create user please try again"; 
														?></div>
					<?php // } 
					?> -->

					<div class="panel-heading  panel-primary">
						<h4 class="panel-title">Login</h4>
					</div>
					<br />
					<div class="col-md-12">


						<div class="form-group">
							<label class="control-label">Email</label><span class="text text-danger"> * <?php echo (isset($errors['email'])) ? $errors['email'] : ''; ?></span>
							<input type="text" class="form-control" name="email" placeholder="Enter email" value="<?php echo (isset($_POST['email'])) ? $_POST['email'] : ''; ?>" autocomplete="off" />
						</div>

						<div class="form-group">
							<label class="control-label">Password</label><span class="text text-danger"> * <?php echo (isset($errors['password'])) ? $errors['password'] : ''; ?></span>
							<input type="password" class="form-control" name="password" placeholder="Enter password" value="<?php echo (isset($_POST['password'])) ? $_POST['password'] : ''; ?>" autocomplete="off" />

							<?php
							echo "<h5>$msg</h5>";
							?>
						</div>



					</div>
				</div>
				<div class="panel-footer">
					<div class="form-group">
						&emsp; &nbsp;<button type="submit" class="btn btn-success btn-sm" name="login">Login</button>
						<button type="button" class="btn btn-danger btn-sm" name="back" onclick="window.location='hobby_manage.php'">Sign up</button>
					</div>
				</div>
			</div>
		</form>
	</div>
	<?php require_once("includes/scripts.php"); ?>
</body>

</html>