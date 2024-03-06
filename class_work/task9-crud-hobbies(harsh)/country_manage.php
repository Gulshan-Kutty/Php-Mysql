<?php 
	require_once("includes/config.php");
	if(isset($_POST['deleteall']))
	{
		$tokenids = $_POST['selector'];  
		if(empty($tokenids))
		{
			header("location:country_manage.php");
		}
		else
		{
			$del=0;
			$nondel=0;
			for($i=0;$i<count($tokenids);$i++)
			{
				// print_r($tokenids[$i]); exit;
				// To fetch id of table 'countries' against tokenid 
				$getcountrydata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id FROM countries WHERE tokenid ='".base64_decode($tokenids[$i])."'"));
				// print_r($getcountrydata); exit();
				
				//To check whether country id is associated with users or not
				// $getcountrymapdata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id, country_id FROM users where country_id LIKE ('%".$getcountrydata['id']."%')"));
				/* print_r($getcountrydata);
				print_r($getcountrymapdata);
				exit(); */
				if(!isset($getcountrydata['id']) || empty($getcountrydata['id']))
				{
					header("location:country_manage.php");
				}
				// elseif(!empty($getcountrymapdata))
				// {
				// 	//Display massage if data of countries master table mapped with users or transaction table.
				// 	//echo "Hobby is already mapped";
				// 	 $nondel++;
				// } 
				else
				{
					//remove data from master table if master table countries not mapped with transaction table or users table.
					mysqli_query($conn,"DELETE FROM countries WHERE id='".$getcountrydata['id']."'");
					$del++;
					//header("location:country_manage.php");
				}
			}
			$message = $del." country has been deleted <br/>";
			//$massage= $nondel." country Unable to delete<br/>";
		}
	}
	
	// To fetch all record from users table
	$getallcountries = mysqli_query($conn,"SELECT id, tokenid, countryname,status FROM countries  order by countryname desc");
	// print_r($getallcountries);exit(); 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Manage Countries</title>
		<?php require_once("includes/head.php"); ?>
	</head>
	<body>
		<div class="container">
			<br/>
			<div class="panel panel-primary">
				<div>
					<?php require_once("includes/navigation.php"); ?>
					<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
				</div>
				<div class="panel-body">
					<form method="post">	
						<?php if(isset($message) && !empty($message)){?>
							<div class="alert alert-danger"><?= $message ?></div> <!-- here we haven't wrote echo to print '$message' bcoz syntax is different -->
						<?php } ?>
						<div class="panel-heading  panel-primary">
							<h4 class="panel-title">Countries List</h4>
							<div style=" margin: 0px -14px 30px 0;">
								<!-- <button type="button" class="btn btn-danger btn-sm" name="back" onclick="window.location='index.php'"></button> -->
								<button type="button" class=" btn btn-danger btn-sm col-md-1 col-md-push-11" name="back" onclick="window.location='index.php'">logout</button>
							</div>

						</div  style="  margin-top: -10px;">
						<br/>
						<button type="button" class="glyphicon glyphicon-plus btn btn-primary btn-sm col-md-1 col-md-push-11" name="create" onclick="window.location='country_create.php'">Create</button>
						<br/>
						<br/>
						<br/>
						<div class="table-responsive">
							<table id="countriesdatalist" class="table table-bordered table-striped">
								<thead>
									<tr>
										<td><input type="checkbox" name="checkall" onclick="check();"/></td>
										<td>Country</td>
										<td>Status</td>
										<td>Action</td>
									</tr>
								</thead>
								<tbody>
								<?php while($countryrow = mysqli_fetch_array($getallcountries)) { ?>
									<tr>
										<td><input type="checkbox" name="selector[]" value="<?= base64_encode($countryrow['tokenid']) ;?>"/></td>
										<!-- Overall, while base64 encoding the tokenid in this specific context may not have an immediate functional necessity, it contributes to code consistency, future-proofing, and potential security benefits, aligning with good coding practices and maintaining a uniform approach to data handling within the application. -->
										<td><?php if(empty($countryrow['countryname']))
											{
												echo "--NA--";
											}
											else{
												echo $countryrow['countryname'];
											}
										
										?></td>
										


										<td>
											<?php if($countryrow['status']=='Active'){ ?>
												<span class="label label-success"><?php echo $countryrow['status']; ?></span>
										<?php } else {?>
											<span class="label label-danger"><?php echo $countryrow['status']; ?></span>
										<?php } ?>
										</td>
										<td>
										<a href="country_view.php?tokenid=<?= base64_encode($countryrow['tokenid']) ;?>" >View</a>
											
										<a href="country_update.php?tokenid=<?= base64_encode($countryrow['tokenid']) ;?>" class="glyphicon glyphicon-pencil btn"></a>

										<a href="country_delete.php?tokenid=<?= base64_encode($countryrow['tokenid']) ;?>" class="glyphicon glyphicon-trash btn" onclick="return confirm('Do you really want to remove this record?')"></a>
										</td>
										<!-- Overall, encoding and decoding the tokenid values using base64 ensures URL safety, data integrity, consistency, and helps prevent tampering, making it a common practice in web applications for transmitting sensitive identifiers via URLs. However, it's essential to remember that base64 encoding is not a form of encryption and does not provide security against determined attackers. Additional measures, such as proper access controls and validation, should be implemented to ensure the security of transmitted data. -->
									</tr>
								<?php } ?>
								</tbody>
								<tr>
									<td colspan="4"><button type="submit" name="deleteall" class="btn btn-danger btn-xs">Delete</button></td>
								</tr>
							</table>
						</div>
					</form>
				</div>
				<div class="panel-footer"></div>
			</div>
		</div>
		<?php require_once("includes/scripts.php"); ?>
		<script src="assets/js/jquery.dataTables.min.js"></script>
		<script src="assets/js/dataTables.bootstrap.min.js"></script>
		<script>
			$("document").ready(function(){
				 $('#countriesdatalist').DataTable();
			});
		</script>
		<script src="assets/js/main.js"></script>
	</body>
</html>
