<?php
include('database/connection.php');

$custic = $_GET['cid'];

$display = "SELECT staff_ic, staff_name, staffusername, staff_gender, staff_age, staff_phone, staff_email, working_on 
            FROM staff_info";

function countWork($value, $con) {
    $matchValue = $value;
    $countWork = "SELECT COUNT(*) AS count FROM custInfo WHERE staff_username = '$matchValue'";
    $result = $con->query($countWork);
    if ($result) {
        // Fetch the count from the result
        $row = $result->fetch_assoc();
        $count = $row['count'];
        return $count;
    }
}

$resultdis = $con->query($display);

if(isset ($_POST['btnsearch'])){
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
    <title>Assign Task | Baam Gadget</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <!-- Modal -->
    <div class="modal fade" id="confirmAssignModal" tabindex="-1" aria-labelledby="confirmAssignModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="confirmAssignModalLabel">Confirm Assignment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to assign this task?
                </div>
                <div class="modal-footer">
                    <a id="assignButton" href="assign.php" class="btn btn-primary">Assign</a>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
                <div class="sidebar-logo">
                    <a href="#">Baam GADGET</a>
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
                        <h4>Assign Task</h4>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-6">
                                            <div class="p-3 m-1">
                                                <h4>Assign Task to Staff</h4>
                                                <p class="mb-0 text-muted">Assign Task for staff by the task repair that has been registered<br></p>
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
                    <form action="assigntask.php" method="post">
                            <input type="text" name="namesearch" class="searchbar">
                            <button class="btnsearch" name="btnsearch">Search</button>
                        </form><br>
                    <!-- Table Element -->
                    <div class="card border-0">
                        <div class="card-header">
                            <h5 class="card-title">
                                Assign Task
                            </h5><br>
                            <h6 class="card-subtitle text-muted">
                                Information of customer that need to be assign in the task
                            </h6>
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">IC Number</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Working On</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;

                                    while($data = $resultdis->fetch_assoc()) {
                                        $name = $data['staffusername'];
                                        $counting = countWork($name, $con);
                                    ?>

                                    <tr class="tr">
                                        <td><?= $count ?>.</td>
                                        <td><?= $data['staff_ic']; ?></td>
                                        <td><?= $data['staff_name']; ?></td>
                                        <td><?= $counting; ?> : Task</td>
                                        <td>
                                            <button class="cust" data-bs-toggle="modal" data-bs-target="#confirmAssignModal" data-id="<?= $data['staff_ic']; ?>" data-cust="<?= $custic; ?> " data-name="<?= $data['staffusername']; ?> ">Assign</button>
                                        </td>

                                    </tr>
                                    <?php
                                    $count++; // increment the count for each iteration
                                    }
                                    ?>

                                    
                                </tbody>
                            </table>
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

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        var assignButtons = document.querySelectorAll('.cust');
        var assignLink = document.getElementById('assignButton');

        assignButtons.forEach(function (button) {
            button.addEventListener('click', function () {
                var staffIc = this.getAttribute('data-id');
                var staffName = this.getAttribute('data-name');
                var custIc = this.getAttribute('data-cust');
                var assignUrl = 'assign.php?sid=' + staffIc + '&cid=' + custIc + '&nid=' + staffName;
                assignLink.setAttribute('href', assignUrl);
            });
        });
    });
</script>

</body>

</html>