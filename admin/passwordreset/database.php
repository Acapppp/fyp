<?php
session_start();

$servername = 'localhost';
$username = 'root';
$password = '';
$database = 'baamuptown';

$con = mysqli_connect($servername, $username, $password, $database);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

return $con; // Return the MySQLi object
?>
