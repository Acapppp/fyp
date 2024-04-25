<?php
include('database/connection.php');

// Assuming you have retrieved the staff IC from the URL parameter
$staffIC = $_GET['sid'];
$staffName = $_GET['nid'];
$custic = $_GET['cid'];

// Update the working_on count for the staff member in the database
$updateWorkingOnCount = "UPDATE staff_info SET working_on = working_on + 1 WHERE staff_ic = '$staffIC'";
$con->query($updateWorkingOnCount);

$updatestaffic = "UPDATE custinfo SET staff_ic = '$staffIC', staff_username = '$staffName' WHERE custic = '$custic'";
$con->query($updatestaffic);

// Perform other necessary actions or redirect as needed

// For example, if you want to redirect back to the page where the assignment was made:
header("Location: customerinformation.php?cid= $custic");
exit(); // Make sure to exit after redirection
?>
