<?php
	require_once('../database/connection.php');
	require_once('../includes/functions.php');

	// check if the user is authenticated
	isAuth();

	// initialize database connection
	$instance = openConnection();

	// get data for authenticated user
	$user = getUser($instance, $_SESSION['userId']);
	$username = $user['username'];
	$stationId = $user['stationId'];

	$users = get_users_By_station($instance, $stationId);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Admin - User Management</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<link rel="stylesheet" href="../assets/css/default.css">
</head>
<body>
	<?php require_once('../partials/navbar.php'); ?>

	<div class="container space-top">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2 class="text-muted">User Management</h2>
				<h6 class="text-muted">A strting place for administrator tasks.</h6>
			</div>
		</div>
		<div class="row d-flex justify-content-center mt-5">
			<div class="col-md-12">
				<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
					  <li class="nav-item">
					    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Registered  Users</a>
					  </li>
					</ul>
					<div class="tab-content" id="myTabContent">
					  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					  	<table class="table">
						  <head>
						    <tr>
						      <th>Firstname</th>
						      <th>Lastname</th>
						      <th>Gender</th>
						      <th>Mobile</th>
						      <th>Email</th>
						      <th>Username</th>
						      <th>role</th>
						      <th>Added On</th>
						      <th>Actions</th>
						    </tr>
						  </head>
						  <tbody>
						    
						    <?php  foreach($users as $user): ?>
						    	<tr>
								   <td><?php echo $user['firstname'];?></td>
								   <td><?php echo $user['lastname'];?></td>
								   <td><?php echo $user['gender'];?></td>
								   <td><?php echo $user['mobile'];?></td>
								   <td><?php echo $user['email'];?></td>
								   <td><?php echo $user['username'];?></td>
								   <td><span class="badge badge-warning">
								   	<?php echo $user['role'];?></span>
								   </td>
								   <td><?php echo $user['createdAt'];?></td>
								   <td>
								   	<span>
								   		<a href="edit_user.php?id=<?php echo $user['id'] ?>" class="btn btn-success"><i class="fas fa-edit"></i>
								   		</a>
								   	</span>
								   	<span>
								   		<a href="delete_user.php?id=<?php echo $user['id'] ?>" class="btn btn-danger"><i class="fas fa-trash"></i>
								   		</a>
								   	</span>
								   </td>
								</tr>
						    	
						    <?php endforeach; ?>
						  </tbody>
						</table>
					  </div>
					</div>
			</div>
		</div>
	</div>
	

	<script src="../assets/js/jquery-3.4.1.slim.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>