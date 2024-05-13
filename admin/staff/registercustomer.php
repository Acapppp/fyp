<?php
$staffIC = $_GET['sid'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Customer</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="staff.css">
    <link rel="stylesheet" href="form.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>
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
                    <!--Dashboard -->
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
                                <a href="updatestaffprofile.php?sid=<?= $staffIC; ?>" class="sidebar-link">Update
                                    Info</a>
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
                                <a href="registercustomer.php?sid=<?= $staffIC; ?>" class="sidebar-link">Register
                                    Customer</a>
                            </li>
                            <li class="sidebar-item">
                                <a href="s_customerinfo.php?sid=<?= $staffIC; ?>" class="sidebar-link">Customer
                                    Information</a>
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
                                <a href="updaterepairprogress.php?sid=<?= $staffIC; ?>" class="sidebar-link">Task
                                    Management</a>
                            </li>

                        </ul>
                    </li>
                    <li>
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
                <div class="title">
                    <header>Customer Registration</header>
                </div>
                <div class="navbar-collapse navbar">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" data-bs-toggle="dropdown" class="nav-icon pe-md-0">
                                <img src="../images/user.png" class="avatar img-fluid rounded" alt="">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="../login.php" class="dropdown-item">Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--Bottom Bar-->
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <!-- Registration Form -->
                    <section class="containerregform">
                        <!-- <header>Registration Form</header> -->
                        <form action="registercustomerprocess.php?sid=<?= $staffIC; ?>" class="regform" method="post"
                            id="myForm">
                            <div class="input-box">
                                <label class="lab">Name</label>
                                <input type="text" placeholder="Enter customer name" name="custname" required />
                            </div>

                            <div class="input-box">
                                <label class="lab">IC Number (number without "-")</label>
                                <input type="tel" placeholder="Enter customer ic" name="custic" id="ic-number"
                                    onblur="icNumberFormat()" maxlength="12" required />
                                <script>
                                    function formatIcNumber(value) {
                                        if (!value) return value;
                                        const icNumber = value.replace(/[^\d]/g, '');
                                        const icNumberLength = icNumber.length;
                                        if (icNumberLength < 7) return icNumber; // If the length is less than 7, return the IC number as is
                                        return `${icNumber.slice(0, 6)}-${icNumber.slice(6, 8)}-${icNumber.slice(8)}`;
                                    }

                                    function icNumberFormat() {
                                        const inputField = document.getElementById('ic-number');
                                        const formattedInputValue = formatIcNumber(inputField.value);
                                        inputField.value = formattedInputValue;
                                    }

                                    document.getElementById('ic-number').addEventListener('blur', icNumberFormat);
                                </script>
                            </div>

                            <div class="input-box">
                                <label class="lab">Email</label>
                                <input type="email" placeholder="Enter customer email" name="custmail" required />
                            </div>


                            <div class="column">
                                <div class="input-box">
                                    <label class="lab">Phone Number</label>
                                    <input placeholder="Enter phone number" name="custphone" id="phone-number"
                                        oninput="validateInput()" maxlength="22" required />
                                    <script>
                                        function formatPhoneNumber(value) {
                                            if (!value) return value;
                                            const phoneNumber = value.replace(/[^\d]/g, '');
                                            const phoneNumberLength = phoneNumber.length;
                                            if (phoneNumberLength < 4) return phoneNumber;
                                            if (phoneNumberLength < 7) {
                                                return `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(3)}`;
                                            }
                                            return `(${phoneNumber.slice(0, 3)}) ${phoneNumber.slice(3, 6)}-${phoneNumber.slice(6, 11)}`;
                                        }

                                        function phoneNumberFormat() {
                                            const inputField = document.getElementById('phone-number');
                                            const formattedInputValue = formatPhoneNumber(inputField.value);
                                            inputField.value = formattedInputValue;
                                        }

                                        function validateInput() {
                                            const inputField = document.getElementById('phone-number');
                                            const inputValue = inputField.value.replace(/[^\d]/g, ''); // Remove non-numeric characters
                                            const inputLength = inputValue.length;
                                            if (inputLength < 10 || inputLength > 11) {
                                                inputField.setCustomValidity('Phone number must be 10 or 11 digits long');
                                            } else {
                                                inputField.setCustomValidity('');
                                            }
                                            phoneNumberFormat(); // Format the input value
                                        }
                                    </script>
                                </div>

                                <div class="input-box">
                                    <label class="lab">Date</label>
                                    <input type="date"  name="regdate" id="date-input"/>
                                </div>


                            </div>
                            <div class="gender-box">
                                <!-- <h3 class="lab">Device</h3> -->
                                <div class="gender-option">
                                    <div class="gender">
                                        <input type="radio" id="check-male" name="devicetype" value="Smartphone"
                                            required>
                                        <label for="check-male">Smartphone</label>
                                    </div>
                                    <div class="gender">
                                        <input type="radio" id="check-female" name="devicetype" value="Tablet" required>
                                        <label for="check-female">Tablet</label>
                                    </div>
                                </div>
                            </div>
                            <div class="input-box address">
                                <div class="column">
                                    <div class="select-box">
                                        <select name="brand" required>
                                            <option hidden>Brand</option>
                                            <option value="Iphone">Iphone</option>
                                            <option value="Samsung">Samsung</option>
                                            <option value="Oppo">Oppo</option>
                                            <option value="Huawei">Huawei</option>
                                            <option value="Vivo">Vivo</option>
                                            <option value="Sony">Sony</option>
                                            <option value="Zte">Zte</option>
                                            <option value="Sharp">Sharp</option>
                                            <option value="Google Pixel">Google Pixel</option>
                                            <option value="Oneplus">Oneplus</option>
                                            <option value="Infinix">Infinix</option>
                                            <option value="Others">Other's (Enter model name)</option>
                                        </select>
                                    </div>
                                    <input type="text" placeholder="Enter phone model" name="model" required />
                                </div><br>
                                <label class="lab">Problem Description</label>
                                <textarea name="problem" required></textarea>
                            </div>
                            <!-- <button name="btnsubmit">Submit</button> -->
                            <button type="submit" name="btnsubmit" id="submitButton">Register</button>

                            <!--Submit style -->
                            <script>
                                document.getElementById('myForm').addEventListener('submit', function (event) {
                                    // Prevent the default form submission behavior
                                    event.preventDefault();

                                    // Display SweetAlert when the form is submitted
                                    Swal.fire({
                                        title: "Do you want to save the changes?",
                                        showDenyButton: true,
                                        showCancelButton: true,
                                        confirmButtonText: "Save",
                                        // denyButtonText: "Don't save"
                                    }).then((result) => {
                                        /* Read more about isConfirmed, isDenied below */
                                        if (result.isConfirmed) {
                                            // If confirmed, submit the form
                                            document.getElementById('myForm').submit();
                                            Swal.fire("Saved!", "", "success");
                                        } else if (result.isDenied) {
                                            // If denied, do nothing or show a message
                                            Swal.fire("Changes are not saved", "", "info");
                                        }
                                    });
                                });

                                // Function to convert name to uppercase
                                function formatName() {
                                    const nameInput = document.querySelector('input[name="custname"]');
                                    nameInput.value = nameInput.value.toUpperCase();
                                }

                                 // Function to set the minimum selectable date to today and maximum to today
    function setMinMaxDate() {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById("date-input").setAttribute("min", today);
        document.getElementById("date-input").setAttribute("max", today);
    }

    // Function to set the initial value of the input field to today's date
    function setInitialDate() {
        const currentDate = new Date();
        const year = currentDate.getFullYear();
        const month = String(currentDate.getMonth() + 1).padStart(2, '0');
        const day = String(currentDate.getDate()).padStart(2, '0');
        document.getElementById("date-input").value = `${year}-${month}-${day}`;
    }

    // Attach event listener to set the minimum and maximum date attributes
    document.getElementById("date-input").addEventListener("input", setMinMaxDate);

    // Set the initial value of the input field and restrict selectable dates
    setInitialDate();
    setMinMaxDate();

                                // Function to format phone model
                                // Function to format phone model
                                function formatPhoneModel() {
                                    const modelInput = document.querySelector('input[name="model"]');
                                    const words = modelInput.value.toLowerCase().split(' ');
                                    for (let i = 0; i < words.length; i++) {
                                        words[i] = words[i].charAt(0).toUpperCase() + words[i].substring(1);
                                    }
                                    modelInput.value = words.join(' ');
                                }

                                // Format problem description textarea
                                document.querySelector('textarea[name="problem"]').addEventListener('input', function (event) {
                                    this.value = this.value.toLowerCase().replace(/(^| )(\w)/g, function (txt) {
                                        return txt.toUpperCase();
                                    });
                                });

                                // Attach event listeners to relevant inputs
                                document.querySelector('input[name="custname"]').addEventListener('input', formatName);
                                
                                document.querySelector('input[name="model"]').addEventListener('input', formatPhoneModel);
                            </script>

                        </form>
                    </section>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="script1.js"></script>
</body>

</html>