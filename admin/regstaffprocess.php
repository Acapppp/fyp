<?php

include('database/connection.php');

if(isset($_POST['btnsubmit'])){
    $sic = $_POST['staff_ic'];
    $sname = $_POST['staff_name'];
    $sphone = $_POST['staff_phone'];
    $sgender = $_POST['staff_gender'];
    $sage = $_POST['staff_age'];
    $semail = $_POST['staff_email'];
    $susername = $_POST['staffusername'];
    $spass = $_POST['staff_pass'];

    $_SESSION['staff_ic'] = $sic;
    $_SESSION['staff_name'] = $sname;
    $_SESSION['staff_phone'] = $sphone;
    $_SESSION['staff_gender'] = $sgender;
    $_SESSION['staff_age'] = $sage;
    $_SESSION['staff_email'] = $semail;
    $_SESSION['staffusername'] = $susername;
    $_SESSION['staff_pass'] = $spass;
    

    if(!empty($sic && $sname && $sgender && $sphone && $sage && $semail && $susername && $spass)){
        
        ?>
            <script>alert('Staff Registered.');</script>
        <?php

        $sqlregstaff = "INSERT INTO staff_info
                        (staff_ic, staff_name, staff_phone, staff_gender, staff_age, staff_email, staffusername, staff_pass)
                        VALUES
                        ('$sic', '$sname', '$sphone', '$sgender', '$sage', '$semail', '$susername', '$spass')";

        $resultregstaff = $con->query($sqlregstaff);

        ?>
            <script>window.location='staffinformation.php';</script>
        <?php
    }

    else{
        ?>
            <script>
                alert('Please fill up all the required Input!');
                window.location='registerstaff.php';
            </script>
        <?php
    }
}

else{
    header('location:regstaffprocess.php');
}