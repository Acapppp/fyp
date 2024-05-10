<?php
// Include the database connection
include('../database/connection.php');

// Check if form is submitted
if(isset($_POST['submit'])) {
    // Retrieve the IC number from the form
    $staffIC = $_POST['ic']; // Assuming 'ic' corresponds to the IC number field

    // Update the password to '123' for the staffIC
    $sql = "UPDATE staff_info SET staff_pass = '123' WHERE staff_ic = '$staffIC'";

    // Execute the query
    if(mysqli_query($con, $sql)) {
        // Redirect back to login.php with a success message
        echo "<script>alert('Password reset successfully.'); window.location.href='../login.php';</script>";
        exit(); // Ensure script execution stops after redirect
    } else {
        echo "Error updating password: " . mysqli_error($con);
    }
}
?>
