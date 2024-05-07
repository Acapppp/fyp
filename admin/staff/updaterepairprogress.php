<?php
include('database/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $customerId = $_POST['customerId'];
    $staffId = $_POST['staffId'];

    // Update payment status in the database
    $update_query = "UPDATE custinfo SET payment = 'paid' WHERE custic = '$customerId' AND staff_ic = '$staffId'";
    $result = $con->query($update_query);

    if ($result) {
        // Payment updated successfully
        // Redirect or display a success message
        header("Location: updaterepairprogress.php?sid=$staffId");
        exit();
    } else {
        // Error occurred while updating payment
        // Handle the error appropriately
        echo "Error updating payment status: " . $con->error;
    }
}

$staffIC = isset($_GET['sid']) ? mysqli_real_escape_string($con, $_GET['sid']) : '';

// Count the number of customers
$count_query = "SELECT COUNT(*) AS total_assigned_customers FROM custinfo WHERE staff_ic = ?";
$stmt_count = $con->prepare($count_query);
$stmt_count->bind_param('s', $staffIC);
$stmt_count->execute();
$total_assigned_customers = $stmt_count->get_result()->fetch_assoc()['total_assigned_customers'];

$display = "SELECT * FROM custinfo where staff_ic = '$staffIC'";

$resultdis = $con->query($display);

// Fetch staff name and image URL from the database
$sql = "SELECT staff_name FROM staff_info"; // Adjust the query as per your table structure
$stmt = $con->query($sql);
$staff_data = $stmt->fetch_assoc();

// Assign fetched data to variables
$staff_name = $staff_data['staff_name'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Repairing Progress</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="staff.css">
</head>
<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <img src="images/logobaam.png" alt="" width="150px" height="60px"><br><br>
                    <a href="staff.php?sid=<?= $staffIC; ?>">Baam GADGET</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Staff
                    </li>
                    <!-- Content For Sidebar -->
                    <!--Dashboard-->
                    <li class="sidebar-item">
                        <a href="staff.php?sid=<?= $staffIC; ?>" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <!--Profile-->
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-regular fa-user pe-2"></i>
                            Profile
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="updatestaffprofile.php?sid=<?= $staffIC; ?>" class="sidebar-link">Update Info</a>
                            </li>
                            
                        </ul>
                    </li>
                    <!--Customer-->
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
                            Customer
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="registercustomer.php?sid=<?= $staffIC; ?>" class="sidebar-link">Register Customer</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="s_customerinfo.php?sid=<?= $staffIC; ?>" class="sidebar-link">Customer Information</a>
                            </li>
                        </ul>
                    </li>
                    <!--Other Section-->
                    <li class="sidebar-header">
                        Task
                    </li>
                    <!--Repairing-->
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                            Repairing
                        </a>
                        <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="updaterepairprogress.php?sid=<?= $staffIC; ?>" class="sidebar-link">Task Management</a>
                            </li>
                        </ul>
                    </li>
                    <li>
    <!-- <div class="btnl">
        <button class="logout">
            <img width="32" height="32" src="https://img.icons8.com/glyph-neue/32/power-off-button.png" alt="power-off-button"/>
            <a href="/admin/login.php">Logout</a>
        </button>
    </div> -->
</li>
                </ul>
            </div>
        </aside>
        <!--Right Section-->
        <div class="main">
            <!--Top Bar-->
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </nav>
            <!--Bottom Bar-->
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-6">
                                            <div class="p-3 m-1">
                
                                                <h4>
                                                    <?php echo $total_assigned_customers; ?> Task
                                                </h4>
                                                <p class="mb-0">Task Management, Baam GADGET</p>
                                            </div>
                                        </div>
                                        <div class="col-6 align-self-end text-end">
                                            <img src="" class="img-fluid illustration-img"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <h4>Repairing & Task Progress</h4>
                    </div>
                   
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Task
                            </h5>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">IC Number</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Price(RM)</th>
                                        <th scope="col" >Progress</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;

                                    while($data = $resultdis->fetch_assoc()) {
                                    ?>
                                    <tr class="tr">
                                        <td><?= $count ?>.</td>
                                        <td><?= $data['custname']; ?></td>
                                        <td><?= $data['custic']; ?></td>
                                        <td><?= $data['custphone']; ?></td>
                                        <td><?= $data['regdate']; ?></td>
                                        <td><?= $data['price']; ?></td>
                                        
                                        <td>
                                            <!-- <a href="displayonerecord.php?cid=<?=$data['custic'];?>"><button class="cust">View</button></a> -->
                                            <button class="cust view-customer" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#customerModal" 
                                            data-custic="<?= $data['custic']; ?>" 
                                            data-custname="<?= $data['custname']; ?>"
                                            data-custphone="<?= $data['custphone']; ?>"
                                            data-devicetype="<?= $data['devicetype']; ?>"
                                            data-brand="<?= $data['brand']; ?>"
                                            data-model="<?= $data['model']; ?>"
                                            data-problem="<?= $data['problem']; ?>"
                                            data-regdate="<?= $data['regdate']; ?>"
                                            data-payment="<?= $data['payment']; ?>"
                                            >View Info</button><br>
                                            <a href="updatestatus.php?sid=<?= $staffIC ?>&cid=<?=$data['custic'];?>"><button class="cust">Update</button></a><br>
                                            <!-- <button class="cust" data-bs-toggle="modal" data-bs-target="#updateModal">Update</button> -->
                                            <button class="cust" onclick="openPaymentModal('<?= $data['custic']; ?>')">Payment</button>
                                        </td>
                                    </tr>
                                    <?php
                                    $count++;
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </main>
            <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerModalLabel">Task Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div id="customerDetails">
                    <!-- Customer details will be displayed here -->
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </div>

    <!-- Payment Modal -->
    <div class="modal fade" id="paymentModal" tabindex="-1" aria-labelledby="paymentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="paymentModalLabel">Payment Status Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="paymentForm" method="POST" action="updaterepairprogress.php">
                        <input type="hidden" id="customerId" name="customerId">
                        <input type="hidden" id="staffId" name="staffId" value="<?= $staffIC ?>">
                        <p>Are you sure you want to confirm the payment status from unpaid to paid?</p>
                        <button type="button" class="btn btn-primary" onclick="confirmPayment()">Confirm Paid Payment</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Receipt Modal -->
    <div class="modal fade" id="receiptModal" tabindex="-1" aria-labelledby="receiptModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="receiptModalLabel">Print Receipt</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Content for printing the receipt -->
                    <p>This is the receipt content.</p>
                    <button class="btn btn-primary" onclick="printReceipt()">Print Receipt</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function confirmPayment() {
            // Show alert dialog
            alert('Payment status successfully changed.');
            // Hide payment modal and show receipt modal
            $('#paymentModal').modal('hide');
            $('#receiptModal').modal('show');
            document.getElementById("paymentForm").submit();
        }

        function printReceipt() {
            // Implement print functionality here
            window.print();
        }
    </script>


    <script>
    function openPaymentModal(customerId) {
            $('#customerId').val(customerId);
            $('#paymentModal').modal('show');
        }
    </script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script1.js"></script>
    <script src="task.js"></script>
    <script src="task2.js"></script>
</body>

</html>