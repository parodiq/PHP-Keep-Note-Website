<?php

$conn = "";

try {
	$servername = "localhost:3306";
	$dbname = "adminlogin";
	$username = "root";
	$password = "5523241267aA";

	$conn = new PDO(
		"mysql:host=$servername; dbname=adminlogin",
		$username, $password
	);
	
$conn->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}

?>

