<?php
	
	// a function which checks if a user is authenticated
	function isAuth(){
		if($_SESSION['isAuth'] == false) {
			header('Location: ../');
		} 
	}

	function truncate($string){
		return preg_replace('/\s+?(\S+)?$/', '', substr($string, 0, 101));
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

	// this function will return users by a given stationid
	function get_users_By_station($connection, $stationId){
		$query = "SELECT * FROM ".TBL_USER." WHERE stationId = ?";
		$stmt = $connection->prepare($query);
		$stmt->bind_param("s", $stationId);
		$stmt->execute();
		$result = $stmt->get_result();
		$users = $result->fetch_all(MYSQLI_ASSOC);

		return $users;
	}

	// this function will return users by a given stationid
	function get_crimes_by_user($connection, $userId){
		$query = "SELECT * FROM ".TBL_CRIME." WHERE userId = ? ORDER BY id DESC";
		$stmt = $connection->prepare($query);
		$stmt->bind_param("s", $userId);
		$stmt->execute();
		$result = $stmt->get_result();
		$crimes = $result->fetch_all(MYSQLI_ASSOC);

		return $crimes;
	}


	// this function will return a single user by a given userid
	function get_crime($connection, $crimeId){
		$query = "SELECT * FROM ".TBL_CRIME." WHERE id = ?";
		$stmt = $connection->prepare($query);
		$stmt->bind_param("s", $crimeId);
		$stmt->execute();
		$result = $stmt->get_result();
		$crime = $result->fetch_assoc();

		return $crime;
	}

	// this function will return a list of tribes
	function get_tribes($connection){
		$query = "SELECT * FROM ".TBL_TRIBE;
		$stmt = $connection->prepare($query);
		
		$stmt->execute();
		$result = $stmt->get_result();
		$tribes = $result->fetch_all(MYSQLI_ASSOC);

		return $tribes;
	}

	// this function will return a list of administrative regions
	function get_regions($connection){
		$query = "SELECT * FROM ".TBL_REGION;
		$stmt = $connection->prepare($query);
		
		$stmt->execute();
		$result = $stmt->get_result();
		$regions = $result->fetch_all(MYSQLI_ASSOC);

		return $regions;
	}

	// this function will return a list of administrative districts
	function get_districts($connection){
		$query = "SELECT * FROM ".TBL_DISTRICT;
		$stmt = $connection->prepare($query);
		
		$stmt->execute();
		$result = $stmt->get_result();
		$districts = $result->fetch_all(MYSQLI_ASSOC);

		return $districts;
	}

