<?php
	
	// a function which checks if a user is authenticated
	function isAuth(){
		if($_SESSION['isAuth'] == false) {
			header('Location: ../');
		}
	}

	// this function will return a single user by a given userid
	function getUser($connection, $userid){
		$query = "SELECT * FROM ".TBL_USER." WHERE id = ?";
		$stmt = $connection->prepare($query);
		$stmt->bind_param("s", $userid);
		$stmt->execute();
		$result = $stmt->get_result();
		$user = $result->fetch_assoc();

		return $user;
	}

	// this function will return a single user by a given userid
	function get_stations($connection){
		$query = "SELECT * FROM ".TBL_STATION;
		$stmt = $connection->prepare($query);
		
		$stmt->execute();
		$result = $stmt->get_result();
		$stations = $result->fetch_all(MYSQLI_ASSOC);

		return $stations;
	}

	// this function will return users by a given userid
	function get_users_By_station($connection, $stationId){
		$query = "SELECT * FROM ".TBL_USER." WHERE stationId = ?";
		$stmt = $connection->prepare($query);
		$stmt->bind_param("s", $stationId);
		$stmt->execute();
		$result = $stmt->get_result();
		$users = $result->fetch_all(MYSQLI_ASSOC);

		return $users;
	}

