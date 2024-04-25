<?php
// Establish database connection (assuming you have a file named connection.php)
include('database/connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'price' field is set and not empty
    if (isset($_POST['status']) && !empty($_POST['status'])) {
        // Retrieve and sanitize the price value to prevent SQL injection
        $status = mysqli_real_escape_string($con, $_POST['status']);

        // Retrieve the customer ID from the URL
        if (isset($_GET['cid'])) {
            $cid = $_GET['cid'];

            // Update the price in the database for the specific customer
            $query = "UPDATE custinfo SET status = '$status' WHERE custic = '$cid'";
            $result = mysqli_query($con, $query);

            if ($result) {
                header("Location: updaterepairprogress.php?sid=" . $_GET['sid']);
            } else {
                echo "Error updating" . mysqli_error($con);
            }
        } else {
            echo "Customer ID not provided in the URL.";
        }
    } else {
        echo "Price field is required.";
    }
} else {
    echo "Form not submitted.";
}

// Close database connection
mysqli_close($con);
?>
