<?php 
	require_once("includes/config.php");
  $getallusers = mysqli_query($conn,"SELECT * FROM users  WHERE status='Inactive' order by name");
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<table method="post" class="table table-bordered table-striped">
								<thead>
									<tr>
										
										<td>Name</td>
										<td>Email</td>
										<td>Status</td>
										<td>Action</td>
									</tr>
								</thead>
								<tbody>
								<?php while($userrow = mysqli_fetch_array($getallusers)) { ?>
									<tr>
										
										<td><?= empty($userrow['name'])?'--NA--':$userrow['name']; ?></td>
										<td><?= empty($userrow['email'])?'--NA--':$userrow['email']; ?></td>
										<td><?php if($userrow['status']=='Active'){ ?>
												<span class="label label-success"><?php echo $userrow['status']; ?></span>
										<?php } else {?>
											<span class="label label-danger"><?php echo $userrow['status']; ?></span>
										<?php } ?>
										</td>
										<td>
										<button type="submit" class="btn btn-success btn-sm" name="update"  onclick="window.location='unblock.php'">Unblock</button>
										</td>
									</tr>
								<?php } ?>
								</tbody>
<!-- 
<table class="table">
    <thead>
      <tr>
        <th scope="col">sr.no</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Status</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td>Larry</td>
        <td>the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table> -->

      
</body>
</html>