<?php
include('database/connection.php');

$staffIC = $_GET['sid'];

// Fetch staff name and image URL from the database
$sql = "SELECT staff_name FROM staff_info WHERE staff_ic = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param('s', $staffIC);
$stmt->execute();
$stmt->bind_result($staff_name);
$stmt->fetch();
$stmt->close();

// Fetch recent customers assigned to the logged-in staff member
$display = "SELECT custname, custphone, payment, status 
            FROM custinfo
            WHERE staff_ic = ?
            ORDER BY custic DESC
            LIMIT 4"; // Fetch only the latest 4 records assigned to the staff member

$stmt = $con->prepare($display);
$stmt->bind_param('s', $staffIC);
$stmt->execute();
$resultdis = $stmt->get_result();

$count_query = "SELECT COUNT(*) AS total_assigned_customers FROM custinfo WHERE staff_ic = ?";
$stmt_count = $con->prepare($count_query);
$stmt_count->bind_param('s', $staffIC);
$stmt_count->execute();
$total_assigned_customers = $stmt_count->get_result()->fetch_assoc()['total_assigned_customers'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Dashboard | Baam Gadget</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
                    <a href="staff.php?sid=<?php echo $staffIC; ?>">Baam GADGET</a>
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
                            <!-- <li class="sidebar-item">
                                <a href="repairtask.php" class="sidebar-link">Repair Task</a>
                            </li> -->
                            <li class="sidebar-item">
                                <a href="updaterepairprogress.php?sid=<?= $staffIC; ?>" class="sidebar-link">Task Management</a>
                            </li>
                        </ul>
                    </li>
                    <li>
    <div class="btnl">
        <!-- <button class="logout">
            <img width="32" height="32" src="https://img.icons8.com/glyph-neue/32/power-off-button.png" alt="power-off-button"/>
            <a href="/admin/login.php">Logout</a>
        </button> -->
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
                    <div class="mb-3">
                        <h4>Staff Dashboard</h4>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-6">
                                            <div class="p-3 m-1">
                                                <!--Part 1-->
                                                <h4>Welcome Back, <?php echo $staff_name; ?></h4>
                                                <p class="mb-0">Staff Dashboard, Baam GADGET</p>
                                            </div>
                                        </div>
                                        <div class="col-6 align-self-end text-end">
                                            <!--Part 2-->
                                            <img src="images/logo1.png" class="img-fluid illustration-img"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0">
                                <div class="card-body py-4">
                                    <div class="d-flex align-items-start">
                                        <div class="flex-grow-1">
                                            <h4 class="mb-2">
                                                Total Assigned Customer : <br><br>
                                                <?php echo $total_assigned_customers; ?> Customers <i class="fa-solid fa-circle fa-xs" style="color: #18c91b;"></i>
                                            </h4>
                                            <!-- <h4 class="mb-2">
                                                <?php //echo $total_customers; ?> Uncomplete Task <i class="fa-solid fa-circle fa-xs" style="color: #f51414;"></i>
                                            </h4> -->
                                            <!-- <div class="mb-0">
                                                <span class="badge text-success me-2">
                                                    +9.0%
                                                </span>
                                                <span class="text-muted">
                                                    Since Last Month
                                                </span>
                                            </div>    -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Element -->
                    <div class="cards border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Recent Customer
                            </h5><br>
                            <!-- <h6 class="card-subtitle text-muted">
                                Recent booking from customer
                            </h6> -->
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <!-- <th scope="col">No</th> -->
                                        <th scope="col">No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Payment</th>
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
                                        <td><?= $data['custphone']; ?></td>
                                        <td><?= $data['status']; ?></td>
                                        <td>
                                            <?php
                                            if ($data['payment'] === 'Unpaid') {
                                                echo '<button class="status btn-danger">' . $data['payment'] . '</button>';
                                            } else {
                                                echo '<button class="pay btn-success">' . $data['payment'] . '</button>';
                                            }
                                            ?>
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
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script1.js"></script>
</body>

</html>