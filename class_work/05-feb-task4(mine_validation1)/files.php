<?php 
				print_r($_POST);
				// print_r($_FILES);

				// print_r($_FILES['photo']['name']); //exit;
				// echo "<br>";
				// $photoType = $_FILES['photo']['type'];
				// if($photoType == 'image/png' || $photoType == 'image/jpeg')
				// {
				// 	print_r("Pass"); //exit;
				// }
				// else{
				// 	print_r("Invalid file format, please upload only png or jpg file format"); exit;
				// }
				// print_r($photoType); exit;
			?>

			

			<p>Name = <?php echo (empty($_POST['name'])) ? "Name is required" : (preg_match('/^[a-zA-Z\s]+$/', $_POST['name']) ? $_POST['name'] : 'Enter valid name' ); ?></p> 

			<p>Password = <?php echo (empty($_POST['password'])) ? "Password is required" : md5($_POST['password']); ?></p> 

			<p>Pin Code = <?php echo (empty($_POST['pin'])) ? "Pin is required" : (preg_match('/^\d{6}$/', $_POST['pin']) ? $_POST['pin'] : 'Enter valid pin' ); ?></p> 

			<p>Pan Card = <?php echo (empty($_POST['pan'])) ? "Pan no is required" : (preg_match('/^[A-Za-z]{5}\d{4}[A-Za-z]$/', $_POST['pan']) ? strtoupper($_POST['pan']) : 'Enter valid pan no' ); ?></p> 

			<p>Aadhar Card = <?php echo (empty($_POST['aadhar'])) ? "Aadhar no is required" : (preg_match('/^\d{12}$/', $_POST['aadhar']) ? $_POST['aadhar'] : 'Enter valid aadhar no' ); ?></p> 

			<p>Email = <?php echo (empty($_POST['email'])) ? "Email is required" : (preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $_POST['email']) ? $_POST['email'] : 'Enter valid email address' ); ?></p> 

	        <p>Mobile No = <?php echo (empty($_POST['mobile'])) ? "Mobile no is required" : (preg_match('/^[6-9]\d{9}$/', $_POST['mobile']) ? $_POST['mobile'] : 'Enter valid mobile no' ); ?></p> 
			
			<p>Address = <?php echo $_POST['address']; ?></p>

			<p>Gender = <?php echo (empty($_POST['gender'])) ? "Gender is required" : ucfirst($_POST['gender']); ?></p> 

			<p>Hobbies = <?php echo (empty($_POST['hobbies'])) ? "Select at least 1 hobby" : ucwords(implode(" | ", $_POST['hobbies'])) ; ?> </p>

			<p>City = <?php echo $_POST['city']; ?></p>

			


<?php
	if ($_FILES['photo']['error'] !== UPLOAD_ERR_OK) {
    	switch ($_FILES['photo']['error']) {
        	case UPLOAD_ERR_INI_SIZE:
        	case UPLOAD_ERR_FORM_SIZE:
           	 	echo "File size exceeds limit.";
            	break;
        	case UPLOAD_ERR_PARTIAL:
            	echo "The uploaded file was only partially uploaded.";
            	break;
        	case UPLOAD_ERR_NO_FILE:
				echo "No file was uploaded.<br>";
				break;
        	case UPLOAD_ERR_NO_TMP_DIR:
				echo "Missing temporary folder.";
				break;
			case UPLOAD_ERR_CANT_WRITE:
				echo "Failed to write file to disk.";
				break;
			case UPLOAD_ERR_EXTENSION:
				echo "A PHP extension stopped the file upload.";
				break;
			default:
				echo "Unknown upload error.";
				break;
		}
} 
else {
	?>
    File upload is successful.<br>
    <p>Photo_name = <?php echo $_FILES['photo']['name']; ?></p>
    <p>Photo_type = <?php echo $_FILES['photo']['type']; ?></p>
    <p>Photo_tmp_name = <?php echo $_FILES['photo']['tmp_name']; ?></p>
    <p>Photo_size = <?php echo $_FILES['photo']['size']; ?></p>
    <?php
}
?>


----------------------------OR------------------------------

<!-- else{
	echo "File upload is successful.<br>";
    echo "<p>Photo_name = " . $_FILES['photo']['name'] . "</p>";
    echo "<p>Photo_type = " . $_FILES['photo']['type'] . "</p>";
    echo "<p>Photo_tmp_name = " . $_FILES['photo']['tmp_name'] . "</p>";
    echo "<p>Photo_size = " . $_FILES['photo']['size'] . "</p>";
} -->



