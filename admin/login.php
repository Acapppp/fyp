<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login | Baam Gadget</title>
    <style>
        .error-message {
            color: red;
        }
    </style>
</head>
<body>
    <form action="loginprocess.php" method="POST">
        <div class="wrapper">
            <div class="background"></div>
            <div class="container main">
                <div class="row">
                    <div class="col-md-6 side-image"> 
                        <!-- acap taik -->
                        <!------------- image ------------->
                        <div class="background">
                            <img src="" alt="">
                        </div>
                        <div class="text">
                            <p><i></i></p>
                        </div>
                    </div>
                    <div class="col-md-6 right">
                        <div class="input-box">
                            <header>Sign In account</header>
                            <div class="input-field">
                                <input type="text" class="input" id="name" name="name" required="" autocomplete="off">
                                <label for="name">Name</label> 
                            </div> 
                            <div class="input-field">
                                <input type="password" class="input" id="pass" name="pass" required="">
                                <label for="pass">Password</label>
                            </div> 
                            <div class="input-field">
                                <input type="submit" class="submit" name="submit" value="Sign In">
                            </div> 
                            <div class="error-message">
                                <?php
                                    if(isset($_GET['error'])) {
                                        echo "You have entered the wrong username or password.";
                                    }
                                ?>
                            </div>
                            <div class="forgot-password">
                                <a href="./passwordreset/forgot-password.php">Forgot password?</a>
                            </div>
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </form>
</body>
</html>
