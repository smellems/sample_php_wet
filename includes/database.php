<?php
	$servername = "localhost";
	$username = "sample";
	$password = "sample";
	$dbname = "sample";

	// Create connection
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	// Check connection
	/*if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}*/

	//Set encoding
	/*if (!mysqli_query($conn, "SET NAMES 'utf8' COLLATE 'utf8_unicode_ci'"))
	{
   		print(mysqli_error() . "\n");
   	 	exit;
	}*/
?>
