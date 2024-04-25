<?php
include('database/connection.php');

// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// Define default progress
$status = '';
$price = '';

// Check if form is submitted and tracking ID is provided
if (isset($_POST['submit']) && !empty($_POST['trackingid'])) {
    // Sanitize input to prevent SQL injection
    $trackingid = $con->real_escape_string($_POST['trackingid']);

    // Retrieve progress for the given tracking ID
    $display = "SELECT status, price FROM custinfo WHERE custic = '$trackingid'";
    $resultdis = $con->query($display);

    if ($resultdis) {
        // Check if any row is returned
        if ($resultdis->num_rows > 0) {
            // Fetch the progress
            $row = $resultdis->fetch_assoc(); // Fetch once
            $status = $row['status'];
            $price = $row['price'];
        } else {
            // No progress found for the provided tracking ID
            $status = "No repair status found for the provided tracking ID.";
            $price = "No pricing found for the provided tracking ID.";
        }
    } else {
        // Query execution failed
        $status = "Error executing query: " . $con->error;
        $price = "Error executing query: " . $con->error;
    }
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trace | Baam GADGET</title>
    <link rel="stylesheet" href="bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css"/>
    <link rel="stylesheet" href="app.css">
    <link rel="stylesheet" href="color.css">

</head>
<body id="top">

<!-- Navbar -->
<nav class="navbar py-3 navbar-expand-lg navbar-dark bg-dark" data-aos="fade-down" data-aos-delay="400">
    <div class="container">
        <img src="logo1.png" class="logo">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor02"
                aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor02">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="landing.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="displaytrackingno.php">Trace</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="aboutus1.php">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="contactus.php">Contact Us</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- Contact -->
<section id="contact" class="py-5" >
    <!-- Container -->
    <div class="container" background="images/image3.png">
        <!-- Row -->
        <div class="row align-items-center mb-3" data-aos="fade-down" data-aos-delay="400">
            <!-- Col -->
            <div class="col-md-8">
                <div><h1><strong>TRACK YOUR MOBILE REPAIRING PROGRESS</strong></h1></div>
            </div>  
        </div>
        <!-- Row -->
        <div class="row">
            <div class="col-lg-6" data-aos="fade-down" data-aos-delay="500">
                <form action="" method="post" class="border-custom p-4">
                    <div class="mb-3">
                        <label class="mb-2" for="trackingid"><h5>Tracking Id</h5></label>
                        <input type="text" class="form-control" name="trackingid" id="trackingid" style="color: black;">
                    </div>
                    <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                </form>
            </div>
            <!-- Col -->
            <div class="col-lg-6 d-grid" data-aos="fade-down" data-aos-delay="400">
                <div class="d-grid">
                    <div class="border-custom p-4 d-flex">
                        
                        <div class="ms-3">
                            <div><h3>Your Phone Progress</h3></div>
                            <div class="border-custom p-4 d-flex">
                                <div class="ms-3">
                                <div><h5><?= $status ?></h5></div>
                                </div>
                                
                        
                            </div>
                            
                        </div>
                        <div class="ms-3">
                            <div><h3>Your Phone Pricing</h3></div>
                            <div class="border-custom p-4 d-flex">
                                <div class="ms-3">
                                <div><h5><?= $price ?></h5></div>
                                </div>
                                
                        
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</section>

<!-- Scroll to top -->
<a href="#top" class="icon scroll-to-top"><i class="las la-arrow-up"></i></a>
<script src="bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script src="app.js"></script>
</body>
</html>
