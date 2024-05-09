<?php
include('database/connection.php');

// Check if the ID is provided in the URL
if(isset($_GET['id'])) {
    $feedback_id = $_GET['id'];

    // Delete the record from the database
    $sql = "DELETE FROM feedback WHERE cust_id = $feedback_id";

    if(mysqli_query($con, $sql)) {
        // If deletion successful, display alert and redirect
        echo "<script>
                alert('Feedback has been deleted.');
                window.location.href = 'userfeedback.php';
              </script>";
    } else {
        echo "Error deleting record: " . mysqli_error($con);
    }
} else {
    echo "Feedback ID not provided.";
}
?>
