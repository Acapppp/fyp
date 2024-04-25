<?php
// Establish database connection (assuming you have a file named connection.php)
include('database/connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'price' field is set and not empty
    if (isset($_POST['price']) && !empty($_POST['price'])) {
        // Retrieve and sanitize the price value to prevent SQL injection
        $price = mysqli_real_escape_string($con, $_POST['price']);

        // Retrieve the customer ID from the URL
        if (isset($_GET['cid'])) {
            $cid = $_GET['cid'];

            // Update the price in the database for the specific customer
            $query = "UPDATE custinfo SET price = '$price' WHERE custic = '$cid'";
            $result = mysqli_query($con, $query);

            if ($result) {
                header("Location: pricing.php?cid=" . $_GET['cid']);
            } else {
                echo "Error updating price: " . mysqli_error($con);
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
