<?php 
require_once("includes/config.php");
if(!isset($_GET['tokenid']) || empty($_GET['tokenid']))
{
	// check if "id" not available
	header("location:city_manage.php");
}
else
{
	// To fetch id of table cities against tokenid 
	$getcitydata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id FROM cities WHERE tokenid ='".base64_decode($_GET['tokenid'])."'"));
	
	//To check whether city id is associated with users or not
	//$getcitymapdata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id, city_id FROM users where city_id LIKE ('%".$getcitydata['id']."%')"));
	 //print_r($getcitymapdata);
	/*print_r($getcitymapdata);
	exit(); */
	if(!empty($getcitydata))
	{
		mysqli_query($conn,"DELETE FROM cities WHERE tokenid ='".base64_decode($_GET['tokenid'])."' ");
		header("location:city_manage.php");
		//Display massage if data of hobbies master table mapped with users or transaction table.
		//echo "city is already mapped";
	}
	else
	{
		//remove data from master table if master table cities not mapped with transaction table or users table.
		// mysqli_query($conn,"DELETE FROM cities WHERE id='".$getcitydata['id']."'");
		header("location:city_manage.php");
	}
}	
?>