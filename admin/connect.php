<?php


	 $servername ="localhost";
	 $dbname ="shop";
	 $username ="root";
	 $password ="";




	$dsn = 'mysql:host='.$servername.';dbname='.$dbname.'';
	$user = $username;
	$pass = $password;



	$option = array(
		PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
	);

	try {
		$con = new PDO($dsn, $user, $pass, $option);
		$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}

	catch(PDOException $e) {
		echo 'Failed To Connect' . $e->getMessage();
	}