<?php 
    require_once '../config/dbconfig.php';
    require_once '../config/utility.php';
    require_once '../auth_user.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $page = 'profile';
        require_once '../assets/component/head.php'; 
        session_start();
        $id = $_SESSION['id'];
        $user = fetch_user($id,$conn);
    ?>
    <title><?= $user['username'] ?></title>
    <style>
        b{
            display: inline-block;
            width: 120px;
        }
    </style>
</head>
<body>
    
    <?php require_once '../assets/component/topnav.php'; ?>
    <div class="container">
        <div class="profile_row">
            <div class="col_6">
            <div class="info">
                    <b>Username : </b>
                    <?= $user['username']; ?><br>
                    <b>E-mail : </b>   
                    <?= $user['email']; ?><br>
            </div>
            </div>
            <?php
                require_once '../assets/component/sidebar_profile.php'
            ?>
        </div>
    </div>
</body>
</html>