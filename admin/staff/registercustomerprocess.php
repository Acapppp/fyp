<?php

include('database/connection.php');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../phpmailer/src/Exception.php';
require '../phpmailer/src/PHPMailer.php';
require '../phpmailer/src/SMTP.php';

$staffIC = $_GET['sid'];

if($_SERVER['REQUEST_METHOD'] === 'POST'){

    try {
        // Retrieve form data
        $name = $_POST["custname"];
        $ic = $_POST["custic"];
        $email = $_POST["custmail"];
        $phone = $_POST["custphone"];
        $device = $_POST["devicetype"];
        $brand = $_POST["brand"];
        $model = $_POST["model"];
        $problem = $_POST["problem"];
        $date = $_POST["regdate"];

        // Check if any field is empty
        if(empty($name) || empty($ic) || empty($email) || empty($phone) || empty($device) || empty($brand) || empty($model) || empty($problem) || empty($date)) {
            throw new Exception("Please fill all the required fields.");
        }

        // Store form data in session
        $_SESSION['sname'] = $name;
        $_SESSION['sic'] = $ic;
        $_SESSION['semail'] = $email;
        $_SESSION['sphone'] = $phone;
        $_SESSION['sdevice'] = $device;
        $_SESSION['sbrand'] = $brand;
        $_SESSION['smodel'] = $model;
        $_SESSION['sprob'] = $problem;
        $_SESSION['sdate'] = $date;

        // Add data to database
        $sqladd = "INSERT INTO custinfo (
            custname, custic, custemail, custphone, devicetype, brand, model, problem, regdate
        ) VALUES (
            '$name', '$ic', '$email', '$phone', '$device', '$brand', '$model', '$problem', '$date'
        )";

        if ($con->query($sqladd) === TRUE) {
            // Update status to 'Device Receive' for the newly inserted record
            $updateStatusQuery = "UPDATE custinfo SET status = 'Device Receive' WHERE custic = '$ic'";
            $con->query($updateStatusQuery);

            // Send email notification
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
            $mail->setFrom('uptownbaam@gmail.com', 'Repair Progress');
            // Add a recipient
            $mail->addAddress($email, $name);

            // Email subject
            $mail->Subject = 'Baam Uptown';

            // Email body
            $mail->Body = "Assalamualaikum, Hai $name,<br><br>Your registration details:<br><br>Name : $name<br>Date : $date<br>Brand : $brand<br>Phone Model : $model<br>Problem Description : $problem<br><h1>Status : Device Receive</h1>";

            // Send email
            $mail->send();

            ?>
            <script>
                window.location = "registercustomer.php?sid=<?php echo $staffIC; ?>";
            </script>
            <?php
        } else {
            throw new Exception("Error: " . $sqladd . "<br>" . $con->error);
        }

    } catch (Exception $e) {
        // Handle the exception
        ?>
        <script>
            alert("<?php echo $e->getMessage(); ?>");
            // window.location='registercustomer.php';
        </script>
        <?php
    }
} else {
    header("Location: registercustomer.php?sid=$staffIC");
    exit();
}
?>
