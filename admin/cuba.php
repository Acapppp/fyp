<?php
include('database/connection.php');

$sql = "SELECT * FROM custinfo";

$result = $con->query($sql);

function getName($con, $staffic) {
    if ($staffic != null) {
        $sqlName = "SELECT * FROM staff_info WHERE staff_ic = '$staffic'";
        $resultDis = $con->query($sqlName);
        if ($resultDis && $resultDis->num_rows > 0) {
            $data = $resultDis->fetch_assoc();
            return $data['staffusername'];
        } else {
            return "Not Found";
        }
    } else {
        return "empty";
    }
}

if ($result && $result->num_rows > 0) {
    while ($data = $result->fetch_assoc()) {
        // Access and display columns from custinfo table
        echo $data['custname'] . "<br>";
        
        // Access and display columns from staff_info table
        echo getName($con, $data['staff_ic']) . "<br>";
        // You can continue accessing other columns similarly
    }
} else {
    echo "No results found";
}

$con->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CUBA</title>
</head>
<body>
    
</body>
</html>