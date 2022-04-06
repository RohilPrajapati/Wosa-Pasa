<link rel="stylesheet" href="/assets/css/admin.css">

    <?php
        require_once "config/dbconfig.php";
        session_start();
        if(!isset($_SESSION['id'])){
            die("<div class='server_error'>You are not login<a href='/admin/login.php'>Login</a></div>");  
        }
        $user_id = $_SESSION['id'];
        $q_user = "select * from users where user_id = '$user_id'";
        $result = mysqli_query($conn,$q_user);
        $user = mysqli_fetch_assoc($result);
        if($user['status']!=1){
            die("<div class='server_error'>User Has been disable<a href='/admin/login.php'>Login</a></div>");
        }
    ?>  

