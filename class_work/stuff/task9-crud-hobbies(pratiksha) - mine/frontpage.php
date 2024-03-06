<?php
require_once("includes/config.php");

?>
<!DOCTYPE html>
<html>
	<head>
		<title>CRUD Functionality</title>
		<?php require_once("includes/head.php"); ?>
	</head>
	<body>
		<div class="container">
			<br/>
			<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data">
				<div class="panel panel-primary">
					<div>
						<?php require_once("includes/navigation.php"); ?>
					</div>
					<div class="panel-body"></div>
					<div class="panel-footer"></div>
				</div>
			</form>
		</div>
		<?php require_once("includes/scripts.php"); ?>
	</body>
</html>