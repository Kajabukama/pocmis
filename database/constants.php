<?php

	// define database constants

	defined('DB_SERVER') ? null : define('DB_SERVER', 'localhost');
	defined('DB_USER') ? null : define('DB_USER', 'root');
	defined('DB_PASS') ? null : define('DB_PASS', 'root');
	defined('DB_NAME') ? null : define('DB_NAME', 'pocmis_db');

	// database table constants
	defined('TBL_USER') ? null : define('TBL_USER', 'tbl_users');
	defined('TBL_CRIME') ? null : define('TBL_CRIME', 'tbl_crimes');
	defined('TBL_STATION') ? null : define('TBL_STATION', 'tbl_stations');
