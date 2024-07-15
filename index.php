<?php
session_start();
include './connection/connection.php';

$message = ""; 

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
    
        $message = "email and password not match.";
    } else {
        $password = md5($password);

        $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
        $result = mysqli_query($connect, $sql);
        $number = mysqli_num_rows($result);
        if ($number > 0) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['fullname'] = $row['fullname'];
            $_SESSION['usertype'] = $row['usertype'];

            if ($row['usertype'] == "Admin") {
                $redirectUrl = './SYSTEMPART/ADMIN/index.php';
            } else {
                $redirectUrl = './SYSTEMPART/MECHANICS/index.php';
            }

            header("Location: $redirectUrl"); 
            exit;
        } else {
            $message = "Wrong username or password. Please try again.";
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>garage system</title>
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
    <style>
    .error-message {
        margin-top: 10px;
        color: red;
    }
    </style>


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
                    <!-- Message div -->
                    <?php if (!empty($message)) : ?>
                    <div class="<?php echo $loginSuccess ? 'success-message' : 'error-message'; ?>"
                        style="text-align:center">
                        <?php echo $message; ?>
                    </div>
                    <?php endif; ?>
                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                            <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" type="submit" name="login">
                                Login
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-10">
                        <span class="txt1">
                            Don’t have an account?
                        </span>

                        <a class="txt2" href="./register.php">
                            Sign Up
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