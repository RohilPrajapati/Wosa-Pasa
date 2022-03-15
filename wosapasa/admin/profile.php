<?php 
    session_start();
require_once '../config/utility.php' ?>
<?php require_once '../config/dbconfig.php' ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php require_once 'head.php' ?>
    <title>DashBoard</title>
</head>
<body>
    <div class="main_container">
        <?php require_once 'admin_nav.php'; ?>
        <div class="container">
            <?php 
                $id = $_SESSION['id']; 
                $user = fetch_user($id,$conn);
            ?>
            <div class="info">
                <b>Username : </b> <?= $user['username']; ?><br>    
                <b>E-mail : </b> <?= $user['email']; ?><br>
                <b>Role:</b> <?php if($user['is_admin']){echo "Admin";}else{"None";} ?>
            </div>
        </div>
    </div>
</body>
</html>
<?php
    $conn.close();
?>