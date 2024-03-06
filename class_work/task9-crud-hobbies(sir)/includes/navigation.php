<?php $url = basename($_SERVER['PHP_SELF']);
?>
<nav class="navbar navbar-default" role="navigation">
	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarNav">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
	</div>
	<div class ="collapse navbar-collapse" id="navbarNav">
		<ul class="nav navbar-nav">
			
			
			<li <?php echo($url=="hobby_manage.php" || $url=="hobby_create.php" || $url=="hobby_update.php")?"class='active'":'';?>><a href="hobby_manage.php">Manage Hobbies</a></li>

			<li <?php echo($url=="user_manage.php" || $url=="user_manage.php" || $url=="user_manage.php")?"class='active'":'';?>><a href="user_manage.php">Manage Users</a></li>
		</ul>
	</div>
</nav>