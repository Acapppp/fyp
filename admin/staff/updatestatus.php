<?php
include('database/connection.php');

$staffIC = $_GET['sid'];
$cid = $_GET['cid'];
// Count the number of customers
$count_query = "SELECT COUNT(*) AS total_customers FROM custinfo";
$count_result = $con->query($count_query);
$total_customers = $count_result->fetch_assoc()['total_customers'];

// $display = "SELECT * FROM custinfo where staff_ic = '$staffIC'";

// $resultdis = $con->query($display);

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
    <div class="btnl">
        <button class="logout">
            <img width="32" height="32" src="https://img.icons8.com/glyph-neue/32/power-off-button.png" alt="power-off-button"/>
            <a href="/admin/login.php">Logout</a>
        </button>
    </div>
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
                    <br>
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Repair Progress 
                            </h5><br>
                            <h6 class="card-subtitle text-muted">
                               
                            </h6>
                        </div>
                        <div class="card-body">
                        <div class="container">
                            <h2>Update Progress</h2>
                            <form action="status.php?sid=<?= $staffIC ?>&cid=<?php echo $cid; ?>" method="post" onsubmit="return confirmAndUpdate()">
                            <select name="status">
                                <option value="">---Incomplete---</option>
                                <option value="Device Receive">Device Receive</option>
                                <option value="Repairing">Repairing</option>
                                <option value="Complete">Complete</option>
                                <option value="Pickup">Pickup</option>
                            </select>
                                <br><br>
                                <button type="submit">Update</button>
                            </form>
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
      <!-- Modal for Update Form -->
      <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="updateModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="updateModalLabel">Update Task</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="updateForm">
                        <!-- Add your form elements here -->
                        <!-- <button type="button" class="btn btn-primary" data-step="1">Receive</button>
                        <button type="button" class="btn btn-primary" data-step="2">In Progress</button>
                        <button type="button" class="btn btn-primary" data-step="3">Finish</button>
                        <button type="button" class="btn btn-primary" data-step="4">Take Away</button> -->
                        
                        <button type="button" class="btn btn-primary">Update Progress 1</button>
                        <button type="button" id="updateProgressButton" class="btn btn-primary">Update Progress</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script1.js"></script>
    <script src="task.js"></script>
    <script src="task2.js"></script>
</body>

</html>