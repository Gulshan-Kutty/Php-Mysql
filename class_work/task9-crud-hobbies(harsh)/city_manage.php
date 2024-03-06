<?php 
	require_once("includes/config.php");
	if(isset($_POST['deleteall']))
	{
		$tokenids = $_POST['selector'];  
		if(empty($tokenids))
		{
			header("location:city_manage.php");
		}
		else
		{
			$del=0;
			$nondel=0;
			for($i=0;$i<count($tokenids);$i++)
			{
				// print_r($tokenids[$i]); exit;
				// To fetch id of table 'cities' against tokenid 
				$getcitydata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id FROM cities WHERE tokenid ='".base64_decode($tokenids[$i])."'"));

			
				// print_r($getcitydata); exit();
				
				//To check whether city id is associated with users or not
				// $getcitymapdata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id, city_id FROM users where city_id LIKE ('%".$getcitydata['id']."%')"));
				/* print_r($getcitydata);
				print_r($getcitymapdata);
				exit(); */
				if(!isset($getcitydata['id']) || empty($getcitydata['id']))
				{
					header("location:city_manage.php");
				}
				// elseif(!empty($getcitymapdata))
				// {
				// 	//Display massage if data of cities master table mapped with users or transaction table.
				// 	//echo "Hobby is already mapped";
				// 	 $nondel++;
				// } 
				else
				{
					//remove data from master table if master table cities not mapped with transaction table or users table.
					mysqli_query($conn,"DELETE FROM cities WHERE id='".$getcitydata['id']."'");
					$del++;
					//header("location:city_manage.php");
				}
			}
			$message = $del." city has been deleted <br/>";
			//$massage= $nondel." city Unable to delete<br/>";
		}
	}
	
	// To fetch all record from users table
	// $getallcities = mysqli_query($conn,"SELECT id, tokenid, cityname,status FROM cities  order by cityname desc");

    $getallcities = mysqli_query($conn,"SELECT c.status, c.tokenid, c.cityname, s.statename, co.countryname from cities c inner join states s on s.id=c.state_id inner join countries co
    on co.id=c.country_id;");

	// print_r($getallcities);exit(); 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Manage cities</title>
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
							<h4 class="panel-title">Cities List</h4>
							<div style=" margin: 0px -14px 30px 0;">
								<!-- <button type="button" class="btn btn-danger btn-sm" name="back" onclick="window.location='index.php'"></button> -->
								<button type="button" class=" btn btn-danger btn-sm col-md-1 col-md-push-11" name="back" onclick="window.location='index.php'">logout</button>
							</div>

						</div  style="  margin-top: -10px;">
						<br/>
						<button type="button" class="glyphicon glyphicon-plus btn btn-primary btn-sm col-md-1 col-md-push-11" name="create" onclick="window.location='city_create.php'">Create</button>
						<br/>
						<br/>
						<br/>
						<div class="table-responsive">
							<table id="citiesdatalist" class="table table-bordered table-striped">
								<thead>
									<tr>
										<td><input type="checkbox" name="checkall" onclick="check();"/></td>
										<td>City</td>
                                        <td>State</td>
										<td>Country</td>
										<td>Status</td>
										<td>Action</td>
									</tr>
								</thead>
								<tbody>
								<?php while($datarow = mysqli_fetch_array($getallcities)) { ?>
									<tr>
										<td><input type="checkbox" name="selector[]" value="<?= base64_encode($datarow['tokenid']) ;?>"/></td>
										<!-- Overall, while base64 encoding the tokenid in this specific context may not have an immediate functional necessity, it contributes to code consistency, future-proofing, and potential security benefits, aligning with good coding practices and maintaining a uniform approach to data handling within the application. -->
										<td><?php if(empty($datarow['cityname']))
											{
												echo "--NA--";
											}
											else{
												echo $datarow['cityname'];
											}
										
										?></td>
                                        	<td><?php if(empty($datarow['statename']))
											{
												echo "--NA--";
											}
											else{
												echo $datarow['statename'];
											}
										
										?></td>
                                        	<td><?php if(empty($datarow['countryname']))
											{
												echo "--NA--";
											}
											else{
												echo $datarow['countryname'];
											}
										
										?></td>
										


										<td>
											<?php if($datarow['status']=='Active'){ ?>
												<span class="label label-success"><?php echo $datarow['status']; ?></span>
										<?php } else {?>
											<span class="label label-danger"><?php echo $datarow['status']; ?></span>
										<?php } ?>
										</td>
										<td>
										<a href="city_view.php?tokenid=<?= base64_encode($datarow['tokenid']) ;?>" >View</a>
											
										<a href="city_update.php?tokenid=<?= base64_encode($datarow['tokenid']) ;?>" class="glyphicon glyphicon-pencil btn"></a>

										<a href="city_delete.php?tokenid=<?= base64_encode($datarow['tokenid']) ;?>" class="glyphicon glyphicon-trash btn" onclick="return confirm('Do you really want to remove this record?')"></a>
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
				 $('#citiesdatalist').DataTable();
			});
		</script>
		<script src="assets/js/main.js"></script>
	</body>
</html>
