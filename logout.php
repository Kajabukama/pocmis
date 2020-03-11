<?php
	session_start();

	if(isset($_GET['value'])) {
		$value = $_GET['value'];

		unset($_SESSION['username']);
		unset($_SESSION['userid']);
		unset($_SESSION['isAuth']);

		session_destroy();
		header('Location: .');
	}

