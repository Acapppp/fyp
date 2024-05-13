<?php
// Establish database connection (assuming you have a file named connection.php)
include('database/connection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['cid'])) {
    // Check if the 'status' field is set and not empty
    if (isset($_POST['status']) && !empty($_POST['status'])) {
        
        // Retrieve and sanitize the status value to prevent SQL injection
        $status = mysqli_real_escape_string($con, $_POST['status']);

        // Retrieve the customer ID from the URL
        $staffIC = $_GET['sid'];
        $cid = $_GET['cid'];

         // Get customer's name
         $getNameQuery = "SELECT custname FROM custinfo WHERE custic = '$cid'";
         $nameResult = mysqli_query($con, $getNameQuery);
         $row = mysqli_fetch_assoc($nameResult);
         $customerName = $row['custname'];

        // Update the status in the database for the specific customer
        $query = "UPDATE custinfo SET status = '$status' WHERE custic = '$cid'";
        
        // Send email notification
        try {
            $mail = new PHPMailer(true);
            // Set mailer to use SMTP
            $mail->isSMTP();
            $mail->isHTML(true);
            // SMTP settings
            $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
            $mail->SMTPAuth   = true;                  // Enable SMTP authentication
            $mail->Username   = 'uptownbaam@gmail.com';   // SMTP username
            $mail->Password   = 'donnifbdehqzszep';       // SMTP password
            $mail->SMTPSecure = 'tls';                 // Enable TLS encryption, `ssl` also accepted
            $mail->Port       = 587;                   // TCP port to connect to

            // Sender info
            $mail->setFrom('uptownbaam@gmail.com', 'Repairing Progress');
            // Add a recipient (assuming customer email is stored in database)
            $emailQuery = "SELECT custemail FROM custinfo WHERE custic = '$cid'";
            $result = mysqli_query($con, $emailQuery);
            $row = mysqli_fetch_assoc($result);
            $customerEmail = $row['custemail'];
            $mail->addAddress($customerEmail);

            // Email subject
            $mail->Subject = 'Baam Uptown';

            // Email body
            $mail->Body = "Assalamualaikum,Hai $customerName.<br><br>\n\nYour repair status has been updated to :<h2> $status</h2>";

            // Send email
            $mail->send();
            
            // Update status and redirect
            if(mysqli_query($con, $query)) {
                // Redirect to success page or wherever you want
                header("Location: updaterepairprogress.php?sid=$staffIC ");
                exit();
            } else {
                throw new Exception("Error updating status: " . mysqli_error($con));
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
// Close database connection
mysqli_close($con);
?>
