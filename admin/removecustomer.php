<?php
include('database/connection.php');

$cic = $_GET['cid'];

$sqldel = "DELETE FROM custinfo WHERE custic = '$cic'";
$resultdel = $con->query($sqldel);

// if($resultdel){
//     echo "success";
// }

// else{
//     echo"fail";
// }

header('location:customerinformation.php');
?>
