<?php 
				print_r($_POST);
				print_r($_FILES['photo']['name']); //exit;
				echo "<br>";
				$photoType = $_FILES['photo']['type'];
				if($photoType == 'image/png' || $photoType == 'image/jpeg')
				{
					print_r("Pass"); //exit;
				}
				else{
					print_r("Invalid file format, please upload only png or jpg file format"); exit;
				}
				// print_r($photoType); exit;

			?>

			<p>Name = <?php echo strtoupper($_POST['name']); ?></p>

			<p>Name = <?php echo (empty($_POST['name'])) ? "Name is required" : $_POST['name']; ?></p> 
			<p>Password = <?php echo md5($_POST['password']); ?></p>
			<p>Address = <?php echo $_POST['address']; ?></p>
			<p>Gender = <?php echo ucfirst($_POST['gender']); ?></p>
			<p>Hobbies = <?php echo ucwords(implode(" | ", $_POST['hobbies'])); ?></p>
			<p>City = <?php echo $_POST['city']; ?></p>
			<p>Photo_name = <?php echo $_FILES['photo']['name']; ?></p>
			<p>Photo_type = <?php echo $_FILES['photo']['type']; ?></p>
			<p>Photo_tmp_name = <?php echo $_FILES['photo']['tmp_name']; ?></p>
			<p>Photo_error = <?php echo $_FILES['photo']['error']; ?></p>
			<p>Photo_size = <?php echo $_FILES['photo']['size']; ?></p>