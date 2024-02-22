<?php
	function validate_form()
	{
		$error=array();
		$MINLENGTH = strlen($_POST['password'])<8;
		$MAXLENGTH = strlen($_POST['password'])>=16;
		$allowtypes=array('image/jpg','image/jpeg','image/png');
		if(empty(trim($_POST['name'])))
		{
			$error['name'] = "Please Enter your name";
		}
		elseif(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['name']))
		{
			$error['name'] = "Please Enter valid name";
		}
		if(empty(trim($_POST['password'])))
		{
			$error['password'] = "Please Enter your password";
		}
		elseif($MINLENGTH)
		{
			$error['password'] = "Please Enter password length must be atleast 8 charecter ";
		}
		elseif($MAXLENGTH)
		{
			$error['password'] = "Please Enter password length must not exceed 15 charecter";
		}
		if(empty(trim($_POST['address'])))
		{
			$error['address'] = "Please Enter your address";
		}
		if(empty($_POST['gender']))
		{
			$error['gender'] = "Please Choose your gender";
		}
		if(empty($_POST['hobbies']))
		{
			$error['hobbies'] = "Please Select your hobbies";
		}
		if($_POST['city']==0)
		{
			$error['city'] = "Please Select your city";
		}
		if($_FILES['photo']['error']==4)
		{
			$error['photo']="Please Select your photo";
		}
		elseif(!in_array($_FILES['photo']['type'],$allowtypes))
		{
			$error['photo']="Please Select jpg, jpeg and png type of file";
		}
		return $error;
	}
?>