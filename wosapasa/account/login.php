<?php
    require_once '../config/dbconfig.php';
    require_once '../config/utility.php';
    if($_POST){
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
        $q_user = "SELECT * FROM users WHERE email = '$email'";
        if ($result = mysqli_query($conn,$q_user)){

        }else{
            echo "".$conn->error;
        }
        if(mysqli_num_rows($result)!=0){
            $user = mysqli_fetch_array($result);
            if (password_verify($password,$user['password'])){
                session_start();
                $_SESSION['id'] = $user['user_id'];
                header("location: ../index.php");
            }
            else{
                // password incorrect
                echo "
                <h3 style='margin-top: 50px; width:100%; color:red; text-align: center'>
                Incorrect password
                </h3>
                ";
            }
        }else{
            // email not register
            echo "
                <h3 style='margin-top: 50px; width:100%; color:red; text-align: center'>
                User does not exists
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
    <?php 
        $page= 'login   ';
        include_once '../assets/component/topnav.php'; 
    ?>
    <div class="container">
        <div id="server_msg">
            
        </div>
        <div class="form">
            <h2>Log In</h2>
            <form action="login.php" method="post">
                <div class="input-block">
                    <img src="/assets/image/envelope-solid.svg">
                    <input name="email" class="form_input" type="email" placeholder="Email or Username">
                </div>
                <div class="input-block">
                    <img src="/assets/image/lock-solid.svg">
                    <input name="password"  class="form_input" id="password" type="password" placeholder="Password">
                    <i class="far fa-eye eye_icon" id="togglePassword" onclick="passwordToggler()"></i>
                </div>
                <button type="submit">Login</button>
            </form>
        </div>
    </div>
</body>
</html>