<?php
	function validate_form()
	{
		$error=array();
		$MINLENGTH = strlen($_POST['password'])<8;
		$MAXLENGTH = strlen($_POST['password'])>=16;
		$allowtypes=array('image/jpg','image/jpeg','image/png');

		(empty(trim($_POST['name'])) ? $error['name'] = "Please enter your name" : (preg_match('/^[a-zA-Z\s]+$/', $_POST['name']) ? $_POST['name'] : $error['name'] = 'Enter valid name' ));


		empty(trim($_POST['password'])) ? $error['password'] = "Please enter your password " : ($MINLENGTH ? $error['password'] = "Your password length must be atleast 8 characters": ($MAXLENGTH ? $error['password'] = "Your password should not exceed 15 characters": md5($_POST['password'])));

		(empty($_POST['pin'])) ? $error['pin'] = "Please enter pin" : (preg_match('/^\d{6}$/', $_POST['pin']) ? $_POST['pin'] : $error['pin'] = 'Enter valid pin' );

		(empty($_POST['pan'])) ? $error['pan'] = "Please enter pan no" : (preg_match('/^[A-Za-z]{5}\d{4}[A-Za-z]$/', $_POST['pan']) ? strtoupper($_POST['pan']) : $error['pan'] = 'Enter valid pan no' );

		(empty($_POST['aadhar'])) ? $error['aadhar'] = "Please enter aadhar no" : (preg_match('/^\d{12}$/', $_POST['aadhar']) ? $_POST['aadhar'] : $error['aadhar'] = 'Enter valid aadhar no' );

		(empty($_POST['email'])) ? $error['email'] = "Please enter your email" : (preg_match('/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/', $_POST['email']) ? $_POST['email'] : $error['email'] = 'Enter valid email address' );

		(empty($_POST['mobile'])) ? $error['mobile'] = "Please enter your mobile no" : (preg_match('/^[6-9]\d{9}$/', $_POST['mobile']) ? $_POST['mobile'] : $error['mobile'] = 'Enter valid mobile no' );

		empty(trim($_POST['address'])) ? $error['address'] = "Please enter your address" : $_POST['address'];

		(empty($_POST['gender'])) ? $error['gender'] = "Please select your gender" : ucfirst($_POST['gender']); 

		(empty($_POST['hobbies'])) ? $error['hobbies'] = "Select at least 1 hobby" : ucwords(implode(" | ", $_POST['hobbies'])) ;

		empty($_POST['city']) ? $error['city'] = "Please select your city" : $_POST['city'];

		($_FILES['photo']['error']==4) ? $error['photo'] = "Please upload your photo" : (!in_array($_FILES['photo']['type'],$allowtypes) ? $error['photo']="Please Select jpg, jpeg and png type of file":"") ;

		return $error;
	}
?>