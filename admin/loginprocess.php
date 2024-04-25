<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data
    $username = $_POST['name'];
    $password = $_POST['pass'];

    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "baamuptown";

    $con = new mysqli($host, $dbusername, $dbpassword, $dbname);

    if ($con->connect_error) {
        die("Connection Failed : " . $con->connect_error);
    }

    // Validate login
    $sqllogin = "SELECT * FROM admininfo WHERE adminname = '$username' AND adminpass = '$password'";

    $sqlloginstaff = "SELECT * FROM staff_info WHERE staffusername = '$username' AND staff_pass = '$password'";

    $resultlogin = $con->query($sqllogin);

    $resultloginstaff = $con->query($sqlloginstaff);

    if ($resultlogin->num_rows == 1) {
        // Login success
        header("Location: admin.php");
        exit();
    } 
    
    elseif($resultloginstaff->num_rows == 1){
        $row = $resultloginstaff->fetch_assoc();
        $staffIC = $row['staff_ic'];

        header("Location: staff/staff.php?sid=$staffIC");
        
        // exit();
    }

    else {
        // Login failed
        header("Location: login.php?error=1");
        exit();
    }

    $con->close();
}
?>
