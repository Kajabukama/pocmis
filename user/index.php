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
			<div class="row">
				<div class="col-md-12 d-flex justify-content-end mt-5">
					<button class="btn btn-danger mr-2"  data-toggle="modal" data-target="#registerCrime">Register Crime</button>
					<button class="btn btn-dark mr-2">Issue Warranty</button>
					<button class="btn btn-warning">Issue RB</button>
				</div>
			</div>

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
					  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab"> Registered  Crimes</div>
					  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">Issued RB</div>
					  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">Issued Waranties</div>
					</div>
				</div>
			</div>
		</div>

		<!-- offscreen partials -->
		<!-- register a crime -->
		<div class="modal fade" id="registerCrime" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		  <div class="modal-dialog  modal-lg" role="document">
			 <div class="modal-content">
			   <div class="modal-header border-0">
			     <h5 class="modal-title" id="staticBackdropLabel">Register a Crime</h5>
			     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
			       <span aria-hidden="true">&times;</span>
			     </button>
			   </div>
			   <div class="modal-body mt-1 p-5">
			     <form id="crime_form" name="crime" role="form" autocomplete="off">
			     		<div class="row">
			     			<div class="col-6">
			     				<div class="form-group">
					            <input type="text" class="form-control" name="firstname">
					          </div>
			     			</div>

			     			<div class="col-6">
					         <div class="form-group">
					            <input type="text" class="form-control" name="lastname">
					         </div>
			     			</div>
			     		</div>

			     		<div class="row">
			     			<div class="col-4">
			     				<div class="form-group">
					            <input type="text" class="form-control" name="firstname">
					          </div>
			     			</div>

			     			<div class="col-4">
					         <div class="form-group">
					            <input type="text" class="form-control" name="lastname">
					         </div>
			     			</div>

			     			<div class="col-4">
					         <div class="form-group">
					            <input type="text" class="form-control" name="lastname">
					         </div>
			     			</div>
			     		</div>

			     		<div class="row">
			     			<div class="col-12">
			     				<div class="form-group">
				     				<input type="submit" class="btn btn-primary" value="Save Record">
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

			$("#crime_form").submit(function(event){
				event.preventDefault();
				submitForm();
				return false;
			});

			function submitForm(){
				
				alert($('form#crime_form').serialize());
				// $.ajax({
				// 	type: "POST",
				// 	url: "saveContact.php",
				// 	cache:false,
				// 	data: $('form#contactForm').serialize(),
				// 	success: function(response){
				// 		$("#contact").html(response)
				// 		$("#contact-modal").modal('hide');
				// 	},
				// 	error: function(){
				// 		alert("Error");
				// 	}
				// });
			}
		});
	</script>
</body>
</html>