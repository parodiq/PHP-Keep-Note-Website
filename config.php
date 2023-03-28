<?php

// Database credentials
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '5523241267aA');
define('DB_NAME', 'adminlogin');

// Attempt to connect to MySQL database
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check if connection was successful
if ($link === false) {
    die("ERROR: Could not connect to MySQL database. " . mysqli_connect_error());
}

?>

