<?php
	require_once('../database/connection.php');
	require_once('../includes/functions.php');

	// check if the user is authenticated
	isAuth();

	// initialize database connection
	$instance = openConnection();
	// fetch data for authenticated user
	$user = getUser($instance, $_SESSION['userId']);
	$username = $user['username'];

	if (isset($_GET['crime'])) {
		$crimeId = $_GET['crime'];
		$crime = get_crime($instance, $crimeId);

		$fullname = $crime['firstname']." ".$crime['middlename']." ".$crime['lastname'];
	}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PoCMIS - Dashboard</title>
	<link rel="stylesheet" href="../assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="../assets/css/all.min.css">
	<link rel="stylesheet" href="../assets/css/default.css">
</head>
<body>
	<main class="main">
		<?php require_once('../partials/navbar.php'); ?>

		<div class="container">
			<div class="row d-flex justify-content-center mt-5">
				<div class="col-md-6">
					<div class="card">
				  <div class="card-body">
				    <h5 class="card-title">Client Name : <?php echo $fullname; ?></h5>
				    <p class="card-text">
				    	<?php echo $crime['notes']; ?>
				    </p>
				  </div>
				  <ul class="list-group list-group-flush">
				    <li class="list-group-item">Crime Registration Date : 
				    	<?php echo date('Y-m-d H:i:s', $crime['createdAt']); ?></li>
				    <li class="list-group-item">Age : <?php echo $crime['age']; ?></li>
				    <li class="list-group-item">Region: <?php echo $crime['region']; ?></li>
				    <li class="list-group-item">District: <?php echo $crime['district']; ?></li>
				    <li class="list-group-item">Tribe: <?php echo $crime['tribe']; ?></li>
				  </ul>
				  <div class="card-body">
				    <a href="#" class="card-link">Card link</a>
				    <a href="#" class="card-link">Another link</a>
				  </div>
				</div>
				</div>
			</div>
		</div>
		
	</main>

	<script src="../assets/js/jquery-3.4.1.slim.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
</body>
</html>