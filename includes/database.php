<?php
	$servername = "sample-php-db";
	$username = "sample-php";
	$password = "password";
	$dbname = "sample-php";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}

	//Set encoding
	if (!mysqli_query($conn, "SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'"))
	{
   		print(mysqli_error() . "\n");
   	 	exit;
	}

	// Start the session
	session_start();
?>
