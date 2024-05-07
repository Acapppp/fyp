<?php
include('database/connection.php');

$sic = $_GET['sid'];

$sqlgetdata = "SELECT * FROM staff_info WHERE staff_ic = '$sic'";

$resultgetdata = $con->query($sqlgetdata);

$row = $resultgetdata->fetch_assoc();
// $display = "SELECT custname, custic, custphone, devicetype, brand, model, problem 
//             FROM custinfo";

// $resultdis = $con->query($display);

// // Fetch data from the database
// $sql = "SELECT staff_ic, staff_name, staff_phone, staff_age,  staff_gender, staff_email FROM staff_info";
// $result = mysqli_query($con, $sql);

// $row = mysqli_fetch_assoc($result);



// // Fetch staff name and image URL from the database
// $sql = "SELECT staff_name, image_url FROM staff_info"; // Adjust the query as per your table structure
// $stmt = $con->query($sql);
// $staff_data = $stmt->fetch_assoc();

// // Assign fetched data to variables
// $staff_name = $staff_data['staff_name'];
// $staff_image_url = $staff_data['image_url'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Staff Info</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="staff.css">
    <link rel="stylesheet" href="profile.css">
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
        <!--Right Section-->
        <div class="main">
            <!--Top Bar-->
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="images/user3.png" class="logouser" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item">Setting</a>
                                <a href="#" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--Bottom Bar-->
            <main class="content px-3 py-2">
                <!--INSERT HERE-->
                <!--Update Profile-->
                <div class="row gutters">
                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <div class="account-settings">
                                    <div class="user-profile">
                                        <div class="user-avatar">
                                            <!-- <img src="./images/anya.png" alt="Maxwell Admin"> -->
                                        </div>
                                        <h5 class="user-name" style="font-size: 1.2rem; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;"><?php echo $row['staff_name']; ?></h5>
                                        <h6 class="user-email"><?php echo $row['staff_email']; ?></h6>
                                    </div>
                                    <!-- <div class="first">
                                        <button class="upload">Upload</button>
                                    </div> -->
                                    <div class="about">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                        <div class="card h-100">
                            <div class="card-body">
                                <form action="" method="post">
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="mb-2 text-primary">Staff Details</h6>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="fullName">Full Name</label>
                                                <input type="text" class="form-control" id="fullName" placeholder="Enter full name" name="staff_name" value="<?php echo $row['staff_name']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="eMail">IC Number</label>
                                                <input type="text" class="form-control" id="eMail" placeholder="Enter ic number" name="staff_ic" value="<?php echo $row['staff_ic']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" id="phone" placeholder="Enter phone number" name="staff_phone" value="<?php echo $row['staff_phone']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="website">Email</label>
                                                <input type="email" class="form-control" id="website" placeholder="Website url" name="staff_email" value="<?php echo $row['staff_email']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="website">Gender</label>
                                                <input type="text" class="form-control" id="website" placeholder="Website url" name="staff_gender" value="<?php echo $row['staff_gender']; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="website">Age</label>
                                                <input type="number" class="form-control" id="website" placeholder="Website url" name="staff_age" value="<?php echo $row['staff_age']; ?>">
                                            </div>
                                        </div>

                                    </div>
                                    <!-- <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h6 class="mt-3 mb-2 text-primary">Change Password</h6>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="Street">Username</label>
                                                <input type="name" class="form-control" id="Street" placeholder="Enter Street">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="ciTy">Old Password</label>
                                                <input type="name" class="form-control" id="ciTy" placeholder="Enter City">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="sTate">New Password</label>
                                                <input type="text" class="form-control" id="sTate" placeholder="Enter State">
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label for="zIp">Confirm New Password</label>
                                                <input type="text" class="form-control" id="zIp" placeholder="Zip Code">
                                            </div>
                                        </div>
                                    </div> -->
                                    <div class="row gutters">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                            <!-- <div class="text-right">
                                                <button type="button" id="submit" name="submit" class="btn btn-secondary">Cancel</button>
                                                <button type="button" id="submit" name="submit" class="btn btn-primary">Update</button>
                                            </div> -->
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="admin.js"></script>
</body>

</html>
