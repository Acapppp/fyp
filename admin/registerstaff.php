<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Staff | Baam Gadget</title>
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
                    <!-- <img src="images/anya.png" alt="" class="logoimage"> -->
                    <a href="admin.php">Baam GADGET</a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Administration
                    </li>
                    <!-- Content For Sidebar -->
                    <!--Dashboard -->
                    <li class="sidebar-item">
                        <a href="admin.php" class="sidebar-link">
                            <i class="fa-solid fa-list pe-2"></i>
                            Dashboard
                        </a>
                    </li>
                    <!--Customer-->
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
                    <!--Staff-->
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
                    <!--Repairing-->
                    
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
            <!--Bottom Bar-->
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <!-- Table Element -->
                    
                        <h2>Registration Staff</h2>
                        <form action="regstaffprocess.php" class="form" method="post">
                          <div class="input-box">
                            <label>Name : </label>
                            <input type="text" name="staff_name" placeholder="Enter Full Name" required/>
                          </div>
                          <div class="column">
                            <div class="input-box">
                              <label>IC Number ( not include "-" ) : </label>
                              <input type="text" name="staff_ic" id="ic-number" placeholder="xxxxxx - xx - xxxx" onblur="icNumberFormat()" minlength="12" maxlength="12"  required/>
                              <script>
                                    function formatIcNumber(value){
                                        if(!value) return value;
                                        const icNumber = value.replace(/[^\d]/g, '');
                                        const icNumberLength = icNumber.length;
                                        if (icNumberLength < 7) return icNumber; // If the length is less than 7, return the IC number as is
                                        return `${icNumber.slice(0, 6)}-${icNumber.slice(6, 8)}-${icNumber.slice(8)}`;
                                    }

                                    function icNumberFormat(){
                                        const inputField = document.getElementById('ic-number');
                                        const formattedInputValue = formatIcNumber(inputField.value);
                                        inputField.value = formattedInputValue;
                                    }
                                </script>
                            </div>
                            <div class="input-box">
                              <label>Phone Number : </label>
                              <input type="tel" name="staff_phone" placeholder="(010)-000-0000" id="phone-number" onkeydown="phoneNumberFormat()" maxlength="22" required/>
                              <script>
                                    function formatPhoneNumber(value){
                                        if(!value) return value;
                                        const phoneNumber = value.replace(/[^\d]/g, '');
                                        const phoneNumberLength = phoneNumber.length;
                                        if(phoneNumberLength < 4) return phoneNumber;
                                        if(phoneNumberLength < 7){
                                            return `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(3)}`;
                                        }
                                        return `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(3, 6)}-${phoneNumber.slice(6, 10)}`;
                                    }

                                    function phoneNumberFormat(){
                                        const inputField = document.getElementById('phone-number');
                                        const formattedInputValue = formatPhoneNumber(inputField.value);
                                        inputField.value = formattedInputValue;
                                    }
                                </script>
                            </div>
                          </div> <br>

                            <div class="form-check">
                                <label for="">Gender : </label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="staff_gender" id="male" value="Male">
                                    <label class="form-check-label">Male</label>
                                    </div>
                                    <div class="form-check">
                                    <input class="form-check-input" type="radio" name="staff_gender" id="female" value="Female">
                                    <label class="form-check-label">Female</label>
                                </div>
                            </div>

                          <div class="column">
                          <div class="input-box">
                              <label>Age : </label>
                              <input type="number" name="staff_age" placeholder="Enter age"  min="0" required/>
                            </div>
                            <div class="input-box">
                              <label>Email : </label>
                              <input type="email" name="staff_email" placeholder="Enter email"  required/>
                            </div>
                          </div>

                          <div class="column">
                          <div class="input-box">
                              <label>Username : </label>
                              <input type="text" name="staffusername" placeholder="Enter username" required/>
                            </div>
                            <div class="input-box">
                              <label>Password : </label>
                              <input type="password" name="staff_pass" placeholder="Enter password"  required/>
                            </div>
                          </div>
                          <div class="column">
                            <button class="btn" name="btnsubmit">Submit</button>
                          </div>
                        </form>
                </div>
            </main>
        </div>
    </div>

    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="admin.js"></script>
</body>

</html>