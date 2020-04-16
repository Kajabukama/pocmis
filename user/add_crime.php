<?php
	error_reporting(E_ALL && ~E_NOTICE);

	require_once('../database/connection.php');
	require_once('../includes/functions.php');

	$instance = openConnection();

	if(!empty($_POST)){

		$output = "";

		$userId = $_POST['userId'];
		$stationId = $_POST['stationId'];
		$firstname = $_POST['firstname'];
		$middlename = $_POST['middlename'];
		$lastname = $_POST['lastname'];
		$gender = $_POST['gender'];
		$tribe = $_POST['tribe'];
		$age = $_POST['age'];
		$region = $_POST['region'];
		$district = $_POST['district'];
		$mobile = $_POST['mobile'];
		$notes = $_POST['notes'];
		$createdAt = $_POST['createdAt'];

		$query = "INSERT INTO ".TBL_CRIME." (userId, stationId,firstname,middlename,lastname,gender,tribe,age,region,district,mobile,notes,createdAt) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$stmt = $instance->prepare($query);
    $stmt->bind_param('sssssssssssss', $userId, $stationId, $firstname, $middlename, $lastname,$gender, $tribe, $age, $region, $district, $mobile,$notes, $createdAt);


		if($stmt->execute()){
			$crimes = get_crimes_by_user($instance, $userId);
			$output .="
				<table class='table table-bordered table-sm'>
					<tr>
						<td>Firstname</td>
						<td>Middlename</td>
						<td>Lastname</td>
						<td>Gender</td>
						<td>Mobile</td>
						<td>Notes</td>
						<td>Registered On</td>
					</tr>";
			foreach ($crimes as $crime) {
				$output .= "
				<tr>
					<td>".$crime['firstname']."</td>
					<td>".$crime['middlename']."</td>
					<td>".$crime['lastname']."</td>
					<td>".$crime['gender']."</td>
					<td>".$crime['mobile']."</td>
					<td>".$crime['notes']."</td>
					<td>".$crime['createdAt']."</td>
				</tr>
				";
			}
			$output .= "</table>";

		} else {
			$output .= "<div class='alert alert-warning'> There was an error saving crime ".mysqli_error($instance)."</div>";
		}
		echo $output;
	}
?>