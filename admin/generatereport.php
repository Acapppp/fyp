<?php
    include('database/connection.php');

    $display = "SELECT custname, custic, custphone, payment, price, regdate FROM report";

    $resultdis = $con->query($display);

    // Initialize total price variable
    $totalPrice = 0;

    if(isset($_POST['btnsearch'])) {
        $search = $_POST['namesearch'];
        $sqlsearch = "SELECT * FROM report WHERE custic LIKE '$search%'";
        $resultdis = $con->query($sqlsearch);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        h1{
            text-align: center;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f0f0f0;
        }
        .card-body {
            width: 80%;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
            border-radius: 5px;
        }
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .table th, .table td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        .table :ntrth-child(even) {
            background-color: #f9f9f9;
        }
        .total-row td {
            border-top: 2px solid #000;
            font-weight: bold;
        }
        #printButton {
            display: block;
            margin: 20px auto;
        }
    </style>
    <title>Document</title>
</head>
<h1>Sale Report</h1>
<body>
    <div class="card-body">
        <table class="table" border="1">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">IC Number</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = 1;

                    while($data = $resultdis->fetch_assoc()) {
                        // Add each price to the total
                        $totalPrice += $data['price'];
                ?>
                <tr class="tr">
                    <td><?= $data['custname']; ?></td>
                    <td><?= $data['custic']; ?></td>
                    <td><?= $data['custphone']; ?></td>
                    <td><?= $data['regdate']; ?></td>
                    <td>RM<?= $data['price']; ?></td>
                </tr>
                <?php
                    $count++; // increment the count for each iteration
                    }
                ?>
                <!-- Display total in a separate row -->
                <tr>
                    <td colspan="3"></td>
                    <td><strong>Total:</strong></td>
                    <td>RM<?= number_format($totalPrice, 2); ?></td>
                </tr>
            </tbody>
        </table>
        <button id="printButton" type="button" class="btn btn-primary mb-3" onclick="printReceipt(this);">Print Receipt</button>
    </div>
    <script>
        function printReceipt(button) {
            button.style.display = 'none';
            window.print();
        }
    </script>
</body>
</html>
