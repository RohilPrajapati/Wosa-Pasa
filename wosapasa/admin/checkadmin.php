<?php
    require_once "../config/dbconfig.php";
    session_start();
    if(!isset($_SESSION['id'])){
        die("You are not login<a href='/admin/login.php'>Login</a>");  
    }
    $user_id = $_SESSION['id'];
    $q_user = "select is_admin from users where user_id = '$user_id'";
    $result = mysqli_query($conn,$q_user);
    $user = mysqli_fetch_array($result);
    if(!isset($user['is_admin'])){
        die("Invalide email or password");
    }
?>