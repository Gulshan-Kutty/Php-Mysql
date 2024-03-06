<?php
require_once("includes/config.php");

// print_r($_GET['id']); exit;
if(!isset($_GET['tokenid']) && empty($_GET['tokenid']))
{

	header("location:hobby_manage.php");
}
else
{

	$hobbyData = mysqli_fetch_assoc(mysqli_query($conn,"SELECT id, hobbyname, status FROM hobbies WHERE tokenid = '".base64_decode($_GET['tokenid'])."'"));

	// print_r($_POST); exit;

	if(empty($hobbyData))
	{
		header("location:hobby_manage.php");
	}
}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>View Hobby</title>
		<?php require_once("includes/head.php"); ?>
	</head>
	<body>
		<div class="container">
			<br/>
			
				<div class="panel panel-primary">
					<div>
						<?php require_once("includes/navigation.php"); ?>
					</div>
					<div class="panel-body">
						
						<div class="panel-heading  panel-primary">
							<h4 class="panel-title">Hobby View</h4>
						</div>
						<br/>
						<div class="col-md-12">
							<div class="form-group">
								<label class="control-label">Hobby Name</label>: 
								<?php echo(isset($hobbyData['hobbyname']))?$hobbyData['hobbyname']:'';?>

							</div>
							<div class="form-group">
								<label class="control-label">Hobby Status</label>: 
								<?php echo(isset($hobbyData['status']))?$hobbyData['status']:'';?>

							</div>
							
						</div>
					</div>
					<div class="panel-footer">
						<div class="form-group">
						
							<button type="button" class="btn btn-danger btn-sm" name="back" onclick="window.location='hobby_manage.php'">Back</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	<?php require_once("includes/scripts.php"); ?>
	</body>
</html>