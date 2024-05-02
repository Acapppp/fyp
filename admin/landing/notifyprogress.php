<?php
include('database/connection.php');

if (isset($_POST['notify'])) {
    try {
        // Assuming you have a database connection established

        // Retrieve form data
        $email = $_POST["email"];

        // Check if email is empty
        if (empty($email)) {
            throw new Exception("Please provide your email.");
        }

        // Validate email format
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception("Invalid email format.");
        }

        // Query database to get customer info
        $stmt = $con->prepare("SELECT cust_email, status FROM custinfo WHERE cust_email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $customer_email = $row["cust_email"];
            $message_from_db = $row["status"];

            // Send email to customer
            $to = $customer_email;
            $subject = "Notification: Message Received";
            $email_message = "Dear User,\n\nThank you for your interest. We have received your message:\n\n$message_from_db\n\nWe will get back to you as soon as possible.\n\nBest regards,\nYour Company";

            $headers = "From: your_email@gmail.com\r\n";
            $headers .= "Reply-To: your_email@gmail.com\r\n";
            $headers .= "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/plain; charset=iso-8859-1\r\n";

            // SMTP configuration
            $smtpHost = 'smtp.gmail.com';
            $smtpUsername = 'dnishshmim121@gmail.com';
            $smtpPassword = 'Shamimhensem1';
            $smtpPort = 587; // TLS port

            // Enable TLS encryption
            ini_set('SMTP', $smtpHost);
            ini_set('smtp_port', $smtpPort);
            ini_set('sendmail_from', $smtpUsername);

            // Send email
            if (mail($to, $subject, $email_message, $headers)) {
                echo "<script>alert('Notification sent')</script>";
                // Redirect or display success message
            } else {
                throw new Exception("Error sending notification email.");
            }
        } else {
            throw new Exception("Email not found in the database.");
        }
    } catch (Exception $e) {
        // Handle the exception
        echo "<script>alert('" . $e->getMessage() . "')</script>";
    }
}
?>
