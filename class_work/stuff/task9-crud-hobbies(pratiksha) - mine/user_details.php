<?php
$conn=mysqli_connect("localhost","root","0011","ci_guestbook");
// To fetch all record from users table
$getallusers = mysqli_query($conn,"SELECT * FROM users  WHERE status='Inactive' order by name");
// print_r($getallusers);exit(); 


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
</head>
<body>
<div class="table-responsive">
							<table id="usersdatalist" class="table table-bordered table-striped">
								<thead>
									<tr>
										
										<!-- <td>Name</td> -->
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
										<td><?php if($userrow['status']=='Inactive'){ ?>
												<span class="label label-success"><?php echo $userrow['status']; ?></span>
										<?php } else {?>
											<span class="label label-danger"><?php echo $userrow['status']; ?></span>
										<?php } ?>
										</td>
										<td>
											<button type="submit" class="btn btn-success btn-sm" name="login" onclick="window.location='unblock.php'">Unblock</button>

											

											<!-- <a href="user_delete.php?tokenid=<?= base64_encode($userrow['tokenid']) ;?>" class="glyphicon glyphicon-trash btn" onclick="return confirm('Do you really want to remove this record?')"></a> -->
										</td>
									</tr>
								<?php } ?>
								</tbody>
							</table>
						</div>
</body>
</html>