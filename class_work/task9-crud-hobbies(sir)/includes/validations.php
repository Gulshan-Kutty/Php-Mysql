<?php
	function validate_create_user()
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
		if(empty(trim($_POST['email'])))
		{
			$error['email']= "Please Enter your email";
		}
		else if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z]{2,3})$^", $_POST['email']))
		{
			$error['email']="Please Enter your valid email";
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
		if($_POST['country_id']==0)
		{
			$error['country_id'] = "Please Select your Country";
		}	
		if($_POST['state_id']==0)
		{
			$error['state_id'] = "Please Select your State";
		}
		if($_POST['city_id']==0)
		{
			$error['city_id'] = "Please Select your City";
		}	
		if($_POST['location_id']==0)
		{
			$error['location_id'] = "Please Select your Location";
		}
		if(empty($_POST['gender']))
		{
			$error['gender'] = "Please Choose your gender";
		}
		if(empty($_POST['hobby_id']))
		{
			$error['hobby_id'] = "Please Select your hobbies";
		}	
		if(empty(trim($_POST['aadhaar_number'])))
		{
			$error['aadhaar_number'] = "Please Enter your Aadhaar Number";
		}
		 elseif(!preg_match("/^[2-9]{1}[0-9]{3}[-][0-9]{4}[-][0-9]{4}$/",$_POST['aadhaar_number']))
		{
			$error['aadhaar_number'] = "Please Enter Valid Aadhaar Number Like this pattern (XXXX-XXXX-XXXX)";
		} 
		if($_FILES['aadhaar_photo']['error']==4)
		{
			$error['aadhaar_photo']="Please Select your Aadhaar Photo";
		}
		elseif(!in_array($_FILES['aadhaar_photo']['type'],$allowtypes))
		{
			$error['aadhaar_photo']="Please Select jpg, jpeg and png type of file";
		}
		if(empty($_POST['pan_number']) && $_FILES['pan_photo']['error']==4)
		{
			
		}
		elseif(empty($_POST['pan_number']) && $_FILES['pan_photo']['error']==0)
		{
			$error['pan_number']="Please Enter PAN Number";
		} 
		else if(!preg_match("/^[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}$/",$_POST['pan_number']))
		{
			$error['pan_number']="Please Enter Valid PAN Number";
		}
		elseif(!empty($_POST['pan_number']) && $_FILES['pan_photo']['error']==4)
		{
			$error['pan_photo']="Please Enter PAN Photo";
		} 
		else if(!in_array($_FILES['pan_photo']['type'],$allowtypes) && $_FILES['pan_photo']['error']==0 )
		{
			$error['pan_photo']="Please Select jpg, jpeg and png type of file";
		} 
		if($_FILES['photo']['error']==0)
		{
			if(!in_array($_FILES['photo']['type'],$allowtypes))
			{
				$error['photo']="Please Select jpg, jpeg and png type of file";
			} 
		}
		return $error;
	}
	function validate_update_user()
	{
		$error = array();
		$allowtypes=array('image/jpg','image/jpeg','image/png');
		if(empty(trim($_POST['name'])))
		{
			$error['name'] = "Name should not be empty";
		}
		elseif(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['name']))
		{
			$error['name'] = "Please Enter valid name";
		}
		if(empty(trim($_POST['email'])))
		{
			$error['email']= "Email should not be empty";
		}
		else if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z]{2,3})$^", $_POST['email']))
		{
			$error['email']="Please Enter your valid email";
		}
		if(empty(trim($_POST['address'])))
		{
			$error['address'] = "Address should not be empty";
		}
		if($_POST['country_id']==0)
		{
			$error['country_id'] = "Country not selected";
		}	
		if($_POST['state_id']==0)
		{
			$error['state_id'] = "State not selected";
		}
		if($_POST['city_id']==0)
		{
			$error['city_id'] = "City not selected";
		}	
		if($_POST['location_id']==0)
		{
			$error['location_id'] = "Location not selected";
		}
		if(empty(trim($_POST['aadhaar_number'])))
		{
			$error['aadhaar_number'] = "Aadhaar Number should not be empty";
		}
		 elseif(!preg_match("/^[2-9]{1}[0-9]{3}[-][0-9]{4}[-][0-9]{4}$/",$_POST['aadhaar_number']))
		{
			$error['aadhaar_number'] = "Please Enter Valid Aadhaar Number Like this pattern (XXXX-XXXX-XXXX)";
		} 
		if($_FILES['aadhaar_photo']['error']==0)
		{
			if(!in_array($_FILES['aadhaar_photo']['type'],$allowtypes))
			{
				$error['aadhaar_photo']="Please Select jpg, jpeg and png type of file";
			}			
		}
		if(empty($_POST['pan_number']) && $_FILES['pan_photo']['error']==4)
		{
			
		}
		elseif(empty($_POST['pan_number']) && $_FILES['pan_photo']['error']==0)
		{
			$error['pan_number']="Please Enter PAN Number";
		} 
		else if(!preg_match("/^[a-zA-Z]{5}[0-9]{4}[a-zA-Z]{1}$/",$_POST['pan_number']))
		{
			$error['pan_number']="Please Enter Valid PAN Number";
		}
		elseif(!empty($_POST['pan_number']) && $_FILES['pan_photo']['error']==4)
		{
			$error['pan_photo']="Please Enter PAN Photo";
		} 
		else if(!in_array($_FILES['pan_photo']['type'],$allowtypes) && $_FILES['pan_photo']['error']==0 )
		{
			$error['pan_photo']="Please Select jpg, jpeg and png type of file";
		} 
		if($_FILES['photo']['error']==0)
		{
			if(!in_array($_FILES['photo']['type'],$allowtypes))
			{
				$error['photo']="Please Select jpg, jpeg and png type of file";
			} 
		}
		return $error;
	}
	function validate_password_user()
	{
		$error=array();
		$MINLENGTH = strlen($_POST['password'])<8;
		$MAXLENGTH = strlen($_POST['password'])>=16;
		if(empty(trim($_POST['oldpassword'])))
		{
			$error['oldpassword'] = "oldpassword Should not be empty";
		}
		if(empty(trim($_POST['password'])))
		{
			$error['password'] = "Password Should not be empty";
		}
		elseif($MINLENGTH)
		{
			$error['password'] = "Please Enter password length must be atleast 8 charecter ";
		}
		elseif($MAXLENGTH)
		{
			$error['password'] = "Please Enter password length must not exceed 15 charecter";
		}
		if(empty(trim($_POST['confirmpassword'])))
		{
			$error['confirmpassword'] = "confirm Password Should not be empty";
		}
		return $error;
	}
	function validate_create_country()
	{
		$error = array();
		$allowtypes=array('image/jpg','image/jpeg','image/png');
		if(empty(trim(ltrim(rtrim($_POST['countryname'])))))
		{
			$error['countryname'] = "Please Enter Country Name";
		}
		elseif(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['countryname']))
		{
			$error['countryname'] = "Please Enter valid Country Name";
		}
		if($_FILES['countryflag']['error']==4)
		{
			$error['countryflag']="Please Select Country Flag Photo";
		}
		elseif(!in_array($_FILES['countryflag']['type'],$allowtypes))
		{
			$error['countryflag']="Please Select jpg, jpeg and png type of file";
		}
		if(empty(trim(ltrim(rtrim($_POST['countrycode'])))))
		{
			$error['countrycode'] = "Please Enter Country code";
		}
		if(empty($_POST['status']))
		{
			$error['status'] = "Please Choose status";
		}
		
		return $error;
	}
	function validate_update_country()
	{
		$error = array();
		$allowtypes=array('image/jpg','image/jpeg','image/png');
		if(empty(trim(ltrim(rtrim($_POST['countryname'])))))
		{
			$error['countryname'] = "Country Name should not be empty";
		}	
		elseif(!preg_match("/^[a-zA-Z-' ]*$/",$_POST['countryname']))
		{
			$error['countryname'] = "Please Enter valid Country Name";
		}
		if(empty(trim(ltrim(rtrim($_POST['countrycode'])))))
		{
			$error['countrycode'] = "Country Code should not be empty";
		}	
		elseif(!preg_match("/^[0-9+']*$/",$_POST['countrycode']))
		{
			$error['countrycode'] = "Please Enter valid Country code";
		}
		if($_FILES['countryflag']['error']==0)
		{
			if(!in_array($_FILES['countryflag']['type'],$allowtypes))
			{
				$error['countryflag']="Please Select jpg, jpeg and png type of file";
			}
		}
		return $error;
	}
	function validate_create_state()
	{
		$error = array();
		if($_POST['country_id']==0)
		{
			$error['country_id'] = "Please Select Country";
		}	
		if(empty(trim(ltrim(rtrim($_POST['statename'])))))
		{
			$error['statename'] = "Please Enter state Name";
		}
		elseif(!preg_match("/^[a-zA-Z- ']*$/",$_POST['statename']))
		{
			$error['statename'] = "Please Enter valid state Name";
		}
		if(empty($_POST['status']))
		{
			$error['status'] = "Please Choose status";
		}
		
		return $error;
	}
	function validate_update_state()
	{
		$error = array();
		if($_POST['country_id']==0)
		{
			$error['country_id'] = "Country not selected";
		}
		if(empty(trim(ltrim(rtrim($_POST['statename'])))))
		{
			$error['statename'] = "State Name should not be empty";
		}
		elseif(!preg_match("/^[a-zA-Z- ']*$/",$_POST['statename']))
		{
			$error['statename'] = "Please Enter valid state Name";
		}
		return $error;
	}
	function validate_create_city()
	{
		$error = array();
		if($_POST['country_id']==0)
		{
			$error['country_id'] = "Please Select Country";
		}
		if($_POST['state_id']==0)
		{
			$error['state_id'] = "Please Select State";
		}
		if(empty(trim(ltrim(rtrim($_POST['cityname'])))))
		{
			$error['cityname'] = "Please Enter City Name";
		}
		elseif(!preg_match("/^[a-zA-Z-']*$/",$_POST['cityname']))
		{
			$error['cityname'] = "Please Enter valid City Name";
		}
		if(empty($_POST['status']))
		{
			$error['status'] = "Please Choose status";
		}
		
		return $error;
	}
	function validate_update_city()
	{
		$error = array();
		if($_POST['country_id']==0)
		{
			$error['country_id'] = "Country not selected";
		}
		if($_POST['state_id']==0)
		{
			$error['state_id'] = " State not selected";
		}
		if(empty(trim(ltrim(rtrim($_POST['cityname'])))))
		{
			$error['cityname'] = "City Name should not be empty";
		}
		elseif(!preg_match("/^[a-zA-Z-']*$/",$_POST['cityname']))
		{
			$error['cityname'] = "Please Enter valid City Name";
		}
		return $error;
	}
	function validate_create_location()
	{
		$error = array();
		if($_POST['country_id']==0)
		{
			$error['country_id'] = "Please Select Country";
		}
		if($_POST['state_id']==0)
		{
			$error['state_id'] = "Please Select State";
		}
		if($_POST['city_id']==0)
		{
			$error['city_id'] = "Please Select City";
		}
		if(empty(trim(ltrim(rtrim($_POST['location'])))))
		{
			$error['location'] = "Please Enter Location";
		}
		elseif(!preg_match("/^[a-zA-Z- ']*$/",$_POST['location']))
		{
			$error['location'] = "Please Enter valid Location";
		}
		if(empty(trim(ltrim(rtrim($_POST['pincode'])))))
		{
			$error['pincode'] = "Please Enter PIN code";
		}
		elseif(!preg_match("/^[0-9]*$/",$_POST['pincode']))
		{
			$error['pincode'] = "Please Enter valid PIN code";
		}
		if(empty(trim(ltrim(rtrim($_POST['latitude'])))))
		{
			$error['latitude'] = "Please Enter Latitude";
		}
		elseif(!preg_match("/^[a-zA-Z0-9.']*$/",$_POST['latitude']))
		{
			$error['latitude'] = "Please Enter valid Latitude";
		}
		if(empty(trim(ltrim(rtrim($_POST['longitude'])))))
		{
			$error['longitude'] = "Please Enter Longitude";
		}
		elseif(!preg_match("/^[a-zA-Z0-9.']*$/",$_POST['longitude']))
		{
			$error['longitude'] = "Please Enter valid longitude";
		}
		
		if(empty($_POST['status']))
		{
			$error['status'] = "Please Choose status";
		}
		return $error;
	}
	function validate_update_location()
	{
		$error = array();
		if($_POST['country_id']==0)
		{
			$error['country_id'] = "Country not selected";
		}
		if($_POST['state_id']==0)
		{
			$error['state_id'] = "State not selected";
		}
		if($_POST['city_id']==0)
		{
			$error['city_id'] = "City not selected";
		}
		if(empty(trim(ltrim(rtrim($_POST['location'])))))
		{
			$error['location'] = "Location should not be empty";
		}
		elseif(!preg_match("/^[a-zA-Z- ']*$/",$_POST['location']))
		{
			$error['location'] = "Please Enter valid Location";
		}
		if(empty(trim(ltrim(rtrim($_POST['pincode'])))))
		{
			$error['pincode'] = "PIN code should not be empty";
		}
		elseif(!preg_match("/^[0-9]*$/",$_POST['pincode']))
		{
			$error['pincode'] = "Please Enter valid PIN code";
		}
		if(empty(trim(ltrim(rtrim($_POST['latitude'])))))
		{
			$error['latitude'] = "Latitude should not be empty";
		}
		elseif(!preg_match("/^[a-zA-Z0-9.']*$/",$_POST['latitude']))
		{
			$error['latitude'] = "Please Enter valid Latitude";
		}
		if(empty(trim(ltrim(rtrim($_POST['longitude'])))))
		{
			$error['longitude'] = "Longitude should not be empty";
		}
		elseif(!preg_match("/^[a-zA-Z0-9.']*$/",$_POST['longitude']))
		{
			$error['longitude'] = "Please Enter valid longitude";
		}
		return $error;
	}
	
	function validate_create_hobby()
	{
		$error = array();
		if(empty(trim(ltrim(rtrim($_POST['hobbyname'])))))
		{
			$error['hobbyname'] = "Please Enter hobby name";
		}
		elseif(!preg_match("/^[a-zA-Z-']*$/",$_POST['hobbyname']))
		{
			$error['hobbyname'] = "Please Enter valid hobby name";
		}
		if(empty($_POST['status']))
		{
			$error['status'] = "Please Choose status";
		}
	
		return $error;
	}
	function validate_update_hobby()
	{
		$error = array();
		if(empty(trim(ltrim(rtrim($_POST['hobbyname'])))))
		{
			$error['hobbyname'] = "Hobby name should not be empty";
		}
		elseif(!preg_match("/^[a-zA-Z-']*$/",$_POST['hobbyname']))
		{
			$error['hobbyname'] = "Please Enter valid hobby name";
		}
		return $error;
	}

	function validate_create_usernew()
	{
		$error = array();
		if(empty(trim(ltrim(rtrim($_POST['name'])))))
		{
			$error['name'] = "Please Enter name";
		}
		elseif(!preg_match("/^[a-zA-Z-']*$/",$_POST['name']))
		{
			$error['name'] = "Please Enter valid name name";
		}

		if(empty(trim(ltrim(rtrim($_POST['email'])))))
		{
			$error['email'] = "Please Enter email";
		}
		else if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z]{2,3})$^", $_POST['email']))
		{
			$error['email']="Please Enter your valid email";
		}


		if(empty($_POST['status']))
		{
			$error['status'] = "Please Choose status";
		}
	
		return $error;
	}
	
	function validate_login()
	{
		$error = array();
		if(empty(trim(ltrim(rtrim($_POST['password'])))))
		{
			$error['password'] = "Please Enter password";
		}
		

		if(empty(trim(ltrim(rtrim($_POST['email'])))))
		{
			$error['email'] = "Please Enter email";
		}
		else if(!preg_match("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z]{2,3})$^", $_POST['email']))
		{
			$error['email']="Please Enter your valid email";
		}


		
		return $error;
	}
?>