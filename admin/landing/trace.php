<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
</head>
<body>
    <div class="banner">
        <div class="navbar">
            <img src="logo1.png" class="logo">
            <ul>
                <li><a href="landing.php">Home</a></li>
                <li><a href="progress.php">Trace</a></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="aboutus.php">About Us</a></li>
            </ul>
        </div>
        <div class="content">
            <h2>TRACK YOUR MOBILE REPAIRING PROGRESS</h2>
            <div class="search">
                <h2>Tracking Number</h2><br>
                <input type="text" id="trackingNumber">
                <div class="price">
                    <h3>Your Price</h3>
                    <br>
                    <input type="text" id="price">
                </div>
            </div>
        </div><br><br><br><br><br>
        <br>
        <div class="main" id="progressBarContainer">
            <ul id="progressList">
                <!-- Progress items will be dynamically added here -->
                <li>
                    <i class="icon uil-thumbs-up"></i>
                    <div class="progress one">
                        <p>1</p>
                        <i class="uil uil-check"></i>
                    </div>
                    <p class="text">Submitted</p>
                </li>
                <li>
                    <i class="icon uil-mobile-android"></i>
                    <div class="progress two">
                        <p>2</p>
                        <i class="uil uil-check"></i>
                    </div>
                    <p class="text">Device received</p>
                </li>
                <li>
                    <i class="icon uil-clock-three"></i>
                    <div class="progress three">
                        <p>3</p>
                        <i class="uil uil-check"></i>
                    </div>
                    <p class="text">In Progress</p>
                </li>
                <li>
                    <i class="icon uil-check-circle"></i>
                    <div class="progress four">
                        <p>4</p>
                        <i class="uil uil-check"></i>
                    </div>
                    <p class="text">Finish Repairing</p>
                </li>
            </ul>
        </div>
    </div>

</body>
</html>

