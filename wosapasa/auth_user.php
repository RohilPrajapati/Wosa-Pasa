<link rel="stylesheet" href="/assets/css/main.css">

    <?php
        require_once "config/dbconfig.php";
        session_start();
        if(!isset($_SESSION['id'])){
            echo "<div class='server_error'>You are not login<a href='/account/login.php'>Login</a></div>"; 
            header("refresh:3;url=/index.php");
            die();
        }
        $user_id = $_SESSION['id'];
        $q_user = "select * from users where user_id = '$user_id'";
        $result = mysqli_query($conn,$q_user);
        $user = mysqli_fetch_assoc($result);
        if($user['status']!=1){
            die("<div class='server_error'>User Has been disable<a href='/account/login.php'>Login</a></div>");
        }
    ?>  

