<?php 
	$db['db_host'] = "localhost";
	$db['db_user'] = "root";
	$db['db_pass'] = "Khmer123";
	$db['db_db'] = "cms";
	foreach ($db as $key => $value) {
		define(strtoupper($key), $value);
	}
	$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_DB);
