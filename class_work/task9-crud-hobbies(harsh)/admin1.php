<?php 
	require_once("includes/config.php");
	if(isset($_POST['deleteall']))
	{
		$tokenids = $_POST['selector'];  
		if(empty($tokenids))
		{
			header("location:admin1.php");
		}
		else
		{
			$del=0;
			$nondel=0;
			for($i=0;$i<count($tokenids);$i++)
			{
				
				$gethobbydata = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id FROM users WHERE tokenid ='".base64_decode($tokenids[$i])."'"));
			
				if(!isset($gethobbydata['id']) || empty($gethobbydata['id']))
				{
					header("location:admin1.php");
				}
				else
				{
					mysqli_query($conn,"DELETE FROM attempts WHERE email='".$gethobbydata['email']."'");
					$del++;
				}
			}
			$massage = $del." Hobby has been deleted <br/>";
		}
	}
	
	// To fetch all record from users table
	$getallhobbies = mysqli_query($conn,"SELECT id, tokenid,name,email,status FROM users  order by email desc");
	// print_r($getallhobbies);exit(); 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>User Details</title>
		<?php require_once("includes/head.php"); ?>
	</head>
	<body>
		<div class="container">
			<br/>
			<div class="panel panel-primary">
				<div>
					<?php //require_once("includes/navigation.php"); ?>
					<link href="assets/css/dataTables.bootstrap.min.css" rel="stylesheet"/>
				</div>
				<div class="panel-body">
					<form method="post">	    
						<div class="panel-heading  panel-primary">
							<h4 class="panel-title">User Details</h4>
							<div style=" margin: 0px -14px 30px 0;">
								<!-- <button type="button" class="btn btn-danger btn-sm" name="back" onclick="window.location='index.php'"></button> -->
								<button type="button" class=" btn btn-danger btn-sm col-md-1 col-md-push-11" name="back" onclick="window.location='index.php'">logout</button>
							</div>

						</div  style="  margin-top: -10px;">
						<br/>
						<!-- <button type="button" class="glyphicon glyphicon-plus btn btn-primary btn-sm col-md-1 col-md-push-11" name="create" onclick="window.location='hobby_create.php'">Create</button> -->
						<br/>
						<br/>
						<br/>
						<div class="table-responsive">
							<table id="hobbiesdatalist" class="table table-bordered table-striped">
								<thead>
									<tr>
										<td>Name</td>
										<td>Email</td>
										<td>Status</td>
										<td>Action</td>
									</tr>
								</thead>
								<tbody>
								<?php while($hobbyrow = mysqli_fetch_array($getallhobbies)) { ?>
									<tr>
										<td><?php if(empty($hobbyrow['name']))
											{
												echo "--NA--";
											}
											else{
												echo $hobbyrow['name'];
											}
                                            ?></td>

										<td><?php if(empty($hobbyrow['email']))
											{
												echo "--NA--";
											}
											else{
												echo $hobbyrow['email'];
											}
										
										?></td>
										


										<td>
											<?php if($hobbyrow['status']=='Inactive'){ ?>
												<span class="label label-danger"><?php echo $hobbyrow['status']; ?></span>
										<?php } else {?>
											<span class="label label-success"><?php echo $hobbyrow['status']; ?></span>
										<?php } ?>
										</td>
										<td>
										<button type="submit" class="btn btn-success btn-sm" name="update"  onclick="window.location='unblock.php'">Unblock</button>
										</td>
									</tr>
								<?php } ?>
								</tbody>
								<tr>
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
