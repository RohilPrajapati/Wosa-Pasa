<?php
    include "../config/dbconfig.php";
    include "../config/utility.php";
    $page = 'signup';
    // echo $conn;
    if($_POST){
        $username = $_REQUEST['username'];
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $h_password = password_hash($password,PASSWORD_DEFAULT);
        // echo $h_password;
        $q_select = "SELECT * FROM users where email='$email'";
        $users = mysqli_query($conn,$q_select);
        if (mysqli_num_rows($users) == 0){
            $q_insert = "INSERT INTO users (username, email, password, is_admin) VALUES ('$username','$email', '$h_password','1')";
            if ($result = mysqli_query($conn,$q_insert)){
                // redirectAlertMessage('User has been register','login.php');
                echo "
                <h3 class='server_success'>
                    admin user has been register.</a>
                </h3>
                ";
                header('refresh:2;url=users.php');
            }
            else{
                // redirectAlertMessage('Error while inserting:'.$conn->error,'signup.html');
                echo "
                <h3 class='server_error'>
                    Error while inserting: server Error   
                </h3>
                ";
            }
        }else{
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
    <?php require_once 'head.php'; ?>
    <title>Add Admin User</title>
</head>
<body>
    <div class="main_container">
        <?php include_once 'admin_nav.php';?>
        <div class="container">
            <h3 class="header">Add Admin User</h3>
            <form action="" id="form" method="POST" onsubmit="event.preventDefault(); validateRegistration()">
                <div class="input_block">
                    <img src="/assets/image/user-solid.svg" alt="">
                    <input class="form_input" id="username" name="username" type="text" placeholder="Username"> 
                </div>
                <div class="error" id="username_error"></div>
                <div class="input_block">
                    <img src="/assets/image/envelope-solid.svg">
                    <input class="form_input" id="email" name="email"  type="email" placeholder="Email">
                </div>
                <div class="error" id="email_error"></div>
                <div class="input_block">
                    <img src="/assets/image/lock-solid.svg">
                    <input class="form_input" id="password" name="password" id="password" type="password" placeholder="Password">
                    <i class="far fa-eye eye_icon" id="togglePassword" onclick="passwordToggler()"></i>
                </div>
                <div class="input_block">
                    <img src="/assets/image/lock-solid.svg">
                    <input class="form_input" id="c_password" name="co_password" id="co_password" type="password" placeholder="Confirm Password">
                    <i class="far fa-eye eye_icon" id="togglePassword" onclick="cpasswordToggler()"></i>
                </div>
                <div class="error" id="password_error"></div>
                <input class="btn" type="submit" value="Add Admin">
            </form>
        </div>
    </div>
    
</body>
</html>