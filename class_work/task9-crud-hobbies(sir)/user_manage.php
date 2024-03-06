<?php 
	require_once("includes/config.php");
	if(isset($_POST['deleteall']))
	{
		$tokenids = $_POST['selector']; 
		if(empty($tokenids))
		{
			header("location:hobby_manage.php");
		}
		else
		{
			$del=0;
			$nondel=0;
			for($i=0;$i<count($tokenids);$i++)
			{
				// To fetch id of table hobbies against against tokenid 
				$gethobbydata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id FROM hobbies WHERE tokenid ='".base64_decode($tokenids[$i])."'"));
				
				//To check whether hobby id is associated with users or not
				$gethobbymapdata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id, hobby_id FROM users where hobby_id LIKE ('%".$gethobbydata['id']."%')"));
				/* print_r($gethobbydata);
				print_r($gethobbymapdata);
				exit(); */
				if(!isset($gethobbydata['id']) || empty($gethobbydata['id']))
				{
					header("location:hobby_manage.php");
				}
				elseif(!empty($gethobbymapdata))
				{
					//Display massage if data of hobbies master table mapped with users or transaction table.
					//echo "Hobby is already mapped";
					 $nondel++;
				} 
				else
				{
					//remove data from master table if master table hobbies not mapped with transaction table or users table.
					mysqli_query($conn,"DELETE FROM hobbies WHERE id='".$gethobbydata['id']."'");
					$del++;
					//header("location:hobby_manage.php");
				}
			}
			$massage = $del." Hobby has been deleted <br/>".$nondel." Hobby Unable to delete<br/>";
		}
	}
	
	// To fetch all record from users table
	$getallusers = mysqli_query($conn,"SELECT * FROM users  WHERE status='Active' order by name");
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
										<td><?php if($userrow['status']=='Active'){ ?>
												<span class="label label-success"><?php echo $userrow['status']; ?></span>
										<?php } else {?>
											<span class="label label-danger"><?php echo $userrow['status']; ?></span>
										<?php } ?>
										</td>
										<td>
											
											<a href="hobby_update.php?id=<?= base64_encode($userrow['tokenid']) ;?>" class="glyphicon glyphicon-pencil btn"></a>

											

											<a href="hobby_delete.php?id=<?= base64_encode($userrow['tokenid']) ;?>" class="glyphicon glyphicon-trash btn" onclick="return confirm('Do you really want to remove this record?')"></a>
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
