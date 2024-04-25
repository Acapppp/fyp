<?php
include('database/connection.php');

if(isset($_GET['cid'])) {
    $custic = $_GET['cid'];
    $sql = "SELECT * FROM custinfo WHERE custic = '$custic'";
    $result = $con->query($sql);

    if($result->num_rows > 0) {
        $customer = $result->fetch_assoc();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Details</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Customer Details</h2>
    <?php if(isset($customer)) : ?>
        <p><strong>IC Number:</strong> <?= $customer['custic']; ?></p>
        <p><strong>Name:</strong> <?= $customer['custname']; ?></p>
        <p><strong>Phone Number:</strong> <?= $customer['custphone']; ?></p>
        <p><strong>Staff:</strong> <?= $customer['staff']; ?></p>
        <!-- Add more customer details here -->
    <?php else : ?>
        <p>Customer not found.</p>
    <?php endif; ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
