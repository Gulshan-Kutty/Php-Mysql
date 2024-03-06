<?php 
	require_once("includes/config.php");
	if(isset($_POST['deleteall']))
	{
		$tokenids = $_POST['selector']; 
		if(empty($tokenids))
		{
			header("location:user_manage.php");
		}
		else
		{
			$del=0;
			$nondel=0;
			for($i=0;$i<count($tokenids);$i++)
			{
				// To fetch id of table hobbies against against tokenid 
				$getuserdata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id FROM users WHERE tokenid ='".base64_decode($tokenids[$i])."'"));
				
				//To check whether hobby id is associated with users or not
				//$gethobbymapdata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id, hobby_id FROM users where hobby_id LIKE ('%".$gethobbydata['id']."%')"));
				/* print_r($gethobbydata);
				print_r($gethobbymapdata);
				exit(); */
				if(!isset($getuserdata['id']) || empty($getuserdata['id']))
				{
					header("location:user_manage.php");
				}
				// elseif(!empty($gethobbymapdata))
				// {
				// 	//Display massage if data of hobbies master table mapped with users or transaction table.
				// 	//echo "Hobby is already mapped";
				// 	 $nondel++;
				// } 
				else
				{
					//remove data from master table if master table hobbies not mapped with transaction table or users table.
					mysqli_query($conn,"DELETE FROM users WHERE id='".$getuserdata['id']."'");
					$del++;
					header("location:user_manage.php");
				}
			}
			$massage = $del." user has been deleted <br/>".$nondel." user Unable to delete<br/>";
		}
	}
	
	// To fetch all record from users table
	$getallusers = mysqli_query($conn,"SELECT u.name, u.email, u.tokenid, u.status, co.countryname, s.statename, c.cityname from users u left join countries co on co.id=u.country_id left join states s on s.id = u.state_id left join cities c on c.id=u.city_id;");
	// print_r($getallhobbies);exit(); 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Manage Users</title>
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
						<?php if(isset($massage) && !empty($massage)){?>
							<div class="alert alert-danger"><?= $massage ?></div>
						<?php } ?>
						<div class="panel-heading  panel-primary">
							<h4 class="panel-title">User List</h4>
							<div style=" margin: 0px -14px 30px 0;">
								<button type="button" class=" btn btn-danger btn-sm col-md-1 col-md-push-11" name="back" onclick="window.location='index.php'">logout</button>
							</div>
						</div>
						<br/>
						<button type="button" class="glyphicon glyphicon-plus btn btn-primary btn-sm col-md-1 col-md-push-11" name="create" onclick="window.location='user_create.php'">Create</button>
						<br/>
						<br/>
						<br/>
						<div class="table-responsive">
							<table id="hobbiesdatalist" class="table table-bordered table-striped">
								<thead>
									<tr>
										<td><input type="checkbox" name="checkall" onclick="check();"/></td>
										<td>Name</td>
										<td>Email</td>
										<td>Country</td>
                                        <td>State</td>
                                        <td>City</td>
										<td>Status</td>
										<td>Action</td>
									</tr>
								</thead>
								<tbody>
								<?php while($userrow = mysqli_fetch_array($getallusers)) { ?>
									<tr>
										<td><input type="checkbox" name="selector[]" value="<?= base64_encode($userrow['tokenid']) ;?>"/></td>
										<td><?= empty($userrow['name'])?'--NA--':$userrow['name']; ?></td>
										<td><?= empty($userrow['email'])?'--NA--':$userrow['email']; ?></td>
										<td><?php if(empty($userrow['countryname']))
											{
												echo "--NA--";
											}
											else{
												echo $userrow['countryname'];
											}
										
										?></td>
										<td><?php if(empty($userrow['statename']))
											{
												echo "--NA--";
											}
											else{
												echo $userrow['statename'];
											}
										
										?></td>
										<td><?php if(empty($userrow['cityname']))
											{
												echo "--NA--";
											}
											else{
												echo $userrow['cityname'];
											}
										
										?></td>
										<td><?php if($userrow['status']=='Active'){ ?>
												<span class="label label-success"><?php echo $userrow['status']; ?></span>
										<?php } else {?>
											<span class="label label-danger"><?php echo $userrow['status']; ?></span>
										<?php } ?>
										</td>
										<td>
											<a href="user_view.php?tokenid=<?= base64_encode($userrow['tokenid']) ;?>" >View</a>

											<a href="user_update.php?tokenid=<?= base64_encode($userrow['tokenid']) ;?>" class="glyphicon glyphicon-pencil btn"></a>

											<a href="user_delete.php?tokenid=<?= base64_encode($userrow['tokenid']) ;?>" class="glyphicon glyphicon-trash btn" onclick="return confirm('Do you really want to remove this record?')"></a>
										</td>
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
				 $('#hobbiesdatalist').DataTable();
			});
		</script>
		<script src="assets/js/main.js"></script>
	</body>
</html>
