<?php
include('database/connection.php');

$staffIC = $_GET['sid'];


// Pagination variables
$results_per_page = 5; // Number of records per page

// Count the total number of customers
$count_query = "SELECT COUNT(*) AS total_customers FROM custinfo";
$count_result = $con->query($count_query);
$total_customers = $count_result->fetch_assoc()['total_customers'];

// Calculate total number of pages
$total_pages = ceil($total_customers / $results_per_page);

// Determine current page number
if (!isset($_GET['page']) || !is_numeric($_GET['page']) || $_GET['page'] <= 0 || $_GET['page'] > $total_pages) {
    $current_page = 1;
} else {
    $current_page = $_GET['page'];
}

// Calculate the starting record for the current page
$start_record = ($current_page - 1) * $results_per_page;

// Fetch records for the current page

$display_query = "SELECT * FROM custinfo where staff_ic = '$staffIC'";

                  
// $display_query = "SELECT custname, custic, custphone, devicetype, brand, model, problem, regdate, status, payment 
//                   FROM custinfo LIMIT $start_record, $results_per_page";
$resultdis = $con->query($display_query);

if(isset($_POST['btnsearch'])){
    $search = $_POST['namesearch'];
    $sqlsearch = "SELECT * FROM custinfo WHERE custic LIKE '$search%'";
    $resultdis = $con->query($sqlsearch);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Information</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="staff.css">
    <link rel="stylesheet" href="pagination.css">
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
                    <!--Profile-->
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
            <main class="content px-4 py-2">
                <div class="mb-3">
                        <h4>Customer Management</h4>
                    </div>
                <div class="container-fluid">
                    <form action="s_customerinfo.php" method="post">
                        <input type="text" name="namesearch" class="searchbar" placeholder="Enter ic number">
                        <button class="btnsearch" name="btnsearch">Search</button>
                    </form><br>
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Customer Information
                            </h5><br>
                            <h6 class="card-subtitle text-muted">
                                Information for customer that has been registered
                            </h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">IC Number</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Payment</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = ($current_page - 1) * $results_per_page + 1; 

                                    while($data = $resultdis->fetch_assoc()) {
                                    ?>

                                    <tr class="tr">
                                        <td><?= $count ?>.</td>
                                        <td><?= $data['custname']; ?></td>
                                        <td><?= $data['custic']; ?></td>
                                        <td><?= $data['custphone']; ?></td>
                                        <td><?= $data['regdate']; ?></td>
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
                                        
                                        
                                        <td>
                                            <!-- <a href="displayonecust.php?cid=<?=$data['custic'];?>"><button class="cust">View Info</button></a> -->
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
                                        </td>
                                    </tr>
                                    <?php
                                    $count++; // increment the count for each iteration
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <!-- Pagination bar -->
    <div class="pagination">
        <?php if ($current_page > 1): ?>
            <a href="?sid=<?= $staffIC; ?>&page=<?php echo $current_page - 1; ?>">Previous</a>
        <?php endif; ?>
        
        <?php for ($page = 1; $page <= $total_pages; $page++): ?>
            <a href="?sid=<?= $staffIC; ?>&page=<?php echo $page; ?>" <?php echo ($page == $current_page) ? 'class="active"' : ''; ?>><?php echo $page; ?></a>
        <?php endfor; ?>
        
        <?php if ($current_page < $total_pages): ?>
            <a href="?sid=<?= $staffIC; ?>&page=<?php echo $current_page + 1; ?>">Next</a>
        <?php endif; ?>
    </div>
                        </div>
                    </div>
                </div>
            </main>
            <div class="modal fade" id="customerModal" tabindex="-1" aria-labelledby="customerModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="customerModalLabel">Customer Details</h5>
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

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script1.js"></script>
    <script src="pagination.js"></script>
    <script src="view.js"></script>
</body>

</html>