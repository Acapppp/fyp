<?php
include('connection.php');//if error process with the commands - option 1
//require('coonection.php');//if error then terminate - option 2

$sqlcreatetable = "CREATE TABLE bookinginfo(bprice VARCHAR(100) NOT NULL,
                                            bdate DATE NOT NULL,
                                            bpayment VARCHAR(200) NOT NULL,
                                            bstatus VARCHAR(200) NOT NULL)";

//execute command
$resulttable = $con->query($sqlcreatetable);

if($resulttable){
    echo "Table has been created.";
}
else{
    echo "Error: cannot create table.";
}

?>