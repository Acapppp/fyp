<?php
include('database/connection.php');

$results_per_page = 3;

$count_query = "SELECT COUNT(*) AS total_staffs FROM staff_info";
$count_result = $con->query($count_query);
$total_staffs = $count_result->fetch_assoc()['total_staffs'];

$total_pages = ceil($total_staffs / $results_per_page);

if (!isset($_GET['page']) || !is_numeric($_GET['page']) || $_GET['page'] <= 0 || $_GET['page'] > $total_pages) {
    $current_page = 1;
} else {
    $current_page = $_GET['page'];
}

$start_record = ($current_page - 1) * $results_per_page;

$display = "SELECT * FROM staff_info LIMIT $start_record, $results_per_page";
$resultdis = $con->query($display);

// search
if(isset($_POST['btnsearch'])){
    $search = $_POST['namesearch'];
    $sqlsearch = "SELECT * FROM staff_info WHERE staff_ic LIKE '$search%'";
    $resultdis = $con->query($sqlsearch);
}
?>


<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Information | Baam Gadget</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="admin.php">Baam GADGET</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Administration
                    </li>
                    <li class="sidebar-item">
                        <a href="admin.php" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#pages" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-file-lines pe-2"></i>
                            Customer
                        </a>
                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="customerinformation.php" class="sidebar-link">Customer Information</a>
                            </li>
                        </ul>

                        <ul id="pages" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="userfeedback.php" class="sidebar-link">User Feedback</a>
                            </li>
                        </ul>
                    </li>
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#posts" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-regular fa-user pe-2"></i>
                            Staff
                        </a>
                        <ul id="posts" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="registerstaff.php" class="sidebar-link">Register Staff</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="staffinformation.php" class="sidebar-link">Staff Information</a>
                            </li>
                            <!-- <li class="sidebar-item">
                                <a href="assigntask.php" class="sidebar-link">Assign Task</a>
                            </li> -->
                            <!-- <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Post 3</a>
                            </li> -->
                        </ul>
                    </li>
                    
                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="images/user.png" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- <a href="#" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Setting</a> -->
                                <a href="login.php" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Staff Information</h4>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-6">
                                            <div class="p-3 m-1">
                                                <h4>Staff Information Access</h4>
                                                <p class="mb-0 text-muted">Access all information of staff, Baam GADGET. <br></p>
                                            </div>
                                        </div>
                                        <div class="col-6 align-self-end text-end">
                                            <img src="image/customer-support.jpg" class="img-fluid illustration-img"
                                                alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Table Element -->
                    <form action="staffinformation.php" method="post">
                        <input type="text" name="namesearch" class="searchbar">
                        <button class="btnsearch" name="btnsearch">Search</button>
                    </form><br>
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
                                        <th scope="col">IC Number</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Gender</th>
                                        <th scope="col">Age</th>
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $start_number = ($current_page - 1) * $results_per_page + 1; // Calculate starting number for each page
                                    $count = $start_number;

                                    while($data = $resultdis->fetch_assoc()) {
                                    ?>

                                    <tr class="tr">
                                        <td><?= $count ?>.</td>
                                        <td><?= $data['staff_ic']; ?></td>
                                        <td><?= $data['staff_name']; ?></td>
                                        <td><?= $data['staff_gender']; ?></td>
                                        <td><?= $data['staff_age']; ?></td>
                                        <td><?= $data['staff_phone']; ?></td>
                                        <td><?= $data['staff_email']; ?></td>
                                        <td>
                                            <a href="staffprofile.php?sid=<?=$data['staff_ic'];?>"><button class="cust">View</button></a>
                                            <a href="removestaff.php?sid=<?=$data['staff_ic'];?>" onclick="return confirm('Are you sure you want to delete this data?');"><button class="cust">Remove</button></a>
                                        </td>
                                    </tr>
                                    <?php
                                    $count++; // increment the count for each iteration
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <div class="pagination">
                                <?php if ($current_page > 1): ?>
                                    <a href="?page=<?php echo $current_page - 1; ?>">Previous</a>
                                <?php endif; ?>

                                <?php for ($page = 1; $page <= $total_pages; $page++): ?>
                                    <a href="?page=<?php echo $page; ?>" <?php echo ($page == $current_page) ? 'class="active"' : ''; ?>><?php echo $page; ?></a>
                                <?php endfor; ?>

                                <?php if ($current_page < $total_pages): ?>
                                    <a href="?page=<?php echo $current_page + 1; ?>">Next</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </main>

            
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
            <footer class="footer">
                <div class="container-fluid">
                    <div class="row text-muted">
                        <div class="col-6 text-start">
                            <p class="mb-0">
                                <a href="#" class="text-muted">
                                    <strong>Baam GADGET</strong>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="admin.js"></script>
</body>

</html>