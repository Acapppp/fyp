<?php
include('database/connection.php');

$display = "SELECT * FROM custinfo";
$resultdis = $con->query($display);


// if(isset($_GET['custic'])) {
//     $custic = $_GET['custic'];
//     $sql = "SELECT * FROM custinfo WHERE custic = '$custic'";
//     $result = $con->query($sql);
//     $customerData = $result->fetch_assoc();
// }




// if(isset ($_POST['btnsearch'])){
//     $search = $_POST['namesearch'];
//     $sqlsearch = "SELECT * FROM custinfo WHERE custic LIKE '$search%'";
//     $resultdis = $con->query($sqlsearch);
// }
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Information | Baam Gadget</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
    <link rel="stylesheet" href="admin.css">
</head>

<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
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
                    <li class="sidebar-item">
                        <a href="#" class="sidebar-link collapsed" data-bs-target="#auth" data-bs-toggle="collapse"
                            aria-expanded="false"><i class="fa-solid fa-sliders pe-2"></i>
                            Auth
                        </a>
                        <ul id="auth" class="sidebar-dropdown list-unstyled collapse" data-bs-parent="#sidebar">
                            <li class="sidebar-item">
                                <a href="#" class="sidebar-link">Forgot Password</a>
                            </li>
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
                                <img src="image/profile.jpg" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Profile</a>
                                <a href="#" class="dropdown-item">Setting</a>
                                <a href="#" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">
                        <h4>Customer Information</h4>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="card flex-fill border-0 illustration">
                                <div class="card-body p-0 d-flex flex-fill">
                                    <div class="row g-0 w-100">
                                        <div class="col-6">
                                            <div class="p-3 m-1">
                                                <h4>Customer Information Access</h4>
                                                <p class="mb-0 text-muted">Access all information for customer, Baam GADGET. <br></p>
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
                    <form action="customerinformation.php" method="post">
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
                                        <th scope="col">Phone Number</th>
                                        <th scope="col">Staff</th>
                                        <!-- <th scope="col">Device</th>
                                        <th scope="col">Brand</th>
                                        <th scope="col">Model</th>
                                        <th scope="col">Problem </th> -->
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 1;

                                    while($data = $resultdis->fetch_assoc()) {
                                    ?>

                                    <tr class="tr">
                                        <td><?= $count ?>.</td>
                                        <td><?= $data['custic']; ?></td>
                                        <td><?= $data['custname']; ?></td>
                                        <td><?= $data['custphone']; ?></td>
                                        <td><?= $data['staff_username']; ?></td>
                                        
                                        <td>
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
                                            data-price="<?= $data['price']; ?>"
                                            data-staffusername="<?= $data['staff_username']; ?>">View</button>
                                            <a href="removecustomer.php" class="btn btn-danger delete-btn" data-cid="<?=$data['custic'];?>">
    <i class="fas fa-trash-alt"></i>
</a>

<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.delete-btn').forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();
            var cid = this.getAttribute('data-cid');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // You can perform AJAX request or form submission to delete the data
                    window.location.href = 'removecustomer.php?cid=' + cid;
                    Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                    );
                }
            });
        });
    });
});
</script>
                                </a>

                                            <br>
                                            <button class="cust">
                                            <a href="pricing.php?cid=<?= $data['custic']; ?>" style="color: black;">Pricing</a></button><br>

                                            <?php if ($data['staff_username'] == 'Unassign'): ?>
                                                <a href="assigntask.php?cid=<?= $data['custic']; ?>"><button class="cust">Assign Staff</button></a>
                                            <?php else: ?>
                                                <button class="cust" disabled>Assigned to <?= $data['staff_username']; ?></button>
                                            <?php endif; ?>
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
    var viewButtons = document.querySelectorAll('.view-customer');
    var customerDetailsContainer = document.getElementById('customerDetails');

    viewButtons.forEach(function (button) {
      button.addEventListener('click', function () {
        var custic = this.getAttribute('data-custic');
        var custname = this.getAttribute('data-custname');
        var custphone = this.getAttribute('data-custphone');
        var staffusername = this.getAttribute('data-staffusername');
        var devicetype = this.getAttribute('data-devicetype');
        var brand = this.getAttribute('data-brand');
        var model = this.getAttribute('data-model');
        var problem = this.getAttribute('data-problem');
        var regdate = this.getAttribute('data-regdate');
        var price = this.getAttribute('data-price');

        var customerDetailsHTML = `
          <p><strong>IC Number:</strong> ${custic}</p>
          <p><strong>Name:</strong> ${custname}</p>
          <p><strong>Phone Number:</strong> ${custphone}</p>
          <p><strong>Staff:</strong> ${staffusername}</p>
          <p><strong>Device Type:</strong> ${devicetype}</p>
          <p><strong>Brand:</strong> ${brand}</p>
          <p><strong>Model:</strong> ${model}</p>
          <p><strong>Problem:</strong> ${problem}</p>
          <p><strong>Registration Date:</strong> ${regdate}</p>
          <p><strong>Price:RM</strong> ${price}</p>
          
        `;

        customerDetailsContainer.innerHTML = customerDetailsHTML;
      });
    });
  });

  
</script>




</body>

</html>