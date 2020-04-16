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
	$userId = $user['id'];
	$stationId = $user['stationId'];

	$crimes = get_crimes_by_user($instance, $userId);

	$tribes = get_tribes($instance);
	$regions = get_regions($instance);
	$districts = get_districts($instance);

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

			<div class="row mt-5">
				<div class="col-md-12 mt-3">
					<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
					  <li class="nav-item">
					    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Registered  Crimes</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Issued RBs</a>
					  </li>
					  <li class="nav-item">
					    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Issued Warranties</a>
					  </li>
					</ul>
					<div class="tab-content" id="myTabContent">
					  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
					  	<div class="row mb-3">
					  		<div class="col-md-12 d-flex justify-content-start">
					  			<button class="btn btn-danger mr-2"  data-toggle="modal" data-target="#register_crime">Register Crime</button>
					  		</div>
					  	</div>
					  	<div class="output" id="output">
					  		<table class="table table-bordered table-sm">
								<tr>
									<th>Firstname</th>
									<th>Middlename</th>
									<th>Lastname</th>
									<th>Gender</th>
									<th>Mobile</th>
									<th>Notes</th>
									<th>Actions</th>
								</tr>
								
									<?php foreach($crimes as $item):?>
										<tr>
											<td><?php echo $item['firstname']; ?></td>
											<td><?php echo $item['middlename']; ?></td>
											<td><?php echo $item['lastname']; ?></td>
											<td><?php echo $item['gender']; ?></td>
											<td><?php echo $item['mobile']; ?></td>
											<td><?php echo truncate($item['notes']); ?></td>
											<td>
												<span>
								   		<a href="view_crime.php?crime=<?php echo $item['id']; ?>" class="btn btn-success"><i class="fas fa-edit"></i>
								   		</a>
								   	</span>
												
											</td>
									</tr>
									<?php endforeach; ?>
								
					  	</table>
					  	</div>
					  </div>

					  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
					  	<div class="row">
					  		<div class="col-md-12 d-flex justify-content-end">
									<button class="btn btn-warning">Issue RB</button>
					  		</div>
					  	</div>
					  </div>

					  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
					  	<div class="row">
					  		<div class="col-md-12 d-flex justify-content-end">
					  			<button class="btn btn-dark mr-2">Issue Warranty</button>
					  		</div>
					  	</div>
					  </div>
					</div>
				</div>
			</div>
		</div>

		<!-- offscreen partials -->
		<!-- register a crime -->
		<div class="modal fade" id="register_crime" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog modal-lg">
			 <div class="modal-content">
			   <div class="modal-header border-0">
			     <h5 class="modal-title" id="staticBackdropLabel">Register a Crime</h5>
			     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			       <span aria-hidden="true">&times;</span>
			     </button>
			   </div>
			   <div class="modal-body mt-1 p-5">
			     <form id="crime_form" name="crime_form" method="post" role="form" autocomplete="off">
				     	<div class="row">
				     		<div class="col-4">
			     				<div class="form-group">
					            <input type="hidden" class="form-control" name="userId" id="userId" value="<?php echo $userId; ?>">
					          </div>
			     			</div>
			     			<div class="col-4">
			     				<div class="form-group">
					            <input type="hidden" class="form-control" name="stationId" id="stationId" value="<?php echo $stationId; ?>">
					          </div>
			     			</div>
			     			<div class="col-4">
			     				<div class="form-group">
					            <input type="hidden" class="form-control" name="createdAt" id="createdAt" value="<?php echo time(); ?>">
					          </div>
			     			</div>
				     	</div>
			     		<div class="row">
			     			<div class="col-4">
			     				<div class="form-group">
					            <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter Firstname">
					          </div>
			     			</div>

			     			<div class="col-4">
					         <div class="form-group">
					            <input type="text" class="form-control" name="middlename" id="middlename" placeholder="Enter middlename">
					         </div>
			     			</div>

			     			<div class="col-4">
			     				<div class="form-group">
					            <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter Lastname">
					          </div>
			     			</div>
			     		</div>

			     		<div class="row">
			     			<div class="col-4">
			     				<div class="form-group">
					            <select class="form-control" name="tribe" id="tribe">
					            	<?php foreach ($tribes as $item): ?>
					            		<option value="<?php echo $item['name']; ?>"><?php echo $item['name']; ?></option>
					            	<?php endforeach; ?>
					            </select>
					         </div>
			     			</div>

			     			<div class="col-4">
			     				<div class="form-group">
					            <select class="form-control" name="region" id="region">
					            	<?php foreach ($regions as $item): ?>
					            		<option value="<?php echo $item['name']; ?>"><?php echo $item['name']; ?></option>
					            	<?php endforeach; ?>
					            </select>
					         </div>
			     			</div>

			     			<div class="col-4">
			     				<div class="form-group">
					            <select class="form-control" name="district" id="district">
					            	<?php foreach ($districts as $item): ?>
					            		<option value="<?php echo $item['name']; ?>"><?php echo $item['name']; ?></option>
					            	<?php endforeach; ?>
					            </select>
					         </div>
			     			</div>
			     		</div>

			     		<div class="row">
			     			<div class="col-4">
					         <div class="form-group">
					            <input type="number" min="5" max="100" class="form-control" name="age" id="age" placeholder="Age">
					         </div>
			     			</div>

			     			<div class="col-4">
					         <div class="form-group">
					            <select class="form-control" name="gender" id="gender">
					            	<option value="Male">Male</option>
					            	<option value="Female">Female</option>
					            </select>
					         </div>
			     			</div>

			     			<div class="col-4">
					         <div class="form-group">
					            <input type="text" class="form-control" name="mobile" id="mobile" placeholder="Mobile number">
					         </div>
			     			</div>
			     		</div>

			     		<div class="row">
			     			<div class="col-12">
					         <div class="form-group">
					            <textarea class="form-control" name="notes" id="notes" rows="3"></textarea>
					         </div>
			     			</div>
			     		</div>

			     		<div class="row">
			     			<div class="col-12">
			     				<div class="form-group">
				     				<input type="submit" id="save_crime" class="btn btn-primary" value="Save Record">
				     			</div>
			     			</div>
			     		</div>
			     	</form>
			   </div>
			 </div>
			</div>
		</div>
	</main>

	<script src="../assets/js/jquery-3.4.1.slim.min.js"></script>
	<script src="../assets/js/popper.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>

	<script>
		
		$(document).ready(function(){	
			$('#myTab a').on('click', function (e) {
			  e.preventDefault()
			  $(this).tab('show')
			})

			$('#crime_form').on('submit', function(event){
				
				event.preventDefault();
				$.ajax({
					url: "add_crime.php",
					method: "POST",
					data: $('#crime_form').serialize(),
					success: function(response){
						$('#save_crime').html("Saving crime ...");
						$('#crime_form')[0].reset();
						$('#output').html(response);

						$('#register_crime').modal('hide');
					},
					error: function(err){
						alert(err);
					}
				});
			});
		});
	</script>
</body>
</html>