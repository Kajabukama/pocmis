<?php
	require_once('../database/connection.php');
	require_once('../includes/functions.php');
	isAuth();
	$title = "Admin - Police Crime Management Information System";
	$user = getUser(openConnection(), $_SESSION['userId']);
	$username = $user['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title><?php echo $title; ?></title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<link rel="stylesheet" href="../assets/css/default.css">
</head>
<body>
	<?php require_once('../partials/navbar.php'); ?>

	<div class="container mt-5 space-top">
		<div class="row">
			<div class="col-md-12 text-center">
				<h2 class="text-muted">Administrator Dashboard</h2>
				<h6 class="text-muted">A strting place for administrator tasks.</h6>
			</div>
		</div>
		<div class="row d-flex justify-content-center mt-5">
			<div class="col-md-3">
				<div class="card">
					<div class="card-body text-center">
						<span><i class="fas fa-window-restore large"></i></span>
						<a class="nav-link" href="#">Manage Reports</a>
						<p>Manage system users, Station staff and user auditing and reports</p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card">
					<div class="card-body text-center">
						<span><i class="fas fa-user large"></i></span>
						<a class="nav-link" href="#">Manage Stations</a>
						<p>Manage your current work station, provided necessary for the Station.</p>
					</div>
				</div>
			</div>
			<div class="col-md-3">
				<div class="card">
					<div class="card-body text-center">
						<span><i class="fas fa-users-cog large"></i></span>
						<a class="nav-link" href="manage_users.php">Manage Users</a>
						<p>Manage and Generate required reports, manage various report forms</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	

	<script src="assets/js/jquery-3.4.1.slim.min.js"></script>
	<script src="assets/js/popper.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
</body>
</html>