<?php
session_start();
include './connection/connection.php';

$userAddStatus = "";

if (isset($_POST["add_user"])) {
    $fullname = $_POST['fullname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $password = md5($_POST['password']);
 $usertype = $_POST['usertype'];

  
    if (empty($errors)) {
        $insert_new_user = "INSERT INTO users (fullname, phone, email,password, usertype) 
                            VALUES ('$fullname', '$phone', '$email', '$password','$usertype')";

        if (mysqli_query($connect, $insert_new_user)) {
          
            $userAddStatus = "User Registered successfully";
        } else {
           
            $userAddStatus = "Error occurred while adding user";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>garage management system</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./assets/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./assets/fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./assets/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./assets/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./assets/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./assets/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./assets/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/main.css">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <span class="login100-form-title p-b-10">
                    GARAGE MANAGEMENT SYSTEM
                </span>
                <span class="login100-form-title p-b-10">
                    <i class="zmdi zmdi-account-circle"></i>
                </span>

                <form class="login100-form validate-form" method="POST">
                    <div class="alert <?php echo !empty($userAddStatus) && strpos($userAddStatus, 'successfully') !== false ? 'alert-success' : ''; ?>"
                        id="successMessage" style="text-align:center">
                        <?php echo $userAddStatus; ?>
                    </div>
                    <div class="wrap-input100 validate-input" data-validate="enter fullname">
                        <input class="input100" type="text" name="fullname">
                        <span class="focus-input100" data-placeholder="fullname"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="enter phone">
                        <input class="input100" type="number" name="phone">
                        <span class="focus-input100" data-placeholder="phone"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input class="input100" type="email" name="email">
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div>

                        <input class=" input100" type="hidden" name="usertype" value="Mechanics">

                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit" name="add_user">
                                Register
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-10">
                        <span class="txt1">
                            Do you have an account?
                        </span>

                        <a class="txt2" href="./index.php">
                            Sign In
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="./assets/vendor/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="./assets/vendor/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="./assets/vendor/bootstrap/js/popper.js"></script>
    <script src="./assets/vendor/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="./assets/vendor/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="./assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="./assets/vendor/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="./assets/vendor/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="./assets/js/main.js"></script>

</body>

</html>