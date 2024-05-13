<?php
    include('database/connection.php');

    $display = "SELECT custname, custic, custphone, payment, price, regdate, technician FROM custinfo";

    // Check if the form is submitted with start and end dates
    if(isset($_POST['btn_filter'])) {
        // Retrieve start date and end date from the form
        $start_date = $_POST['start_date'];
        $end_date = $_POST['end_date'];
        
        // Modify the SQL query to include a WHERE clause for date filtering
        $display .= " WHERE regdate BETWEEN '$start_date' AND '$end_date'";
    }

    $resultdis = $con->query($display);

    // Initialize total price variable
    $totalPrice = 0;
    $totalTechnicianFees = 0;

    // if(isset($_POST['btnsearch'])) {
    //     $search = $_POST['namesearch'];
    //     $sqlsearch = "SELECT * FROM report WHERE custic LIKE '$search%'";
    //     $resultdis = $con->query($sqlsearch);
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        h1 {
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
        .table tr:nth-child(even) {
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
        form {
            margin-bottom: 20px;
            text-align: center;
        }
    </style>
    <title>Sales Report</title>
</head>

<body>
<h1>BAAM Uptown Sale Report</h1>
    <!-- Form to input start date and end date -->
    <form method="POST" action="">
        <label for="start_date">Start Date:</label>
        <input type="date" id="start_date" name="start_date">
        <label for="end_date">End Date:</label>
        <input type="date" id="end_date" name="end_date">
        <button type="submit" name="btn_filter">Filter</button>
    </form>
    <div class="card-body">
        <table class="table" border="1">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">IC Number</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Date</th>
                    <th scope="col">Technician Fees</th>
                    <th scope="col">Repair Sales</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $count = 1;

                    while($data = $resultdis->fetch_assoc()) {
                        // Add each price to the total
                        $totalPrice += $data['price'];
                        $totalTechnicianFees += $data['technician'];
                ?>
                <tr class="tr">
                    <td><?= $data['custname']; ?></td>
                    <td><?= $data['custic']; ?></td>
                    <td><?= $data['custphone']; ?></td>
                    <td><?= $data['regdate']; ?></td>
                    <td>RM<?= $data['technician']; ?></td>
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
                    <td>RM<?= number_format($totalTechnicianFees, 2); ?></td>
                    <td>RM<?= number_format($totalPrice, 2); ?></td>
                    
                </tr>
            </tbody>
        </table>
        <button id="printButton" type="button" class="btn btn-primary mb-3" onclick="printReceipt(this);">Print Report</button>
    </div>
    <script>
    function printReceipt(button) {
        // Hide unnecessary elements before printing
        button.style.display = 'none'; // Hide the "Print Report" button
        document.querySelector('form').style.display = 'none'; // Hide the form
        window.print(); // Print the page
        // After printing, show the hidden elements
        button.style.display = 'block'; // Show the "Print Report" button again
        document.querySelector('form').style.display = 'block'; // Show the form again
    }
</script>
</body>
</html>
