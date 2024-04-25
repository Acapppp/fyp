<?php
include('database/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $staff_name = $_POST['staff_name'];
    $staff_ic = $_POST['staff_ic'];
    $staff_phone = $_POST['staff_phone'];
    $staff_email = $_POST['staff_email'];
    $staff_gender = $_POST['staff_gender'];
    $s_username = $_POST['s_username'];
    $old_pass = $_POST['old_pass'];
    $new_pass = $_POST['new_pass'];

    // Construct SQL query to update data
    $sql = "UPDATE staff_info SET staff_phone='$staff_phone', staff_email='$staff_email', staff_gender='$staff_gender', staffusername='$s_username', staff_pass='$new_pass' WHERE staff_ic='$staff_ic'";

    // Execute SQL query
    if (mysqli_query($con, $sql)) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . mysqli_error($con);
    }

    // Close database connection
    mysqli_close($con);
}
?>
