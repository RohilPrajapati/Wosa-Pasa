<?php
    require_once '../config/dbconfig.php';
    require_once '../config/utility.php';
    if($_POST){
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $q_user = "SELECT * FROM users WHERE email = '$email' or username='$email' ";
        if ($result = mysqli_query($conn,$q_user)){

        }else{
            echo "".$conn->error;
        }
        if(mysqli_num_rows($result)!=0){
            $user = mysqli_fetch_array($result);
            if (password_verify($password,$user['password'])){
                if ($user['is_admin']){
                    session_start();
                    $_SESSION['id'] = $user['user_id'];
                    header("location:dashboard.php");
                }else{
                    echo "
                    <h3 class='server_error'>   
                    You are not admin !
                    </h3>
                    ";
                }
            }
            else{
                // password incorrect
                echo "
                <h3 class='server_error'>   
                Incorrect password
                </h3>
                ";
            }
        }else{
            // email not register
            echo "
                <h3 class='server_error'>
                Username or email does not exists
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
    <title>Login</title>
    <link rel="stylesheet" href="/assets/css/main.css">
    <script src="/assets/js/main.js"></script>
    <script src="https://kit.fontawesome.com/b3b8c8e375.js" crossorigin="anonymous"></script>
</head>
<body>
    
    <div class="form">
        <h2>Admin Login</h2>
        <form action="login.php" method="post" id="login_form" onsubmit="event.preventDefault(); validateLogin();">
            <div class="input-block">
                <img src="/assets/image/envelope-solid.svg">
                <input name="email" id="email" class="form_input" type="text" placeholder="Email or Username">
            </div>
            <div class="error" id="email_error"></div>
            <div class="input-block">
                <img src="/assets/image/lock-solid.svg">
                <input name="password" id="password" class="form_input" id="password" type="password" placeholder="Password">
                <i class="far fa-eye eye_icon" id="togglePassword" onclick="passwordToggler()"></i>
            </div>
            <div class="error" id="password_error"></div>
            <button type="submit">Login</button>
        </form>
    </div>
</body>
</html>