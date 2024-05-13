<?php
// Establish database connection (assuming you have a file named connection.php)
include('database/connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the 'price' field is set and not empty
    if (isset($_POST['price']) && !empty($_POST['price'])) {
        // Retrieve and sanitize the price value to prevent SQL injection
        $type = $_POST['type'];
        $problem = $_POST['problem'];
        $price = mysqli_real_escape_string($con, $_POST['price']);
        $technician = mysqli_real_escape_string($con, $_POST['technician']);

        // Retrieve the customer ID from the URL
        if (isset($_GET['cid'])) {
            $cid = $_GET['cid'];

            // Update the price and technician fees in the database for the specific customer
            $query = "UPDATE custinfo SET price = '$price', technician = '$technician' WHERE custic = '$cid'";
            $result = mysqli_query($con, $query);

            if ($result) {
                // Redirect to the pricing page after successful update
                echo "<script>
                alert('price has been saved.');
                window.location.href = 'pricing.php?cid=$cid';
              </script>";
                // header("Location: pricing.php?cid=" . $_GET['cid']);
                exit; // Exit to prevent further execution
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
