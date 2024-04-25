<?php

include('database/connection.php');

$staffIC = $_GET['sid'];

if(isset($_POST['btnsubmit'])){

    try {
        // Retrieve form data
        $name = $_POST["custname"];
        $ic = $_POST["custic"];
        $phone = $_POST["custphone"];
        $device = $_POST["devicetype"];
        $brand = $_POST["brand"];
        $model = $_POST["model"];
        $problem = $_POST["problem"];
        $date = $_POST["regdate"];

        // Check if any field is empty
        if(empty($name) || empty($ic) || empty($phone) || empty($device) || empty($brand) || empty($model) || empty($problem) || empty($date)) {
            throw new Exception("Please fill all the required fields.");
        }

        // Store form data in session
        $_SESSION['sname'] = $name;
        $_SESSION['sic'] = $ic;
        $_SESSION['sphone'] = $phone;
        $_SESSION['sdevice'] = $device;
        $_SESSION['sbrand'] = $brand;
        $_SESSION['smodel'] = $model;
        $_SESSION['sprob'] = $problem;
        $_SESSION['sdate'] = $date;

        // Add data to database
        $sqladd = "INSERT INTO custinfo (
            custname, custic, custphone, devicetype, brand, model, problem, regdate
        ) VALUES (
            '$name', '$ic', '$phone', '$device', '$brand', '$model', '$problem', '$date'
        )";

        if ($con->query($sqladd) === TRUE) {
            header("Location: registercustomer.php?sid=$staffIC");
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
    header('location:registercustomer.php?sid=<?= $staffIC; ?>');
}
?>
