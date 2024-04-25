<?php
include('connection.php'); // if error process with the commands - option 1
// require('connection.php'); // if error then terminate - option 2

$sqlaltertable = "ALTER TABLE custinfo ADD COLUMN regdate DATE";

// execute command
$resultalter = $con->query($sqlaltertable);

if($resultalter){
    echo "Table has been modified. Column 'regdate' added successfully.";
}
else{
    echo "Error: cannot modify table.";
}

?>
