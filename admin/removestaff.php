<?php
include('database/connection.php');

$sic = $_GET['sid'];

$sqldel = "DELETE FROM staff_info WHERE staff_ic = '$sic'";
$resultdel = $con->query($sqldel);

header('location:staffinformation.php');
?>