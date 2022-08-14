<?php
include "../config/dbconfig.php";
include "../config/utility.php";
$page = 'signup';
// echo $conn;
if ($_POST) {
    $username = $_REQUEST['username'];
    $email = $_REQUEST['email'];
    $password = $_REQUEST['password'];
    $h_password = password_hash($password, PASSWORD_DEFAULT);
    // echo $h_password;
    $q_select = "SELECT * FROM users where email='$email'";
    $users = mysqli_query($conn, $q_select);
    if (mysqli_num_rows($users) == 0) {
        $q_select = "SELECT * FROM users where username='$username'";
        $users = mysqli_query($conn, $q_select);
        if (mysqli_num_rows($users) == 0) {
            $q_insert = "INSERT INTO users (username, email, password) VALUES ('$username','$email', '$h_password')";
            if ($result = mysqli_query($conn, $q_insert)) {
                // redirectAlertMessage('User has been register','login.php');
                $title = $username . " is register in Wosa: Pasa:";
                $msg = "Welcome " . $username . " to Wosa: Pasa:. Hope you will find the product u are searching in Our Online store.";
                send_mail($email, $title, $msg);
                echo "
                <h3 class='server_success'>
                    User has been register. Mail has been sent About Ur Register. <a href='login.php'>Login</a>   
                </h3>
                ";
            } else {
                // redirectAlertMessage('Error while inserting:'.$conn->error,'signup.html');
                echo "
                <h3 class='server_error'>
                    Error while inserting: server Error   
                </h3>
                ";
            }
        } else {
            echo "
            <h3 class='server_error'>
                User Already exist ! <a href='login.php'>Login</a>
            </h3>
            ";
        }
    } else {
        // redirectAlertMessage('Email Already Exist !','signup.html');
        echo "
                <h3 class='server_error'>
                    E-mail Already exist ! <a href='login.php'>Login</a>
                </h3>
                ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <script src="/assets/js/main.js"></script>
    <script src="https://kit.fontawesome.com/b3b8c8e375.js" crossorigin="anonymous"></script>
</head>

<body>
    <?php include_once '../assets/component/topnav.php'; ?>
    <div class="container">
        <div id="server_msg">

        </div>
        <div class="form">
            <h2 class="header">Sign Up</h2>
            <form action="" id="form" method="POST" onsubmit="event.preventDefault(); validateRegistration()">
                <div class="input-block">
                    <img src="/assets/image/user-solid.svg" alt="">
                    <input class="form_input" id="username" name="username" type="text" placeholder="Username">
                </div>
                <div class="error" id="username_error"></div>
                <div class="input-block">
                    <img src="/assets/image/envelope-solid.svg">
                    <input class="form_input" id="email" name="email" type="email" placeholder="Email">
                </div>
                <div class="error" id="email_error"></div>
                <div class="input-block">
                    <img src="/assets/image/lock-solid.svg">
                    <input class="form_input" id="password" name="password" id="password" type="password" placeholder="Password">
                    <i class="far fa-eye eye_icon" id="togglePassword" onclick="passwordToggler()"></i>
                </div>
                <div class="input-block">
                    <img src="/assets/image/lock-solid.svg">
                    <input class="form_input" id="c_password" name="co_password" id="co_password" type="password" placeholder="Confirm Password">
                    <i class="far fa-eye eye_icon" id="ctogglePassword" onclick="cpasswordToggler()"></i>
                </div>
                <div class="error" id="password_error"></div>
                <button type="submit">Signup</button>
            </form>
        </div>
    </div>
</body>

</html>