<?php

include('connection.php');

if(isset($_POST['add'])){

    try {
        // Retrieve form data
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["message"];
        

        // Check if any field is empty
        if(empty($name) || empty($email) || empty($message)) {
            throw new Exception("Please fill all the required fields.");
        }

        // Insert data into the database
        $sqlinsert = "INSERT INTO contactinfo (custname, custemail, custmessage) VALUES ('$name', '$email', '$message')";

        if ($con->query($sqlinsert) === TRUE) {
            echo "<script>alert('Successfully added')</script>";
            header('location:contacts.php');   
        } else {
            throw new Exception("Error: " . $sqlinsert . "<br>" . $con->error);
            
        }
    } catch (Exception $e) {
        // Handle the exception
        echo "<script>alert('".$e->getMessage()."')</script>";
    }
}else {
    header('location:contacts.php');
}
?>
